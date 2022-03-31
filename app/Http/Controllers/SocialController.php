<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Carbon\Carbon;

class SocialController extends Controller
{
     /**
     * 將用戶重定向到GitHub身份驗證頁面。
     *
     * @return \Illuminate\Http\Response
     */

     public function redirectToProvider(){
        return Socialite::driver('github')->redirect();
     }

     /**
     * 從GitHub獲取用戶信息。
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallback(){
        //利用第三方登入與github溝通，取得使用者訊息
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('email', $githubUser->email)->first();
        if(!$user){
            $user = User::updateOrCreate([
                'name' => $githubUser->nickname,
                'email' => $githubUser->email,
                'password' => bcrypt('githubtest'),
                'email_verified_at' => now()
            ]);
        }

        Auth::login($user);
        return redirect('/');
    }
}
