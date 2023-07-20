<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Auth\LoginRequest;
use Auth;
use App\Models\User;
use App\Http\Resources\Api\Login\UserResource;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(LoginRequest $request)
    {
        if(!Auth::attempt($request->only(['phone', 'password']))){
            return response()->json([
                'status' => false,
                'message' => 'بينات الدخول غير صحيحه',
                'errors' => [] , 
                'data' => (object)[]
            ], 401);
        }


        $user = User::where('phone' , $request->phone )->first();

        return response()->json([
            'status' => true , 
            'message' => 'تم تسجيل الدخول بنجاح' , 
            'errors' => [] , 
            'data' => (object) [
                'token' => Auth::user()->createToken("API TOKEN")->plainTextToken , 
                'user' => new UserResource($user) , 
            ] , 
        ], 200);
    }

}
