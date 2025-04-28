<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\User;
use App\Models\Seller;
use App\Models\Admin;
use App\Models\Message;
use ArielMejiaDev\LarapexCharts\LarapexChart;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
define('PAGE_COUNT',10);


Route::group(['middleware'=>'auth:admin'], function () {


    Route::get('/dashboard/{lang}', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');
    
    Route::get('/logout', function(){
        Session::flush();
        Auth::logout();
        return Redirect::to("/admin/login");
    })->name('admin.logout');
    
    ############################### Categories Routs #################################
        Route::get('/categories/{lang}',[App\Http\Controllers\Admin\CategoriesController::class,'index'])->name('admin.categories');
        Route::get('/categories/Add/{lang}',[App\Http\Controllers\Admin\CategoriesController::class,'Add'])->name('admin.categories.Add');
        Route::post('/categories/store',[App\Http\Controllers\Admin\CategoriesController::class,'store'])->name('admin.categories.store');
        Route::get('/categories/edit/{id}/{lang}',[App\Http\Controllers\Admin\CategoriesController::class,'edit'])->name('admin.categories.edit');
        Route::post('/categories/update/{id}',[App\Http\Controllers\Admin\CategoriesController::class,'update'])->name('admin.categories.update');       
        Route::get('/categories/delete/{id}',[App\Http\Controllers\Admin\CategoriesController::class,'destroy'])->name('admin.categories.delete');
    ##################################################################################

    ############################### SubCategories Routs #################################
    Route::get('/subcategories',[App\Http\Controllers\Admin\SubCategoriesController::class,'index'])->name('admin.subcategories');
    Route::get('/subcategories/create',[App\Http\Controllers\Admin\SubCategoriesController::class,'create'])->name('admin.subcategories.create');
    Route::post('/subcategories/store',[App\Http\Controllers\Admin\SubCategoriesController::class,'store'])->name('admin.subcategories.store');
    Route::get('/subcategories/edit/{id}',[App\Http\Controllers\Admin\SubCategoriesController::class,'edit'])->name('admin.subcategories.edit');
    Route::post('/subcategories/update/{id}',[App\Http\Controllers\Admin\SubCategoriesController::class,'update'])->name('admin.subcategories.update');       
    Route::get('/subcategories/delete/{id}',[App\Http\Controllers\Admin\SubCategoriesController::class,'destroy'])->name('admin.subcategories.delete');
##################################################################################



############################### Offers Routs #################################
Route::get('/offers/{lang}',[App\Http\Controllers\Admin\OfferController::class,'index'])->name('admin.offers');
Route::get('/offers/create/{id}/{lang}',[App\Http\Controllers\Admin\OfferController::class,'create'])->name('admin.offer.create');
Route::post('/offers/store/{id}',[App\Http\Controllers\Admin\OfferController::class,'store'])->name('admin.offer.store');
Route::get('/offers/show/{id}/{lang}',[App\Http\Controllers\Admin\OfferController::class,'show'])->name('admin.offer.details');
Route::post('/offers/action/{id}/{lang}',[App\Http\Controllers\Admin\OfferController::class,'action'])->name('admin.offer.action');

#################################################################################

    ############################### Admins Routs #################################
        Route::get('/admins/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'index'])->name('admin.admins');
        Route::get('/admins/create/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'create'])->name('admin.admins.create');
        Route::post('/admins/store/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'store'])->name('admin.admins.store');
        Route::get('/admins/profile/{id}/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'profile'])->name('admin.admins.profile');
        Route::post('/admins/update/{id}/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'update'])->name('admin.admins.update');
        // Route::get('/languages/delete/{id}',[App\Http\Controllers\Admin\LanguagesController::class,'delete'])->name('admin.languages.delete');
    #################################################################################
        Route::get('/contents/{lang}',[App\Http\Controllers\Admin\ContentsController::class,'contents'])->name('admin.contents');
        Route::get('/content/details/{id}/{lang}',[App\Http\Controllers\Admin\ContentsController::class,'contentdetails'])->name('admin.contentdetails');
        Route::get('/contents/edit/{id}',[App\Http\Controllers\Admin\ContentsController::class,'editvideo'])->name('admin.editcontents');
        Route::post('/contents/addPrice/{id}',[App\Http\Controllers\Admin\ContentsController::class,'addPrice'])->name('admin.addprice');
        Route::post('/contents/delete/{id}',[App\Http\Controllers\Admin\ContentsController::class,'destroy'])->name('admin.deletevideo');
        Route::get('/requests/{lang}',[App\Http\Controllers\Admin\ContentsController::class,'showallRequests'])->name('admin.requests');
        Route::get('/requestdetails/{id}/{lang}',[App\Http\Controllers\Admin\ContentsController::class,'requestdetails'])->name('admin.requestdetails');
        Route::post('/accept/{id}',[App\Http\Controllers\Admin\ContentsController::class,'accept'])->name('admin.accept');
        Route::get('/accept/{id}',[App\Http\Controllers\Admin\ContentsController::class,'accept'])->name('admin.getaccept');
        Route::post('/rject/{id}',[App\Http\Controllers\Admin\ContentsController::class,'rject'])->name('admin.rject');
        Route::get('/userrequests/{lang}',[App\Http\Controllers\Front\UserController::class,'userrequests'])->name('admin.userrequests');
        Route::get('/buyerDetails/{id}/{lang}',[App\Http\Controllers\Front\UserController::class,'buyerDetails'])->name('admin.buyerDetails');

        Route::get('/sellers/{lang}',[App\Http\Controllers\Front\SellerController::class,'sellers'])->name('admin.sellers');
        Route::get('/sellerDetails/{id}/{lang}',[App\Http\Controllers\Front\SellerController::class,'sellerDetails'])->name('admin.sellerDetails');
        Route::any('/userActivate/{id}',[App\Http\Controllers\Front\UserController::class,'userActivate'])->name('admin.userActivate');
        Route::any('/sellerActivate/{id}',[App\Http\Controllers\Front\SellerController::class,'sellerActivate'])->name('admin.sellerActivate');
        Route::post('/deleteuser/{id}',[App\Http\Controllers\Admin\AdminLoginController::class,'deleteuser'])->name('admin.deleteuser');
        Route::post('/deleteseller/{id}',[App\Http\Controllers\Admin\AdminLoginController::class,'deleteseller'])->name('admin.deleteseller');
        
############################### Messages Routs #################################
Route::get('/messages',[App\Http\Controllers\Admin\MessageController::class,'index'])->name('admin.Message');
Route::get('/messages/create',[App\Http\Controllers\Admin\MessageController::class,'create'])->name('admin.Message.create');
Route::post('/messages/store',[App\Http\Controllers\Admin\MessageController::class,'store'])->name('admin.Message.store');
Route::post('/messages/tosellerstore',[App\Http\Controllers\Admin\MessageController::class,'tosellerstore'])->name('admin.Message.tosellerstore');
Route::get('/messages/details/{id}',[App\Http\Controllers\Admin\MessageController::class,'details'])->name('admin.Message.details');
Route::get('/messages/delete',[App\Http\Controllers\Admin\MessageController::class,'destroy'])->name('admin.Message.delete');

Route::post('/canceledpayments/{id}/{payid}',[App\Http\Controllers\Admin\AdminLoginController::class,'canceledpayments'])->name('admin.canceledpayments');
Route::get('/paymentdetails/{id}/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'paymentdetails'])->name('admin.paymentdetails');
Route::get('/payments/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'payments'])->name('admin.payments');

Route::post('search/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'search'])->name('admin.search');
Route::get('/buyers/{lang}',[App\Http\Controllers\Front\UserController::class,'Adminbuyers'])->name('admin.buyers');


#################################################################################



############################### Reports Routs #################################
Route::get('/buyerReport/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'getbuyerReport'])->name('admin.getbuyerReport');
Route::post('/buyerReport/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'buyerReport'])->name('admin.buyerReport');
Route::get('/sellerReport/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'getsellerReport'])->name('admin.sellerReport');
Route::get('/contentReport/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'getcontentReport'])->name('admin.contentReport');
Route::get('/requestReport/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'getrequestReport'])->name('admin.requestReport');
Route::get('/backup_database',[App\Http\Controllers\Admin\AdminLoginController::class,'backup_database'])->name('admin.backupdatabase');
Route::get('/backup/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'backup'])->name('admin.backup');
Route::get('/backup-import/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'backupimport'])->name('admin.getbackupimport');
Route::any('/backup-import',[App\Http\Controllers\Admin\AdminLoginController::class,'postbackupimport'])->name('admin.backupimport');



//backup_database
#################################################################################

############################## Advertisments Routs #################################
Route::get('/Advertisments/{lang}',[App\Http\Controllers\Admin\AdvertismentController::class,'index'])->name('admin.Advertisments');
Route::get('/Advertisments/show/{id}/{lang}',[App\Http\Controllers\Admin\AdvertismentController::class,'show'])->name('admin.Advertisments.show');
Route::get('/Advertisments/create/{lang}',[App\Http\Controllers\Admin\AdvertismentController::class,'create'])->name('admin.Advertisments.create');
Route::post('/Advertisments/store/{lang}',[App\Http\Controllers\Admin\AdvertismentController::class,'store'])->name('admin.Advertisments.add');
Route::get('/Advertisments/edit/{id}/{lang}',[App\Http\Controllers\Admin\AdvertismentController::class,'edit'])->name('admin.Advertisments.edit');
Route::post('/Advertisments/update/{id}/{lang}',[App\Http\Controllers\Admin\AdvertismentController::class,'update'])->name('admin.Advertisments.update');
Route::get('/Advertisments/delete/{id}/{lang}',[App\Http\Controllers\Admin\AdvertismentController::class,'delete'])->name('admin.Advertisments.delete');


###########################################################################

############################## Sort Routs #################################
Route::get('/sort/contents/{urlparam}/{lang}',[App\Http\Controllers\Admin\ContentsController::class,'contentsort'])->name('admin.contentsort');
Route::get('/sort/userrequest/{urlpram}/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'userrequestsort'])->name('admin.userrequestsort');
Route::get('/sort/buyers/{urlpram}/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'buyersort'])->name('admin.buyersort');
Route::get('/sort/sellers/{urlpram}/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'sellersort'])->name('admin.sellersort');
Route::get('/sort/videorequests/{urlpram}/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'videorequestsort'])->name('admin.videorequestsort');
Route::get('/sort/offerssort/{urlpram}/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'offerssort'])->name('admin.offerssort');
Route::get('/sort/messagessort/{urlpram}/{lang}',[App\Http\Controllers\Admin\AdminLoginController::class,'messagessort'])->name('admin.messagessort');


//offerssort
#################################################################################

Route::get('balanceMarkASRead', [App\Http\Controllers\Admin\AdminLoginController::class,'balanceMarkASRead'])->name('balanceMarkASRead');
Route::get('acceptvideoMarkASRead', [App\Http\Controllers\Admin\AdminLoginController::class,'acceptvideoMarkASRead'])->name('acceptvideoMarkASRead');

});

Route::group(['middleware'=>'guest:admin'], function () {
    Route::get('login',[App\Http\Controllers\Admin\AdminLoginController::class,'getlogin'])->name('admin.login');
    Route::post('login',[App\Http\Controllers\Admin\AdminLoginController::class,'login'])->name('admin.postlogin');

});

Route::get('createVideomarkAsRead',function(){
    $admin=Admin::find(auth('admin')->id());
    $admin->unreadNotifications->first()->markAsRead();
});


view()->composer(['*'], function ($view) {
    $users=User::all();
    $view->with('users',$users);
});

view()->composer(['*'], function ($view) {
    $sellers=Seller::all();
    $view->with('sellers',$sellers);
});

view()->composer(['*'], function ($view) {
    $admins=Admin::all();
    $view->with('admins',$admins);
});

view()->composer(['*'], function ($view) {
    $messages=Message::all();
    $view->with('messages',$messages);
});

view()->composer(['*'], function ($view) {
    $unreadMessages=Message::where('unread','0')->where('reciever_id',auth('admin')->id())->get();
    $view->with('unreadMessages',$unreadMessages);
});
