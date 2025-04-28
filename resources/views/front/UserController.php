<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Offer;
use Carbon\Carbon;
use App\Models\UserDownloads;
use App\Models\RequestUser;
use App\Models\Advertisment;
use App\Notifications\ActiveUser;
use Illuminate\Support\Facades\View;
use Stichoza\GoogleTranslate\GoogleTranslate;
use URL;
use DB;
use Mail;
use Auth;
use Session;

class UserController extends Controller
{
    
    public function home($lang){
        $adv1=DB::table('advertisments')->inRandomOrder()->first();
        session()->put('adv1', $adv1);
        session()->put('locale', $lang);
        APP::setLocale($lang);
        if (auth('seller')->user()||auth('admin')->user()||auth('user')->user()) {
        return redirect()->route('front.indexlogining',App()->getLocale());
    }
    else 
    return redirect()->route('front.index',App()->getLocale());
    }
    public function getlogin($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $tr=new GoogleTranslate($lang);
        return view('front.login',compact('tr'));
    }

    public function login(LoginRequest $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        try{
        $user=User::where('email',$request->input("email"))->get();
        // dd($user->get(0)->accept_reject_request);
       // $remember_me = $request->has('remember_me') ? true : false;
    //    dd($user);
       if(isset($user->get(0)->email)){
 if($user->get(0)->is_verified==1){
        if (auth()->guard('user')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
           // notify()->success('تم الدخول بنجاح  ');
          // return 'login';
          //dd($user->get(0)->is_verified);
          
           return redirect()->route('front.indexlogining',App()->getLocale());
           
           
        }else
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
       //return 'هناك خطا بالبيانات';
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
}else{
                Mail::send('auth.verify', ['verification_code' => $user->get(0)->verification_code], function ($m) use ($user) {
            $m->from('sebastock.en@gmail.com', 'Seba');

            $m->to($user->get(0)->email, $user->get(0)->name)->subject('Your Verification Code');
             });
             return redirect()->route('front.verifyUser',$lang)->with(['message' => 'Enter your verification code']);
           }
       }else{
                  return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
 
       }      
}catch(Excption $ex){
       
    }
    }
    public function indexunlogin($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $offers=Offer::all();
           foreach ($offers as $offer) {
               if($offer->enddate <= Carbon::now()->toDateTimeString())
               $offer->delete();
           }
        // $tr= new GoogleTranslate($lang);
        // View::share('tr', $tr);
        return view('front.index');
    }

    public function index($lang){
        // dd($lang);
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $offers=Offer::all();
           foreach ($offers as $offer) {
               if($offer->enddate <= Carbon::now()->toDateTimeString())
               $offer->delete();
           }
        return view('front.indexlogining');
    }
    public function signup($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $tr= new GoogleTranslate($lang);
        return view('front.signup',compact('tr'));
    }
    
    public function aboutus($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        return view('front.aboutUs');
    }
    
    public function error500($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        return view('front.error500');
    }

