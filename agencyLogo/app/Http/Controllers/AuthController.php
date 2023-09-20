<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Validator;
use JWTAuth;
use Auth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct() {
    //     $this->middleware('auth:api', ['except' => ['login', 'register',]]);
    // }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success'=>false,
                'message' => $validator->errors()->toJson()
    
            ], 422);
            // return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->guard('api')->attempt($validator->validated())) {
            return response()->json([
                
                'success'=>false,
                'error' => 'Unauthorized',

                 'message'=> 'Please Check your Credentials'
        ], 401);
        }      

        return $this->createNewToken($token);   
        
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
   public function register(Request $request)
     {

         if($request->google_id or $request->facebook_id or $request->apple_id)
        {

            if($request->google_id)
            {
            $user = User::where('google_id', '=', $request->google_id)->first();
            }
            elseif($request->facebook_id) 
            {
            $user = User::where('facebook_id', '=', $request->facebook_id)->first();
            }
            else
            {
                $user = User::where('apple_id', '=', $request->apple_id)->first();

            }
            if($user)
             {
                $token = JWTAuth::fromUser($user);
                return response()->json([
                    'success'=>true,
                    'message' => 'You have login Successfuly',
        
                    'data' => [
                        'user' =>$user,
                        'access_token'=>$token
                      ]
                ], 201);    
        
            }
            else
            {

                $validator = Validator::make($request->all(), [
                    'email' => 'required|string|email|max:255|unique:users'
                ]);
        
                if($validator->fails()){
                        return response()->json([
                            'success'=>false,
                            // 'message' => $validator->errors()->toJson()
                             'message'=> 'Email or mobile Number already exist',
                
                        ], 400);
                }
        

            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'mobile_number' => $request->get('mobile_number'),
                // 'password' => Hash::make($request->get('password')),
                'google_id'=>$request->get('google_id'),
                'facebook_id'=>$request->get('facebook_id'),
                'apple_id'=>$request->get('apple_id'),

                'role'=> "2",
            ]);
        }
    }
        else{
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile_number' =>'required|string|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
                return response()->json([
                    'success'=>false,
                    // 'message' => $validator->errors()->toJson()
                     'message'=> 'Email or mobile Number already exist',
        
                ], 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile_number' => $request->get('mobile_number'),
            'password' => Hash::make($request->get('password')),
            'google_id'=>$request->get('google_id'),
            'facebook_id'=>$request->get('facebook_id'),
            'apple_id'=>$request->get('apple_id'),

            'role'=> "2",
        ]);
    }

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'success'=>true,
            'message' => 'You have Registered Successfuly',

            'data' => [
                'user' =>$user,
                'access_token'=>$token
              ]
        ], 201);    
 

       
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
       
        auth()->guard('api')->logout();

        return response()->json([
            'Success'=> true,
            'message' => 'User successfully signed out'
        
        ],200);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
 
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {


        return response()->json([

            'success'=>true,
            'message'=> 'User Profile',
            
            'data'=>auth()->user()
        ],200);
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'success'=>true,
            'message'=>'you have successfuly login',
         
            // 'token_type' => 'bearer',
            // 'expires_in' => auth('api')->factory()->getTTL() * 60,

            'data' => [
                'access_token' => $token,
                'user'=> auth('api')->user()
               
              ]
            ],200);   
            
    }


}