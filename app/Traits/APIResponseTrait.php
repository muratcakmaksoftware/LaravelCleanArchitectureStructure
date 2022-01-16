<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait APIResponseTrait
{

    /**
     * @param array|null $attributes
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseSuccess(array $attributes = null, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_OK, $attributes, $message ?? '');
    }

    /**
     * @param array|null $attributes
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseStore(array $attributes = null, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_OK, $attributes, $message ?? '');
    }

    /**
     * @param array|null $attributes
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseUpdate(array $attributes = null, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_OK, $attributes, $message ?? '');
    }

    /**
     * @param array|null $attributes
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseDestroy(array $attributes = null, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_OK, $attributes, $message ?? '');
    }

    /**
     * @param array|null $attributes
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseError(array $attributes = null, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_BAD_REQUEST, $attributes, $message ?? '');
    }

    /**
     * @param array|null $attributes
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseNotFound(array $attributes = null, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_NOT_FOUND, $attributes, $message ?? '');
    }

    /**
     * @param int $statusCode
     * @param array $attributes
     * @param string $message
     * @return JsonResponse
     */
    public function response(int $statusCode, array $attributes, string $message): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $attributes
        ], $statusCode);
    }
}
