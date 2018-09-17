<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/17/2018
 * Time: 4:16 PM
 */

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthenticateController extends BaseController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('username', 'password');

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password'  =>  'required',
        ]);
        if( $validator->fails() ){
            return $this->sendError('Error.', $validator->errors()->first());
        }
        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->sendError('Error', 'invalid_credentials', 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->sendError('Error', 'could_not_create_token', 500);
        }
        // all good so return the token
        return $this->sendResponse(compact('token') , 'Success');
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
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

}