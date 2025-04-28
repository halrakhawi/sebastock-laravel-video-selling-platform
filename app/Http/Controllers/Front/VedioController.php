<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vedio;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\Seller;
use App\Models\Comment;
use App\Models\OrderVideos;
use App\Models\Order;
use App\Models\VideoRequested;
use App\Models\VideoAccepted;
use App\Models\WatchLater;
use App\Models\Favorite;
use App\Models\UserDownloads;
use App\Notifications\CreateVideo;
use App\Http\Requests\VideoRequest;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\App;
use Validator;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\StripeException;
use DB;
use Auth;
use FFMpeg;
use Carbon;
use Session;
use App\Models\Advertisment;


class VedioController extends Controller
{
    private $vids;
    protected  $user_id;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $vedios=Vedio::all();
        return view('front.sellers.contents',compact('vedios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        return view('front.sellers.addvideos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
            $validator = Validator::make($request->all(),[
            'name'=>'required',
            'url'=>'required',
            'details'=>'required',
            'cat_id'=>'required'
        ]);
            // $filename="";
            // $picname="";
            $seller_id=auth('seller')->id();
        try {
            

            if ($request->hasFile('url')) {
                $size=$request->file('url')->getSize();
                
            $fileext=$request->file('url')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('url')->move(('/home/lnbeysmy/public_html/sebastock/Seba/storage/videos/'), $filename);
            
             }
            if ($request->has('picture')) {
                    $picext=$request->file('picture')->getClientOriginalExtension();
                    $picname=time().'.'.$picext;
                    $path = $request->file('picture')->move(('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/'), $picname);
                //$filePath = uploadImage('images', $request->picture);
            }
            
        

                    $vid=Vedio::create([
                'name' => $request['name'],
                'url' => $filename,
                'Videopicture' => $picname,
                'details'=>$request['details'],
                'cat_id'=>$request['cat_id'],
                'seller_id'=>$seller_id,
                'rating'=>0,
                'fivecount'=>0,
                'fourcount'=>0,
                'threecount'=>0,
                'twocount'=>0,
                'onecount'=>0,
            ]);
            VideoRequested::create([
                'video_id' => $vid->id,
                'seller_id'=>$seller_id
            ]);
            $admins=Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new CreateVideo($vid));
        }
           
            if( isset($vid) ){
                return response()->json(['status'=>1, 'msg'=>'New User has been successfully registered']);
            }
        

           } catch (Exception $ex) {
              return redirect()->back()->with(['error'=>'size of video is large']);
          }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function videodetails($id,$lang)
    {
        $adv=DB::table('advertisments')->where('type','=',1)->where('status','=',1)->inRandomOrder()->first();
        //dd($adv);
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $comments=Comment::where(['video_id'=>$id])->get();
        $video=Vedio::find($id);

        $likesVideo=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
        ->where('sellers.seller_name',[$video->seller->seller_name])
        ->orwhere('categories.name',[$video->cat->name])
        ->orwhere('vedios.name',[$video->name])
        ->select('vedios.*','sellers.seller_name','sellers.picture')
         ->take(5)
        ->get();


  

        $video->views += 1;
        $video->save();
        return view('front.videodetails',compact('video','comments','likesVideo','adv'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

    }

    public function getfile1($filename)
    {
        
            //return \response()->download((('/home/lnbeysmy/public_html/sebastock/Seba/storage/videos').'/'.$filename),null,[],null);
            return \response()->download((url('Seba/storage/videos/').'/'.$filename),null,[],null);
            // return \response()->download(storage_path('app\public\videos\\'.$filename),null,[],null);

    }

    public function morenewvideos(Request $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        // $morenewvideos=VideoAccepted::orderBy('created_at', 'desc')->get();
        $morenewvideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name','sellers.picture')
        ->orderBy('video_accepteds.created_at', 'desc')
        ->paginate(10);

        if($request->ajax()){
            $view=view('front.newvideosData',compact('morenewvideos'))->render();
            return response()->json(['html'=>$view]);
        }
        
        return view('front.morenewvideos',compact('morenewvideos'));
    }
    public function mostwatch(Request $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $mostvwatch=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name','sellers.picture')
        ->orderBy('views', 'desc')
        ->paginate(10);

        if($request->ajax()){
            $view=view('front.mostwatchData',compact('mostvwatch'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('front.mostwatch',compact('mostvwatch'));
    }

    public function moreoffervideos($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $moreoffervideos=Offer::all();
        return view('front.moreoffervideos',compact(['moreoffervideos']));
    }

    public function watchlater($video_id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);

      //  dd($video_id);
         $user_id=auth()->id();
       
     if(!WatchLater::where(['user_id'=>$user_id, 'video_id'=>$video_id])->exists()){
        WatchLater::create([
             'video_id'=>$video_id,
             'user_id'=>$user_id,

         ]);
     }
         return back();
    }

    public function showwatchlater($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
         $user_id=auth()->id();
         
        $showwatchlater=WatchLater::where('user_id',$user_id)->get();
        if(count($showwatchlater)>0)
        return view('front.watchlater',compact(['showwatchlater']));
        else
        return view('front.emptywatchlater');
    }

    public function deletewatchlater($id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        WatchLater::where('id',$id)->delete();
        $user_id=auth()->id();
        $showwatchlater=WatchLater::where('user_id',$user_id)->get();
        if(count($showwatchlater)>0)
        return view('front.watchlater',compact(['showwatchlater']));
        else
        return view('front.emptywatchlater');
    }

    public function favorite($video_id){

        //  dd($video_id);
           $user_id=auth()->id();
         
       if(!Favorite::where(['user_id'=>$user_id, 'video_id'=>$video_id])->exists()){
        Favorite::create([
               'video_id'=>$video_id,
               'user_id'=>$user_id,
  
           ]);
       }
           return back();
      }
  
      public function showfavorite($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
           $user_id=auth()->id();
          $showfavorite=Favorite::where('user_id',$user_id)->get();
          if(count($showfavorite)>0)
          return view('front.favorite',compact('showfavorite'));
          else
          return view('front.emptyfavorite');
      }
  
      public function deletefavorite($id,$lang){
          session()->put('locale', $lang);
        APP::setLocale($lang);
        Favorite::where('id',$id)->delete();
        $user_id=auth('user')->id();
        $showfavorite=Favorite::where('user_id',$user_id)->get();
        if(count($showfavorite)>0)
        return view('front.favorite',compact('showfavorite'));
        else
        return view('front.emptyfavorite');
      }

      public function addCart(Vedio $video,$lang){
           session()->put('locale', $lang);
        APP::setLocale($lang);
        $offer=Offer::where('video_id',$video->id)->first();
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        
        $cart->add($video);
        session()->put('cart', $cart);
        return redirect()->route('home',App()->getLocale())->with('success', 'video was added');
      }

      public function addallCart($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        if(Auth::guard('admin')->check())
        $favorites=Favorite::where('user_id',auth('admin')->id())->get();
        elseif(Auth::guard('seller')->check())
        $favorites=Favorite::where('user_id',auth('seller')->id())->get();
        else
        $favorites=Favorite::where('user_id',auth('user')->id())->get();
        
        foreach ($favorites as $fvideo) {
            $video=Vedio::where('id',$fvideo->video_id)->first();

      if (session()->has('cart')) {
          $cart = new Cart(session()->get('cart'));
      } else {
          $cart = new Cart();
      }
      $cart->add($video);
      session()->put('cart', $cart);
      
    }
   
      return redirect()->back()->with('success', 'video was added');
    }
      public function showCart($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        // session()->forget('cart');
        // dd(session()->get('cart'));
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
            return view('front.users.shoppingcart',compact(['cart']));
        } else {
            $cart = null;
            return view('front.users.emptyshoppingcart');
        }
        //  dd($cart);
        
          
      }

    //   public function emptyshowCart($lang='en'){
    //     return view('front.users.emptyshoppingcart');
    //   }

      public function checkout($amount,$lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        return view('front.users.checkout', compact(['amount']));
    }

    
    public function charge(Request $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);

        $cart = new Cart(session()->get('cart'));
        if(auth()->user()!=null){
        $order= auth()->user()->orders()->create([
                'user_id'=>auth()->id()
             ]);
        }else
            $order= Order::create([
                'user_id'=>strtotime(Carbon\Carbon::now())
            ]);
            
                    //dd(\Cartalyst\Stripe\Exception\StripeException);
            try{
        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'amount'   => $request->amount,
            'description' => 'Seba Videos Store'
        ]);
            // }catch(Stripe\Error\Card $e) {
            //     $error = $e->getMessage();
            //     Session::flash('message', $error); 
        } catch(StripeException $e) {
            //dd($e->getmessage());
            $err=$e->getmessage();
            Session::flash('err', $err);
            return redirect()->back()->with('err',$err);
        }

        $chargeId = $charge['id'];

        if ($chargeId) {
            // save order in orders table ...
            if(auth()->user()!=null){
           $order= auth()->user()->orders()->create([
                'user_id'=>auth()->id()
            ]);
            }else
            $order= Order::create([
                'user_id'=>strtotime(Carbon\Carbon::now())
            ]);
            // dd($order->id);
            $videos=$cart->items;
            foreach($videos as $video){
                // dd($cart->items);
                OrderVideos::create([
                'order_id'=>$order->id,
                'video_id'=>$video['id'],
            ]);
            $vid=Vedio::find($video['id']);
            $seller=Seller::find($vid->seller_id);
            $seller->balance+=$vid->price;
            $seller->save();
            Payment::create([
                'seller_id'=>$seller->seller_id,
                'state'=>'on hold'
            ]);
            }
            
            // dd($this->vids);


            return redirect()->route('showcharges',App()->getLocale())->with('success', " Payment was done. Thanks");
            session()->forget('cart');
        } else {
            return redirect()->back();
        }
    }

