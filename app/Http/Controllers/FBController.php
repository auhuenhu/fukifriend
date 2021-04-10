<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Validator;

use Exception;
use Auth;
use App\Models\User;

class FBController extends Controller
{
     public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookSignin()
    {

        try {
    
            $user = Socialite::driver('facebook')->user();
            // $user = Socialite::driver('facebook')->stateless()->user();

			
            $facebookId = User::where('facebook_id', $user->id)->first();
     		
            if($facebookId){
                Auth::login($facebookId);
                return redirect('/frontend');
            }else{
                $createUser = User::create([
                    'ten' => $user->name,
                    'email' => $user->email,
                    'gioitinh' => '',
                    'sdt' => '',
                    'quyen' => 0,
                    'facebook_id' => $user->id,
                    'password' => encrypt('john123')
                ]);
    
                Auth::login($createUser);
                return redirect('/frontend');
            }
    
        } catch (SQLException $exception ) {
			// dd('hello');
	           dd($exception->getMessage());
        }
    }
}
