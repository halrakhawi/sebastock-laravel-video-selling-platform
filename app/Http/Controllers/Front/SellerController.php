<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SellerRequest;
use App\Http\Requests\LoginRequest;
use App\Notifications\ActiveUser;
use App\Notifications\Blance100;
use Stichoza\GoogleTranslate\GoogleTranslate;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Notification;
use DB;
use Mail;
use App\Models\Seller;
use App\Models\Admin;
use App\Models\VideoAccepted;
use App\Models\Category;
use App\Models\Vedio;
use App\Models\User;
use App\Models\Order;
use App\Models\Offer;
use App\Models\UserDownloads;
use App\Models\WatchLater;
use App\Models\Favorite;
use App\Models\RejectedVideos;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function sellerlogout($lang){
          session()->put('locale', $lang);
        APP::setLocale($lang);
        Session::flush();
        Session()->forget(auth()->user()->name);
        Auth::logout();
        return redirect()->route('front.index',App()->getLocale());
     }
    public function signup($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        return view("front.sellers.sellersignup");
    }
    public function getsellogin($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $tr=new GoogleTranslate($lang);
        return view('front.sellers.login',compact('tr'));
    }

    public function sellogin(LoginRequest $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
       // $remember_me = $request->has('remember_me') ? true : false;
       $seller=Seller::where('email',$request->input("email"))->get();
       // dd($user->get(0)->accept_reject_request);
      // $remember_me = $request->has('remember_me') ? true : false;
   //    dd($user);
     if(isset($seller->get(0)->email)){
if($seller->get(0)->is_verified==1){
        if (auth()->guard('seller')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
           if($seller->get(0)->balance>=100){
                $admins=Admin::all();
                foreach($admins as $admin){
                $notify=$admin->notifications();
                //dd($notify->toArray());
                if(isset($notify)==false){
                    Notification::send($admins,new Blance100($seller->get(0)->balance,$seller));
                }
                }
           }
           return redirect()->route('seller.index',App()->getLocale());
        }
        else
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
}else{
                Mail::send('auth.verify', ['verification_code' => $seller->get(0)->verification_code], function ($m) use ($seller) {
            $m->from('sebastock.en@gmail.com', 'Seba');

            $m->to($seller->get(0)->email, $seller->get(0)->name)->subject('Your Verification Code');
             });
             return redirect()->route('front.verifySeller',$lang)->with(['message' => 'Enter your verification code']);
           }
           }else{
                       return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);

           }
    }

    public function index($lang)
    { 
        session()->put('locale', $lang);
        APP::setLocale($lang);
        //bar
        $barchart = (new LarapexChart)->barChart()
        ->setTitle('Buyers')
        ->addData('User\'s ID',\App\Models\User::query('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().'))')->inRandomOrder()->limit(6)->pluck('id')->toArray())
        ->addData('User\'s Name',\App\Models\User::query('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().'))')->limit(6)->pluck('name')->toArray())
        ->setLabels(\App\Models\User::query('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().'))')->limit(6)->pluck('name')->toArray()); 
        // Line
        $linechart = (new LarapexChart)->lineChart()
        ->setTitle('Views vs Downloads')
        ->addLine('Video\'s views',\App\Models\Vedio::query('select views from vedios where id IN (select video_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().'))')->inRandomOrder()->limit(6)->pluck('views')->toArray())
        ->addLine('Video\'s downloads',\App\Models\Vedio::query('select sales from vedios where id IN (select video_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().'))')->inRandomOrder()->limit(6)->pluck('sales')->toArray())
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'])
        ->setColors(['#ffc63b', '#ff6384']); 

        //total balance line chart
        $balancelinechart = (new LarapexChart)->lineChart()
        ->setTitle('Balance')
        ->addLine('balance',\App\Models\User::query('select balance from sellers where created_at between GETDATE() and GETDATE()-7 && id='.auth('seller')->id().'))')->inRandomOrder()->limit(6)->pluck('id')->toArray())
        ->setXAxis(\App\Models\User::query('select balance from sellers where created_at between GETDATE() and GETDATE()-7 && id='.auth('seller')->id().'))')->inRandomOrder()->limit(6)->pluck('id')->toArray())
        ->setColors(['#ffc63b', '#ff6384']);
        
        
        return view('front.sellers.index',compact('barchart','linechart','balancelinechart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellerRequest $request,$lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        try {
             if($request->checkbox==true){
            $filePath = "";
            if ($request->has('picture')) {
                if ($request->has('picture')) {
                    $fileext=$request->file('picture')->getClientOriginalExtension();
                    $filename=time().'.'.$fileext;
                    $path = $request->file('picture')->move('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/', $filename);
                }
           
            } else{
                 $filename = "user.png";


            }
            $seller=Seller::create([
                'seller_name' => $request['name'],
                'email' => $request['email'],
                'address' => $request['address'],
                'mobile' => $request['mobile'],
                'store_name' => $request['store_name'],
                'picture' => $filename,
                'password'=>bcrypt($request['password']),
                'balance'=>0.0,
                'account' => $request['account'],
                'verification_code'=>substr(md5(rand()),0,7),
                'is_verified'=>0,
                'accept_reject'=>1,
            ]);
             Mail::send('auth.verify', ['verification_code' => $seller->verification_code], function ($m) use ($seller) {
            $m->from('sebastock.en@gmail.com', 'Seba');

            $m->to($seller->email, $seller->name)->subject('Your Verification Code');
             });
            //return 'Logged in';
              return redirect()->route('front.verifySeller',$lang)->with(['message' => 'Enter your verification code']);             }
            else{
                return redirect()->route('front.signup',$lang)->with(['error' => 'you must agree policy']);
            }
             } catch (Exception $ex) {
              return redirect()->route('front.index',App()->getLocale())->with(['error' => 'هناك خطا ما يرجي المحاوله']);
          }
    }

public function verifySeller($lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
      return view('front.verifySeller');
    }
    
    public function postverifySeller(Request $request,$lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
        $seller=Seller::where('verification_code',$request->vCode)->first();
        if($seller!=null){
            $seller->update(['is_verified'=>1]);
             return redirect()->route('sellerlogin',$lang);
        }else
        {
             return redirect()->back()->with(['error'=>'valid verification code']);
        }
           
       
      
    }
    public function sellerActivate($id){
        $seller=Seller::find($id);
        $flag=$seller->accept_reject;
        if($flag==1)
        $seller=Seller::where('seller_id',$id)->update(['accept_reject'=>0]);
        else{
            $seller->notify(new ActiveUser());
            $seller=Seller::where('seller_id',$id)->update(['accept_reject'=>1]);

        }

        return \redirect()->route('admin.userrequests');
    }


    public function buyerDetails($id){
            $user=User::find($id);
            return view('admin.buyerDetails',compact('user'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller=Seller::first($id)->picture;
        return $seller;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seller=Seller::find($id);
        $seller->seller_name=$request['name'];
        $seller->email=$request['email'];
        $seller->store_name=$request['storename'];
        $seller->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function videodelete($id)
    {
        $video=Vedio::find($id)->delete();
        $videoaccept=VideoAccepted::where('video_id',$id)->delete();
        Favorite::where('video_id',$id)->delete();
        WatchLater::where('video_id',$id)->delete();
        UserDownloads::where('video_id',$id)->delete();
        RejectedVideos::where('video_id',$id)->delete();

        return redirect()->route('front.vedios',App()->getLocale());
    }
    public function showvideoupdate($id)
    {

         $video=Vedio::find($id);
        return view('front.sellers.videoupdate',compact('video'));
    }
    
    public function videoupdate(Request $request,$id)
    {
        $video=Vedio::find($id);
        $video->name=$request['name'];
        $video->price=$request['price'];
        $video->details=$request['details'];
        $video->cat_id=$request['cat'];
        $video->update();

        return redirect()->route('front.vedios',App()->getLocale());
    }

    public function getvideos(){
        $user_id=auth('seller')->id();
        $videoss=DB::table('vedios')
        ->join('sellers','sellers.seller_id','vedios.seller_id')
        ->where('sellers.seller_id','=',$user_id)
        ->select('sellers.*')
       ->get();
       return $videoss;
    }

    public function getprofile($id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $profile=Seller::find($id);
        $sellersalling=DB::select('select count(id) as count from order_videos where video_id IN( select id from vedios where seller_id='.$id.')');
        //dd($sellersalling);
        return view('front.sellerprofile',compact('profile','sellersalling'));

    }

    public function sellerprofile($id){
        $profile=Seller::find($id)->get();
        return view('front.sellers.sellerProfile',compact('profile'));

    }

    public function sellers($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $Adminsellers=Seller::paginate(10);
        return view('admin.sellers.sellers',compact('Adminsellers'));
    }

    

    public function sellerDetails($id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $seler=Seller::find($id);
        return view('admin.sellers.sellerDetails',compact('seler'));

    }


    public function search(Request $request){
        //    dd(URL::to('/').'/admin/sellers');
            $q=$request->q;
            $filterdVideos=DB::table('vedios')
            ->join('sellers','sellers.seller_id','vedios.seller_id')
            ->join('categories','categories.id','vedios.cat_id')
            ->where('vedios.name','like','%'.$q.'%')
            ->where('sellers.seller_name','like','%'.$q.'%')
            ->where('categories.name','like','%'.$q.'%')
            ->select('vedios.*','sellers.*')
           ->get();
           return view('front.sellers.getsellersearched',compact(['filterdVideos']));
    }

    public function getbuyersMyVideos($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);

      $buyersMyVideos=DB::table('user_downloads')
        ->join('users','users.id','user_downloads.user_id')
        ->join('vedios','vedios.id','user_downloads.video_id')
        ->where('vedios.seller_id',auth('seller')->id())
        ->select('users.id as UserID','users.name as userName','users.email','users.address','users.mobile','users.created_at','vedios.*')
       ->get()->unique('UserID');
       return view('front.sellers.buyersMyVideos',compact('buyersMyVideos'));
    }

    public function detailsbuyersMyVideos($id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $user=User::find($id);
        return view('front.sellers.buyersMyVideosDetails',compact('user'));

    }


    public function offersMyVideos($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $offers=Offer::all();

        return view('front.sellers.myvideosOffers',compact('offers'));
    }

    public function sellerbalance($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        // dd(((array)priceofsellervideos(9)[0])['sum(price)']);
        // $todaydownloads=DB::query('SELECT * FROM `user_downloads` WHERE created_at=now()')->get();
        $todaydownloads=DB::table('user_downloads')->whereDate('created_at','like', Carbon::now())->pluck('video_id');
        $todaybalance=DB::table('vedios')->where('seller_id',auth('seller')->id())->whereIN('id',$todaydownloads)->sum('price');
        // dd($videos);yesterday()
        $yesterdaydownloads=DB::table('user_downloads')->whereDate('created_at','like', Carbon::yesterday())->pluck('video_id');
        $yesterdaybalance=DB::table('vedios')->where('seller_id',auth('seller')->id())->whereIN('id',$yesterdaydownloads)->sum('price');
       
        $weekdownloads=DB::table('user_downloads')->whereDate('created_at','>=',Carbon::now()->subDays(7))->pluck('video_id');
        $weekbalance=DB::table('vedios')->where('seller_id',auth('seller')->id())->whereIN('id',$weekdownloads)->sum('price');
        // dd($weekbalance);

        $monthdownloads=DB::table('user_downloads')->whereDate('created_at','>=',Carbon::now()->subDays(30))->pluck('video_id');
        $monthbalance=DB::table('vedios')->where('seller_id',auth('seller')->id())->whereIN('id',$monthdownloads)->sum('price');
        // dd($weekbalance);

        $userorder=DB::select('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().'))');
        // dd($userorder);
        return view('front.sellers.balance',compact(['todaybalance','yesterdaybalance','weekbalance','monthbalance','userorder']));
    }


    public function contentsort($urlpram){
        if($urlpram=='sort-asc'){
        $videos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->where('sellers.seller_id',auth('seller')->id())
        ->select('vedios.*','sellers.seller_name')
        ->orderBy('vedios.name', 'asc')
        ->get();;
        return view('front.sellers.sort',compact('videos'));
        }
        //admin/sort/contents
        else if($urlpram=='sort-desc'){
            $videos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->where('sellers.seller_id',auth('seller')->id())
        ->select('vedios.*','sellers.seller_name')
        ->orderBy('vedios.name', 'desc')
        ->get();;
        return view('front.sellers.sort',compact('videos'));
        }
        else if($urlpram=='sort-recent'){
            $videos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->where('sellers.seller_id',auth('seller')->id())
        ->select('vedios.*','sellers.seller_name')
        ->orderBy('vedios.created_at', 'asc')
        ->get();
            return view('front.sellers.sort',compact('videos'));
        }
        else if($urlpram=='sort-old'){
            $videos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->where('sellers.seller_id',auth('seller')->id())
        ->select('vedios.*','sellers.seller_name')
        ->orderBy('vedios.created_at', 'desc')
        ->get();
            return view('front.sellers.sort',compact('videos'));
        }

        $cats=Category::all();

    foreach ($cats as $cat) {
    if($urlpram=='cat-'.$cat->name){
        $videos=DB::table('vedios')
        ->join('video_accepteds','video_accepteds.video_id','vedios.id')
        ->join('categories','categories.id','vedios.cat_id')
        ->join('sellers','sellers.seller_id','vedios.seller_id')
        ->where('categories.name',$cat->name)
        ->where('sellers.seller_id',auth('seller')->id())
        ->select('vedios.*','sellers.seller_name')
        ->get();
        return view('front.sellers.sort',compact('videos'));
    }
    }
    }

    public function buyersort($urlpram){
        if($urlpram=='sort-asc'){
        $userss=DB::select('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().')) order by name asc');
        return view('front.sellers.buyersort',compact('userss'));
        }
        //admin/sort/contents
        elseif($urlpram=='sort-desc'){
            $userss=DB::select('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().')) order by name desc');
            return view('front.sellers.buyersort',compact('userss'));
        }
    
        elseif($urlpram=='sort-recent'){
            $userss=DB::select('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().')) order by created_at desc');
            return view('front.sellers.buyersort',compact('userss'));
        }
    
        elseif($urlpram=='sort-old'){
            $userss=DB::select('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().')) order by created_at asc');
            return view('front.sellers.buyersort',compact('userss'));
        }
        //leastdownload
        elseif($urlpram=='sort-mostdownload'){
            $userss=DB::select('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().'))');
            return view('front.sellers.buyersort',compact('userss'));
        }
        elseif($urlpram=='sort-leastdownload'){
            $userss=DB::select('select * from users where id IN (select user_id from user_downloads where video_id IN(select id from vedios where seller_id='.auth('seller')->id().'))');
            return view('front.sellers.buyersort',compact('userss'));
        }
    }

    public function offerssort($urlpram){
        if($urlpram=='sort-asc'){
    
            $of=DB::table('offers')
            ->join('vedios','vedios.id','offers.video_id')
            ->select('vedios.*','offers.*')
            ->orderBy('vedios.name', 'asc')
            ->get();
        return view('front.sellers.sortmyvideosOffers',compact('of'));
        }
        //admin/sort/contents
        elseif($urlpram=='sort-desc'){
            $of=DB::table('offers')
            ->join('vedios','vedios.id','offers.video_id')
            ->select('vedios.*','offers.*')
            ->orderBy('vedios.name', 'desc')
            ->get();
            return view('front.sellers.sortmyvideosOffers',compact('of'));
        }
        elseif($urlpram=='sort-recent'){
            $of=DB::table('offers')
            ->join('vedios','vedios.id','offers.video_id')
            ->select('vedios.*','offers.*')
            ->orderBy('offers.created_at', 'desc')
            ->get();
            return view('front.sellers.sortmyvideosOffers',compact('of'));
        }
    
        elseif($urlpram=='sort-old'){
            $of=DB::table('offers')
            ->join('vedios','vedios.id','offers.video_id')
            ->select('vedios.*','offers.*')
            ->orderBy('offers.created_at', 'asc')
            ->get();
            return view('front.sellers.sortmyvideosOffers',compact('of'));
        }
        $cats=Category::all();
    
        foreach ($cats as $cat) {
        if($urlpram=='cat-'.$cat->name){
            $of=DB::table('vedios')
            ->join('offers','offers.video_id','vedios.id')
            ->join('categories','categories.id','vedios.cat_id')
            ->select('vedios.*','offers.*')
            ->where('categories.name',$cat->name)
            ->get();
            return view('front.sellers.sortmyvideosOffers',compact('of'));
        }
        }
    }
    public function messagessort($urlpram){
        if($urlpram=='sort-asc'){
    
            $msg=DB::table('messages')
            ->where('reciever_id',auth('seller')->id())
            ->select('messages.*')
            ->orderBy('messages.subject', 'asc')
            ->get();
        return view('front.sellers.sortmessages',compact('msg'));
        }
        //admin/sort/contents
        elseif($urlpram=='sort-desc'){
            $msg=DB::table('messages')
            ->where('reciever_id',auth('seller')->id())
            ->select('messages.*')
            ->orderBy('messages.subject', 'desc')
            ->get();
            return view('front.sellers.sortmessages',compact('msg'));
        }
    
    }

    public function contentdetails($id){
        $video=Vedio::find($id);
        return view('front.sellers.content_details',compact(['id','video']));
    }
    
    
     public function sellergetPassword($token) {

        return view('front.sellerrest', ['token' => $token]);
     }
 
     public function sellerupdatePassword(Request $request)
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
 
           $seller = Seller::where('email', $request->email)
                       ->update(['password' => Hash::make($request->password)]);
 
           DB::table('password_resets')->where(['email'=> $request->email])->delete();
 
           return redirect()->route('sellerlogin',App()->getlocale())->with('message', 'Your password has been changed!');
     }
     
      public function commentmarkAsRead($lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
        $seller=Seller::find(auth('seller')->id());
    // dd($user);
    $seller->unreadNotifications->first()->markAsRead();
         return redirect()->back();
     
     }
}
