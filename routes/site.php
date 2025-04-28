<?php

use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

//use User;

/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
   

//     if (auth('seller')->user()||auth('admin')->user()||auth('user')->user()) {
//         return redirect()->route('front.indexlogining',App()->getLocale());
//     }
//     else 
//     return redirect()->route('front.index',App()->getLocale());
//     // return view('front.index');
// })->name('home');
Route::get('/',function(){ return redirect()->route('home',App()->getLocale());});
Route::get('/{lang}', [App\Http\Controllers\Front\UserController::class,'home'])->name('home');
Route::get('aboutUs/{lang}',[App\Http\Controllers\Front\UserController::class,'aboutus'])->name('aboutus');
    Route::get('/error500/{lang}',[App\Http\Controllers\Front\UserController::class,'error500'])->name('front.error500');    
Route::get('/signup/{lang}',[App\Http\Controllers\Front\UserController::class,'signup'])->name('front.signup');

Route::group(['middleware'=>'guest:user,admin,seller'], function () {
    Route::get('/verifyUser/{lang}',[App\Http\Controllers\Front\UserController::class,'verifyUser'])->name('front.verifyUser');    
    Route::post('/verifyUser/{lang}',[App\Http\Controllers\Front\UserController::class,'postverifyUser'])->name('front.postverifyUser');    
    Route::get('/signup/{lang}',[App\Http\Controllers\Front\UserController::class,'signup'])->name('front.signup');    
    Route::post('/signup/{lang}',[App\Http\Controllers\Front\UserController::class,'store'])->name('front.store');
    Route::get('login/{lang}',[App\Http\Controllers\Front\UserController::class,'getlogin'])->name('login');
    Route::post('login/{lang}',[App\Http\Controllers\Front\UserController::class,'login'])->name('front.postlogin');
    Route::post('/chooseform/{lang}',[App\Http\Controllers\Front\UserController::class,'chooseform'])->name('front.chooseform');
     
});

Route::group(['middleware'=>'guest:seller'], function () {
    //
    Route::get('/verifySeller/{lang}',[App\Http\Controllers\Front\SellerController::class,'verifySeller'])->name('front.verifySeller');    
    Route::post('/verifySeller/{lang}',[App\Http\Controllers\Front\SellerController::class,'postverifySeller'])->name('front.postverifySeller');
    Route::get('/homeg',function(){ return redirect()->route('front.index',App()->getLocale());});
    Route::get('/homeg/{lang}',[App\Http\Controllers\Front\UserController::class,'indexunlogin'])->name('front.index');
    Route::get('/sellersignup/{lang}',[App\Http\Controllers\Front\SellerController::class,'signup'])->name('sellersignup');    
    Route::post('/sellersignup/{lang}',[App\Http\Controllers\Front\SellerController::class,'store'])->name('sellerstore');
    Route::get('sellerlogin/{lang}',[App\Http\Controllers\Front\SellerController::class,'getsellogin'])->name('sellerlogin');
    Route::post('sellerlogin/{lang}',[App\Http\Controllers\Front\SellerController::class,'sellogin'])->name('seller.postlogin');
});

Route::group(['middleware'=>'auth:user,admin,seller'], function () {
    //Route::get('/profile/{lang}',[App\Http\Controllers\Front\UserController::class,'userprofile'])->name('user.profile');
    Route::get('/userprofile/{lang}',[App\Http\Controllers\Front\UserController::class,'profile'])->name('profile');
    Route::get('/godashboard/{lang}',[App\Http\Controllers\Front\UserController::class,'godashboard'])->name('godashboard');
    Route::get('/home/{lang}',function(){ return redirect()->route('front.indexlogining',App()->getLocale());});
    Route::get('/home/{lang}',[App\Http\Controllers\Front\UserController::class,'index'])->name('front.indexlogining');
    Route::get('/logout/{lang}',[App\Http\Controllers\Front\UserController::class,'userlogout'])->name('logout');
    // function($lang){
    //     $lang=App()->getLocale();
    //     Session::flush();
    //     Auth::logout();
    //     return redirect()->route('front.index',App()->getLocale());
    // })->name('logout');

});