    public function emptycart($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        session()->forget('cart');
        //dd(session()->get('cart'));
        return redirect()->route('home',App()->getLocale())->with('success', " Cart Empty");

    }

    public function deletevideofromcart($id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        // $cart = new Cart(session()->get('cart'));
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
            $cart->remove($id);

        } else {
            $cart = null;
        }
            //         if($cart==null)
            // return view('front.users.emptyshoppingcart');
        session()->put('cart', $cart);
          return view('front.users.shoppingcart',compact(['cart']));

    }

    public function showcharges($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $ratecount=1;
        $cart = new Cart(session()->get('cart'));
        // $vid=Vedio::where('url',$video)->first();
        $videos=$cart->items;
        return view('front.downloadVideo',compact('videos'));
        
    }

    public function getvideo(Request $request,$video_id){
        // dd($request->rate);
        session()->forget('cart');
        $vid=Vedio::where('id',$video_id)->first();
        if(!UserDownloads::where(['user_id'=>auth()->id(), 'video_id'=>$video_id])->exists())
        {
            if(auth()->user()!=null)
        UserDownloads::create([
            'video_id'=>$video_id,
            'user_id'=>auth()->id()
        ]);
 
    }
    
    if($request->input('rate')!=null){
    
    switch ($request->input('rate')) {
        case '1 Star':
            $vid->onecount++;
            break;   
        case '2 Star':
            $vid->twocount++;
            break;
        case '3 Star':
            $vid->threecount++;
            break;
        case '4 Star':
            $vid->fourcount++;
            break;
        case '5 Star':
            $vid->fivecount++;
            break;
    }

    $rate=intval((($vid->fivecount * 5)+($vid->fourcount * 4)+($vid->threecount * 3)+($vid->twocount * 2)+($vid->onecount * 1))/($vid->fivecount +$vid->fourcount+$vid->threecount+$vid->twocount+$vid->onecount));
    $vid->rating=$rate;
    }
        $vid->sales+=1;
        $vid->save();
        $headers = array('Content-Type'=>'application/octet-stream',);
          return  response()->download(('/home/lnbeysmy/public_html/sebastock/Seba/storage/videos/'.$vid->url),null,$headers);

    }

    public function downloads($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $user_id=auth()->id();
       $downloads=UserDownloads::where('user_id',$user_id)->get();
    //    $video=Vedio::
    if(count($downloads)>0)
       return view('front.users.downloads',compact('downloads'));
       else
       return view('front.users.emptydownloads');
   }

    public function search(Request $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $q=$request->q;
        $filterdVideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
        ->where('vedios.name','like','%'.$q.'%')
        ->orwhere('sellers.seller_name','like','%'.$q.'%')
        ->orwhere('categories.name','like','%'.$q.'%')
        ->select('vedios.*','sellers.seller_name','sellers.picture')
       ->get();
        // Vedio::where('name','like','%'.$q.'%')

        return view('front.getsearched',compact('filterdVideos'));
        // dd($request->q);
    }

    public function filter(Request $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $rate=$request->rate;
        if($rate=='1 star')$rate=1;
        elseif($rate=='2 star')$rate=2;
        elseif($rate=='3 star')$rate=3;
        elseif($rate=='4 star')$rate=4;
        elseif($rate=='5 star')$rate=5;
        if($request->rate){
        $filterdVideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
         ->where('vedios.rating',$rate)
        ->select('vedios.*','sellers.seller_name','sellers.picture')
       ->get();
               return view('front.getsearched',compact('filterdVideos'));
        }
        elseif($request->cat){
        $filterdVideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
         ->where('categories.name',$request->cat)
        ->select('vedios.*','sellers.seller_name','sellers.picture')
       ->get();
               return view('front.getsearched',compact('filterdVideos'));
       }
        elseif($request->price){
        $filterdVideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
         ->whereBetween('vedios.price',[$request->min,$request->max])
        ->select('vedios.*','sellers.seller_name','sellers.picture')
       ->get();
               return view('front.getsearched',compact('filterdVideos'));
       }
        elseif($request->price && $request->rate){
        $filterdVideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
         ->whereBetween('vedios.price',[$request->min,$request->max])
         ->where('vedios.rating',$rate)
        ->select('vedios.*','sellers.seller_name','sellers.picture')
       ->get();
               return view('front.getsearched',compact('filterdVideos'));
       }
        elseif($request->price && $request->cat){
        $filterdVideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
         ->whereBetween('vedios.price',[$request->min,$request->max])
         ->where('categories.name',$request->cat)
        ->select('vedios.*','sellers.seller_name','sellers.picture')
       ->get();
               return view('front.getsearched',compact('filterdVideos'));
       }
       elseif($request->rate && $request->cat){
        $filterdVideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
         ->where('vedios.rating',$rate)
         ->where('categories.name',$request->cat)
        ->select('vedios.*','sellers.seller_name','sellers.picture')
       ->get();
               return view('front.getsearched',compact('filterdVideos'));
       }
       elseif($request->rate && $request->cat && $request->price){
        $filterdVideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
        ->whereBetween('vedios.price',[$request->min,$request->max])
         ->where('categories.name',$request->cat)
         ->where('vedios.rating',$rate)
        ->select('vedios.*','sellers.seller_name','sellers.picture')
       ->get();
        return view('front.getsearched',compact('filterdVideos'));
       }
    }

    public function share(Request $request,$id){

        $video=Vedio::find($id);
        $video->share +=1;
        $video->save();
        switch ($request->input('action')) {
            case 'twitter':
                return redirect()->away('https://twitter.com/share?url='.route('videodetails',[$id,'en']).'&text='. $video->name);
                break;
    
            case 'instagram':
                return redirect()->away('https://instagram.com/share?url=route(\'videodetails\',['.$id.',\'en\'])&text='. $video->name);
                break;
            case 'mail':
                return redirect()->away('mailto:'.$video->seller->email);
                break;
             case 'facebook':
                return redirect()->away('https://www.facebook.com/sharer.php?u='.route('videodetails',[$id,'en']));
                break;
        }

    }

    public function uploadvideoerror($lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
        return view('front.sellers.uploadvideoError');
    } 
      
}
