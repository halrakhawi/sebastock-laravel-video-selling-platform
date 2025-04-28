<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Mail;
use App;

class ForgotPasswordController extends Controller
{
    public function usergetEmail()
    {
        //dd(auth()->user());
       return view('front.passwordemail');
    }
    public function getEmail($lang)
    {
          session()->put('locale', $lang);
        APP::setLocale($lang);
       return view('front.passwordemail');
    }
    public function sellergetEmail($lang)
    {
          session()->put('locale', $lang);
        APP::setLocale($lang);

       return view('front.sellerpasswordemail');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('front.verfiy',['token' => $token], function($message) use ($request) {
                  $message->from('sebastock.en@gmail.com');
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    
    public function sellerpostEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('front.sellerverify',['token' => $token], function($message) use ($request) {
                  $message->from('sebastock.en@gmail.com');
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