Route::group(['middleware'=>'auth:seller'], function () {
    Route::get('/sellerhome/{lang}',[App\Http\Controllers\Front\SellerController::class,'index'])->name('seller.index');
    Route::get('/sellerlogout/{lang}',[App\Http\Controllers\Front\SellerController::class,'sellerlogout'])->name('sellerlogout');

   

    ############################### Vedios Routs #####################################
    
    Route::get('/vedios/{lang}',[App\Http\Controllers\Front\VedioController::class,'index'])->name('front.vedios');
    Route::get('/vedios/create/{lang}',[App\Http\Controllers\Front\VedioController::class,'create'])->name('front.vedios.create');
    Route::post('/vedios/store',[App\Http\Controllers\Front\VedioController::class,'store'])->name('front.vedios.store');
    Route::get('/vedios/edit/{id}',[App\Http\Controllers\Front\VedioController::class,'edit'])->name('front.vedios.edit');
    Route::post('/vedios/update/{id}',[App\Http\Controllers\Front\VedioController::class,'update'])->name('front.vedios.update');       
    Route::post('/vedios/delete/{id}',[App\Http\Controllers\Front\VedioController::class,'destroy'])->name('front.vedios.delete');
    Route::get('/uploadvideoerror/{lang}',[App\Http\Controllers\Front\VedioController::class,'uploadvideoerror'])->name('uploadvideoerror');

    ############################### End Vedios Routs #################################
//


});
use App\Models\Message;
use App\Models\Category;
use App\Models\Vedio;
use App\Models\Seller;
use App\Models\User;
use App\Models\Offer;
use App\Models\VideoAccepted;
Route::get('/Seba/storage/videos/{filename}',[App\Http\Controllers\Front\VedioController::class,'getfile1'])->name('file1');//->middleware('auth:seller');
Route::get('categoryvideos/{id}/{lang}', [App\Http\Controllers\Admin\CategoriesController::class,'getvideos'])->name('categoryvideos');
Route::get('allcategories/{lang}', [App\Http\Controllers\Admin\CategoriesController::class,'getcategories'])->name('allcategories');
Route::get('morenewvideos/{lang}', [App\Http\Controllers\Front\VedioController::class,'morenewvideos'])->name('morenewvideos');
Route::get('mostwatch/{lang}', [App\Http\Controllers\Front\VedioController::class,'mostwatch'])->name('mostwatch');
Route::get('moreoffervideos/{lang}', [App\Http\Controllers\Front\VedioController::class,'moreoffervideos'])->name('moreoffervideos');
Route::get('sellerprofile/{id}/{lang}',[App\Http\Controllers\Front\SellerController::class,'getprofile'])->name('sellerprofile');
Route::get('videodetails/{id}/{lang}',[App\Http\Controllers\Front\VedioController::class,'videodetails'])->name('videodetails');
Route::get('watchlater/{video_id}/{lang}',[App\Http\Controllers\Front\VedioController::class,'watchlater'])->name('watchlater')->middleware('auth:user,seller,admin');
Route::get('showwatchlater/{lang}',[App\Http\Controllers\Front\VedioController::class,'showwatchlater'])->name('showwatchlater')->middleware('auth:user,seller,admin');
Route::get('watchlater/delete/{id}/{lang}',[App\Http\Controllers\Front\VedioController::class,'deletewatchlater'])->name('deletewatchlater')->middleware('auth:user,seller,admin');
Route::get('downloadVideo/{video_id}',[App\Http\Controllers\Front\VedioController::class,'getvideo'])->name('downloadVideo');//->middleware('auth:user,seller,admin');
Route::get('downloads/{lang}',[App\Http\Controllers\Front\VedioController::class,'downloads'])->name('downloads')->middleware('auth:user,seller,admin');
Route::get('showcharges/{lang}',[App\Http\Controllers\Front\VedioController::class,'showcharges'])->name('showcharges');//->middleware('auth:user,seller,admin');
// Route::get('getvideo/{video_id}',[App\Http\Controllers\Front\VedioController::class,'getvideo'])->name('getvideo')->middleware('auth:user');
Route::post('search/{lang}',[App\Http\Controllers\Front\VedioController::class,'search'])->name('front.search');
// Route::get('profile/{lang}',[App\Http\Controllers\Front\UserController::class,'userprofile'])->name('user.profile')->middleware('auth:user,seller,admin');
Route::any('updateprofile',[App\Http\Controllers\Front\UserController::class,'update'])->name('user.updateprofile')->middleware('auth:user,seller,admin');
Route::any('updateimageprofile',[App\Http\Controllers\Front\UserController::class,'updateimage'])->name('user.updateimageprofile')->middleware('auth:user,seller,admin');
Route::post('share/{lang}',[App\Http\Controllers\Front\VedioController::class,'share'])->name('front.share');
Route::post('filter/{lang}',[App\Http\Controllers\Front\VedioController::class,'filter'])->name('front.filter');
Route::post('sellersearch',[App\Http\Controllers\Front\SellerController::class,'search'])->name('seller.search');
Route::get('seller/buyers/{lang}',[App\Http\Controllers\Front\SellerController::class,'getbuyersMyVideos'])->name('seller.getrbuyersMyVideos')->middleware('auth:seller');
Route::get('seller/buyers/details/{id}/{lang}',[App\Http\Controllers\Front\SellerController::class,'detailsbuyersMyVideos'])->name('seller.detailsbuyersMyVideos')->middleware('auth:seller');
Route::get('seller/offers/{lang}',[App\Http\Controllers\Front\SellerController::class,'offersMyVideos'])->name('seller.offersMyVideos')->middleware('auth:seller');
Route::get('seller/balance/{lang}',[App\Http\Controllers\Front\SellerController::class,'sellerbalance'])->name('seller.sellerbalance')->middleware('auth:seller');
Route::post('seller/video/delete/{id}',[App\Http\Controllers\Front\SellerController::class,'videodelete'])->name('seller.videodelete')->middleware('auth:seller');
Route::post('seller/video/update/{id}',[App\Http\Controllers\Front\SellerController::class,'videoupdate'])->name('seller.videoupdate')->middleware('auth:seller');
Route::get('seller/video/update/{id}',[App\Http\Controllers\Front\SellerController::class,'showvideoupdate'])->name('seller.showvideoupdate')->middleware('auth:seller');



