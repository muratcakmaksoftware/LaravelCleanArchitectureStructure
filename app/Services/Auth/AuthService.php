<?php

namespace App\Services\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\RepositoryInterfaces\Users\User\UserRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthService extends Controller
{
    /**
     * @param array $attributes
     * @return false|Model
     * @throws BindingResolutionException
     */
    public function login(array $attributes)
    {
        if(auth('sanctum')->check()){
            auth('sanctum')->user()->currentAccessToken()->delete();
        }

        $user = app()->make(UserRepositoryInterface::class)->getUserByEmail($attributes['email'], ['id', 'name', 'email', 'password']);
        if($user){
            if(Hash::check($attributes['password'], $user->password)){
                $user->token = $this->createToken($user);
                unset($user->password);
                return $user;
            }
        }
        return false;
    }

    /**
     * @param array $attributes
     * @return array|false
     * @throws BindingResolutionException
     */
    public function register(array $attributes)
    {
        $attributes['password'] = Hash::make($attributes['password']);
        $user = app()->make(UserRepositoryInterface::class)->store($attributes);
        if ($user) {
            return [
                'user' => $user,
                'token' => $this->createToken($user)
            ];
        }
        return false;
    }

    /**
     * @param Model $user
     * @return string
     */
    public function createToken(Model $user): string
    {
         return $user->createToken(env('APP_NAME'))->plainTextToken;
    }

    /**
     * @return int
     */
    public function logout(): int
    {
        return auth()->user()->tokens()->delete();
    }

    /**
     * @return bool
     */
    public function authorizedCheck(): bool
    {
        return auth('sanctum')->check();
    }
}