    public function store(UserRequest $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        try {
            $users = User::where('email', '=', $request->input('email'))->first();
            if ($users === null) {
            // User does not exist
            
            //echo($request->checkbox);
            if($request->checkbox==true){
                
                // if(auth('user')->email==$request['email'])
                //     return redirect()->route('front.error500',$lang);
            $filePath = "";
            if ($request->has('picture')) {
                if ($request->has('picture')) {
                    $fileext=$request->file('picture')->getClientOriginalExtension();
                    $filename=time().'.'.$fileext;
                    $path = $request->file('picture')->move('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/', $filename);
                //$filePath = uploadImage('images', $request->picture);
            }
        } else{
                 $filename = "user.png";


            }
            $user=User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'address' => $request['address'],
                'mobile' => $request['mobile'],
                'picture' => $filename,
                'password'=>bcrypt($request['password']),
                'verification_code'=>substr(md5(rand()),0,7),
                'is_verified'=>0,
                'accept_reject_request'=>1,
            ]);
            
            Mail::send('auth.verify', ['verification_code' => $user->verification_code], function ($m) use ($user) {
            $m->from('sebastock.en@gmail.com', 'Seba');

            $m->to($user->email, $user->name)->subject('Your Verification Code');
             });
            
            // $message='verify/'.\base64_encode($user->email).'/'.\base64_encode($user->verification_code);
            // //$message='verify/'.\base64_encode($this->email).'/'.\base64_encode($guest>verification_code).'/'.\base64_encode('user_type');
            //   $subject = 'Email verification';
            //   Mail::to($user->email)->send(($message));


            //return 'Logged in';
              return redirect()->route('front.verifyUser',$lang)->with(['message' => 'Enter your verification code']);
            }
            else{
                return redirect()->route('front.signup',$lang)->with(['error' => 'you must agree policy']);
            }
            } else {
             return redirect()->route('front.signup',$lang)->with(['error' => 'Email was used from another user.']);
            }
          } catch (Exception $ex) {
              return redirect()->route('front.index')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
          }
    }
    
    public function verifyUser($lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
      return view('front.verifyUser');
    }
    
    public function postverifyUser(Request $request,$lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
        $user=User::where('verification_code',$request->vCode)->first();
        if($user!=null){
            $user->update(['is_verified'=>1]);
            return redirect()->route('front.indexlogining',$lang);
        }else
        {
           return redirect()->back()->with(['error'=>'valid verification code']); 
        }
       
      
    }

    public function userrequests($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $Adminbuyers=User::paginate(10);
        $Adminsellers=Seller::paginate(10);
        $Adminuserrequests=new Paginator($Adminbuyers->merge($Adminsellers),1);
        return view('admin.userrequests',compact(['Adminbuyers','Adminsellers','Adminuserrequests']));
    }

    public function Adminbuyers($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $Adminbuyers=User::paginate(10);
        return view('admin.buyers',compact('Adminbuyers'));
    }

    public function userActivate($id){
        $user=User::find($id);
        $flag=$user->accept_reject_request;
        if($flag==1)
        $user=User::where('id',$id)->update(['accept_reject_request'=>0]);
        else{
            $user->notify(new ActiveUser());
            $user=User::where('id',$id)->update(['accept_reject_request'=>1]);

        }

        return \redirect()->route('admin.userrequests');
    }


    public function buyerDetails($id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
            $userdownloads=UserDownloads::where('user_id',$id)->get();
            $user=User::find($id);
            return view('admin.buyerDetails',compact(['user','userdownloads']));

    }

    public function userprofile($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        dd(auth());
        // $seller=Seller::find(auth('seller')->id());
        // $user=User::find(auth('user')->id());
        // return view('front.users.profile',compact('user'));
        // return view('front.users.profile',compact('user'));
    }
    public function profile($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        if(auth()->user()==auth('user')->user()){
            $user=User::find(auth()->id());
         return view('front.users.profile',compact('user'));
        }
        elseif(auth()->user()==auth('seller')->user()){
            $user=Seller::find(auth()->id());
         return view('front.users.profile',compact('user'));
        }
        elseif(auth()->user()==auth('admin')->user()){
            $user=Admin::find(auth()->id());
         return view('front.users.profile',compact('user'));
        }
        // $user=User::find(auth()->id());
        // return view('front.users.profile',compact('user'));
       
    }

    public function update(Request $request){
        $user=User::where('id',auth('user')->id())->first();
        $user->name=$request->input('name');
        $user->address=$request->input('address');
        $user->mobile=$request->input('mobile');
        $user->email=$request->input('email');
        $user->update();
        return back();
    }
    public function updateimage(Request $request){
        $user=User::where('id',auth('user')->id())->first();
        $seller=Seller::where('seller_id',auth('seller')->id())->first();
        $admin=Admin::where('id',auth('admin')->id())->first();
               
           
        if(auth()->user()==auth('user')->user()){
             
             if ($request->has('img')) {
                   
                    $fileext=pathinfo($request->picture, PATHINFO_EXTENSION);
                    $filename=time().'.'.$fileext;
                    $path = $request->file('img')->move('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/', $filename);}
        $user->picture=$filename;
        $user->save();
        }elseif(auth()->user()==auth('seller')->user()){
             if ($request->has('img')) {
                    $fileext=pathinfo($request->picture, PATHINFO_EXTENSION);
                    $filename=time().'.'.$fileext;
                    $path = $request->file('img')->move('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/', $filename);}
            $seller->picture=$filename;
        $seller->save();
        }elseif(auth()->user()==auth('admin')->user()){
             if ($request->has('img')) {
                    $fileext=pathinfo($request->picture, PATHINFO_EXTENSION);
                    $filename=time().'.'.$fileext;
                    $path = $request->file('img')->move('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/', $filename);}
            $admin->picture=$filename;
            $admin->save();
        }
        return back();
        
        
    }
    
    public function getPassword($token) {

        return view('front.reset', ['token' => $token]);
     }
 
     public function updatePassword(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required',
 
         ]);
 
         $updatePassword = DB::table('password_resets')
                             ->where(['email' => $request->email, 'token' => $request->token])
                             ->first();
 
         if(!$updatePassword)
             return back()->withInput()->with('error', 'Invalid token!');
 
           $user = User::where('email', $request->email)
                       ->update(['password' => Hash::make($request->password)]);
 
           DB::table('password_resets')->where(['email'=> $request->email])->delete();
 
           return redirect()->route('login',App()->getlocale())->with('message', 'Your password has been changed!');
     }
     
     public function chooseform(Request $request){
     
         if($request->name=='buyer')
             return view('front.signup');
        else
        return view("front.sellers.sellersignup");
     }
     public function userlogout($lang){
     session()->put('locale', $lang);
        APP::setLocale($lang);
        Session::flush();
        Auth::logout();
        return redirect()->route('front.index',App()->getLocale());
     }
     
     public function addVideomarkAsRead($videoid,$lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
         $user=User::find(auth('user')->id());
    // dd($user);
    $user->unreadNotifications->first()->markAsRead();
    return redirect()->route('videodetails',[$videoid,App()->getLocale()]);
         
     
     }
     public function activemarkAsRead($lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
        $user=User::find(auth('user')->id());
    // dd($user);
    $user->unreadNotifications->first()->markAsRead();
         return redirect()->back();
     
     }
     public function godashboard($lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
       if(auth()->user()==auth('seller')->user())
        return redirect()->route('seller.index',App()->getLocale());
        elseif(auth()->user()==auth('admin')->user())
        return redirect()->route('admin.dashboard',App()->getLocale());
     
     }
}