Route::get('favorite/{video_id}',[App\Http\Controllers\Front\VedioController::class,'favorite'])->name('favorite')->middleware('auth:user,seller,admin');
Route::get('showfavorite/{lang}',[App\Http\Controllers\Front\VedioController::class,'showfavorite'])->name('showfavorite')->middleware('auth:user,seller,admin');
Route::get('favorite/delete/{id}/{lang}',[App\Http\Controllers\Front\VedioController::class,'deletefavorite'])->name('deletefavorite')->middleware('auth:user,seller,admin');
Route::get('add-cart/{video}/{lang}',[App\Http\Controllers\Front\VedioController::class,'addCart'])->name('addcart');
Route::get('addalltocart/{lang}',[App\Http\Controllers\Front\VedioController::class,'addallCart'])->name('addallcart');
Route::get('shoppingCart/{lang}',[App\Http\Controllers\Front\VedioController::class,'showCart'])->name('showcart');
// Route::get('emptyshoppingCart/{lang}',[App\Http\Controllers\Front\VedioController::class,'emptyshowCart'])->name('emptyshowcart')->middleware('auth:user');

Route::get('/checkout/{amount}/{lang}',[App\Http\Controllers\Front\VedioController::class,'checkout'])->name('checkout');
Route::get('/emptycart/{lang}',[App\Http\Controllers\Front\VedioController::class,'emptycart'])->name('emptycart');
Route::get('/deletevideofromcart/{id}/{lang}',[App\Http\Controllers\Front\VedioController::class,'deletevideofromcart'])->name('deletevideofromcart');

Route::post('Addcomment/{video}',[App\Http\Controllers\Front\CommentController::class,'store'])->name('comment')->middleware('auth:user,seller,admin');

