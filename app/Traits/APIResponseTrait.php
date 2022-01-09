<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait APIResponseTrait
{

    /**
     * @param array $data
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseSuccess(array $data, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_OK, $data, $message ?? '');
    }

    /**
     * @param array $data
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseStore(array $data, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_OK, $data, $message ?? '');
    }

    /**
     * @param array $data
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseUpdate(array $data, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_OK, $data, $message ?? '');
    }

    /**
     * @param array $data
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseDestroy(array $data, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_OK, $data, $message ?? '');
    }

    /**
     * @param array $data
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseError(array $data, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_BAD_REQUEST, $data, $message ?? '');
    }

    /**
     * @param array $data
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseNotFound(array $data, string $message = null): JsonResponse
    {
        return $this->response(Response::HTTP_NOT_FOUND, $data, $message ?? '');
    }

    /**
     * @param int $statusCode
     * @param array $data
     * @param string $message
     * @return JsonResponse
     */
    public function response(int $statusCode, array $data, string $message): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}
