<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Permet d'authetifiquer un utilisateur et de lui crée une session (par token)
     */
    public function login(LoginRequest $request){
        //retrouver l'utilisateur
        $user = User::where('name',$request->input('name'))->first();
        if(!$user){
            return response([
                'message'=>'Auth error',
                'errors'=>["user"=>['User not found']],
            ],404);
        }

        //verifier son mot de passe
        $password_match = Hash::check($request->input('password'),$user->password);
        if(!$password_match){
            return response([
                'message'=>'Auth error',
                'errors'=>["password"=>['Password doesn\'t match']],
            ],401);
        }

        //crée un token et le retourner
        $token = $user->createToken('App_token');
        return [
            "message"=>"Auth successfull",
            "token"=>$token->plainTextToken,
            "user"=>new UserResource($user)
        ];
    }

    /**
     * Deconnexion
     */
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return ["message"=>"You are now logged out!"];
    }

    /**
     * Deconnexion de toute les session de l'utilisateur courant
     */
    public function logAllOut(Request $request){
        $request->user()->tokens()->delete();
        return ["message"=>"This accoun't is now logged out everywhere!"];
    }

    /**
     * Une route utilitaire pour verifier si le token de l'utilisateur est toujour valid
     */
    public function checkAuth(Request $request){
        return ["message"=>"You are logged in !","data"=>new UserResource($request->user())];
    }
}