Route::get('/sellermessages/{lang}',[App\Http\Controllers\Admin\MessageController::class,'sellermessages'])->name('seller.Message')->middleware('auth:seller');
Route::post('/sellermessages/sellerstore',[App\Http\Controllers\Admin\MessageController::class,'sellerstore'])->name('seller.Message.store');
Route::get('/sellermessages/details/{id}',[App\Http\Controllers\Admin\MessageController::class,'sellermessagedetails'])->name('seller.messages.details')->middleware('auth:seller');
Route::get('/sellermessages/delete',[App\Http\Controllers\Admin\MessageController::class,'sellerdestroy'])->name('seller.Message.delete');
Route::get('seller/profile/{id}',[App\Http\Controllers\Front\SellerController::class,'sellerprofile'])->name('getsellerprofile')->middleware('auth:seller');
Route::post('sellerupdate/{id}',[App\Http\Controllers\Front\SellerController::class,'update'])->name('sellerupdate')->middleware('auth:seller');

Route::get('orders',[App\Http\Controllers\Front\OrderController::class,'index'])->name('orders')->middleware('auth:user,seller,admin');
Route::post('charge/{lang}', [App\Http\Controllers\Front\VedioController::class,'charge'])->name('charge');

Route::get('usermessages/{lang}',[App\Http\Controllers\Front\UserMessagesController::class,'index'])->name('user.messages')->middleware('auth:user,seller,admin');
Route::post('usermessages/send/{lang}',[App\Http\Controllers\Front\UserMessagesController::class,'store'])->name('user.messages.send')->middleware('auth:user,seller,admin');
Route::get('/messages/details/{id}/{lang}',[App\Http\Controllers\Front\UserMessagesController::class,'details'])->name('user.messages.details')->middleware('auth:user,seller,admin');
Route::get('/messages/delete/{id}',[App\Http\Controllers\Front\UserMessagesController::class,'destroy'])->name('user.messages.delete');
Route::post('contactus/{lang}',[App\Http\Controllers\Front\UserMessagesController::class,'contactus'])->name('user.contactus');
Route::get('contactus/details/{id}/{lang}',[App\Http\Controllers\Front\UserMessagesController::class,'contactusdetails'])->name('user.contactusdetails');

Route::get('/userforgetpassword/{lang}',[App\Http\Controllers\Front\ForgotPasswordController::class,'getEmail'])->name('user.getEmail');
Route::get('/sellerforgetpassword/{lang}',[App\Http\Controllers\Front\ForgotPasswordController::class,'sellergetEmail'])->name('seller.getEmail');
Route::post('postEmail',[App\Http\Controllers\Front\ForgotPasswordController::class,'postEmail'])->name('user.postEmail');
Route::post('sellerpostEmail',[App\Http\Controllers\Front\ForgotPasswordController::class,'sellerpostEmail'])->name('seller.postEmail');
Route::get('reset-password/{token}', [App\Http\Controllers\Front\UserController::class,'getpassword'])->name('user.getpassword');
Route::post('reset-password', [App\Http\Controllers\Front\UserController::class,'updatePassword'])->name('user.resetpassword');


Route::get('sellerreset-password/{token}', [App\Http\Controllers\Front\SellerController::class,'sellergetpassword'])->name('seller.getpassword');
Route::post('sellerreset-password', [App\Http\Controllers\Front\SellerController::class,'sellerupdatePassword'])->name('seller.resetpassword');



############################## Sort Routs #################################
Route::get('seller/sort/contents/{urlparam}',[App\Http\Controllers\Front\SellerController::class,'contentsort'])->name('seller.contentsort');
Route::get('seller/sort/buyers/{urlpram}',[App\Http\Controllers\Front\SellerController::class,'buyersort'])->name('seller.buyersort');
Route::get('seller/sort/offers/{urlpram}',[App\Http\Controllers\Front\SellerController::class,'offerssort'])->name('seller.sortmyvideosOffers');
Route::get('seller/sort/messages/{urlpram}',[App\Http\Controllers\Front\SellerController::class,'messagessort'])->name('seller.messagessort');

Route::get('seller/content/details/{id}',[App\Http\Controllers\Front\SellerController::class,'contentdetails'])->name('seller.contentdetails');

/////////////////////////////////////////PAYPAL//////////////////////////

Route::get('paywithpaypal', [App\Http\Controllers\Front\PaypalController::class,'payWithPaypal'])->name('paywithpaypal');
Route::post('paywithpaypal', [App\Http\Controllers\Front\PaypalController::class,'postPaymentWithpaypal'])->name('paypal');
Route::get('paywithpaypal', [App\Http\Controllers\Front\PaypalController::class,'getPaymentStatus'])->name('status');

