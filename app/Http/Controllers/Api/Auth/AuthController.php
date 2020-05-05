<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * @SWG\Post(
     *   path="/api/login",
     *   summary="Perform a login request to the API",
     *   operationId="auth.login",
     *   tags={"auth"},
     *   @SWG\Parameter(
     *     name="email",
     *     in="formData",
     *     description="The email used during authentication process of a user",
     *     type="string",
     *     required=true,
     *     default="user1groupe1@dev.com"
     *   ),
     *   @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     description="The password used during authentication process of a user",
     *     type="string",
     *     format="password",
     *     required=true,
     *     default="123456",
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="Json Web Token",
     *   ),
     *   @SWG\Response(
     *     response=401,
     *     description="Unauthorized exception",
     *   ),
     * )
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
