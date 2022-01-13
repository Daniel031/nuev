<?php

namespace App\Http\Controllers\Movil;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;


class AuthController extends Controller{

public function authenticate(Request $request)
{
$credentials = $request->only('email', 'password');
try {
    if (! $token = JWTAuth::attempt($credentials)) {
        return response()->json(['error' => 'invalid_credentials'], 400);
    }
} catch (JWTException $e) {
    return response()->json(['error' => 'could_not_create_token'], 500);
}

return response()->json(compact('token'));
}

public function getAuthenticatedUser(Request $request)
{
try {
    if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
    }
    } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
    } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
    } catch (JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
    }
    return response()->json(compact('user'));
}

public  function  logout(Request  $request) {
    $this->validate($request, [
        'token' => 'required'
    ]);

    try {
        JWTAuth::invalidate($request->token);
        return  response()->json([
            'status' => 'ok',
            'message' => 'Cierre de sesión exitoso.'
        ]);
    } catch (JWTException  $exception) {
        return  response()->json([
            'status' => 'unknown_error',
            'message' => 'Al usuario no se le pudo cerrar la sesión.'
        ], 500);
    }
}


}
