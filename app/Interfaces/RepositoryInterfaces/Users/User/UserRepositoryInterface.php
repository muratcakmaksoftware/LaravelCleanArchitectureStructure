<?php

namespace App\Interfaces\RepositoryInterfaces\Users\User;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function all(): Collection;
}
