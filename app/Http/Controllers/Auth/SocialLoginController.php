<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToSocial($provider){
        return Socialite::driver($provider)->redirect();
        
    }
    public function callback(Request $request,$provider){
        try {
            $user = Socialite::driver($provider)->user();
            $findUser = User::where('social_id', $user->id)->first();
            if($findUser){
                Auth::login($findUser);
                return redirect()->intended('dasboard.index');
            } else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'password' => encrypt('12345'),

                ]);
            }

        } catch (\Exception $exception) {
            return response()->json([
                'status' => __('google sign in failed'),
                'error' => $exception,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