Route::get('addVideomarkAsRead/{id}/{lang}', [App\Http\Controllers\Front\UserController::class,'addVideomarkAsRead'])->name('addVideomarkAsRead');
Route::get('activemarkAsRead/{lang}', [App\Http\Controllers\Front\UserController::class,'activemarkAsRead'])->name('activemarkAsRead');
Route::get('commentmarkAsRead/{lang}', [App\Http\Controllers\Front\SellerController::class,'commentmarkAsRead'])->name('commentmarkAsRead');

//////////////////////////////////////////////////////////////////////////
Route::get('markAsRead',function(){
    $seller=Seller::find(auth('seller')->id());
    $seller->unreadNotifications->first()->markAsRead();
})->name('markasread');

// Route::get('addVideomarkAsRead',function(){
//     $user=User::find(auth('user')->id());
//     // dd($user);
//     $user->unreadNotifications->first()->markAsRead();
// })->name('addVideomarkAsRead');

// Route::get('activemarkAsRead',function(){
//     $user=User::find(auth('user')->id());
//     // dd($user);
//     $user->unreadNotifications->first()->markAsRead();
// });

// Route::get('aboutUs/{lang}',function($lang){
//     session()->put('locale', $lang);
//         APP::setLocale($lang);
//     return view('front.aboutUs');
// })->name('aboutus');
///////
view()->composer(['*'], function ($view) {
    $mycart=new Cart(session()->get('cart'));
    $view->with('mycart',$mycart);
});
//////////
view()->composer(['*'], function ($view) {
    // $veds=DB::table('video_accepteds')
    //     ->join('vedios','vedios.id','video_accepteds.video_id')
    //     ->select('vedios.*')
    //     ->get();
    $veds=Vedio::all();
    $view->with('veds',$veds);
});
view()->composer(['*'], function ($view) {
    $Accvideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name')
        ->get();
    $view->with('Accvideos',$Accvideos);
});
view()->composer(['*'], function ($view) {
    $cats=Category::all();
    $view->with('cats',$cats);
});
view()->composer(['*'], function ($view) {
    $sellers=Seller::all();
    $view->with('sellers',$sellers);
});
view()->composer(['*'], function ($view) {
    $users=User::all();
    $view->with('users',$users);
});
view()->composer(['*'], function ($view) {
    $newvideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name','sellers.picture')
        ->orderBy('video_accepteds.created_at', 'desc')
        ->take(4)
        ->get();
    $view->with('newvideos',$newvideos);
});
view()->composer(['*'], function ($view) {
    $mostwatch=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name','sellers.picture')
        ->orderBy('views', 'desc')
        ->take(4)
        ->get();
    $view->with('mostwatch',$mostwatch);
});
view()->composer(['*'], function ($view) {
    $user_id=auth('seller')->id();
        $videoss=DB::table('video_accepteds')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->where('sellers.seller_id','=',$user_id)
        ->select('vedios.*')
       ->get();
    $view->with('videoss',$videoss);
});
view()->composer(['*'], function ($view) {
    $seller=Seller::find(auth('seller')->id());
    $view->with('seller',$seller);
});


view()->composer(['*'], function ($view) {
    $lang='en';
    $view->with('lang',$lang);
});

view()->composer(['*'], function ($view) {
    $offers=Offer::all();
    $view->with('offers',$offers);
});

view()->composer(['*'], function ($view) {
    $usermessages=Message::where('reciever_id',auth('user')->id())->get();
    $view->with('usermessages',$usermessages);
});

view()->composer(['*'], function ($view) {
    $unreadUserMessages=Message::where('unread','0')->where('reciever_id',auth('user')->id())->get();
    $view->with('unreadUserMessages',$unreadUserMessages);
});

// view()->composer(['*'], function ($view) {
//     $sellermessages=Message::where('reciever_id',auth('seller')->id())->get();
//     $view->with('usermessages',$sellermessages);
// });


view()->composer(['*'], function ($view) {
    $unreadSellerMessages=Message::where('unread','0')->where('reciever_id',auth('seller')->id())->get();
    $view->with('unreadSellerMessages',$unreadSellerMessages);
});












