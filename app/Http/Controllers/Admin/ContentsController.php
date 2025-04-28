<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use Illuminate\Http\Request;
use App\Models\Vedio;
use App\Models\Seller;
use App\Models\VideoRequested;
use App\Models\VideoAccepted;
use App\Models\RejectedVideos;
use App\Notifications\RjectVideo;
use App\Notifications\AddVideo;
use App\Models\User;
use URL;
use DB;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;



class ContentsController extends Controller
{
    public function contents($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $AdminAccvideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name')
        ->paginate(5);
        return view('admin.contents',compact('AdminAccvideos'));
    }

    public function contentdetails($id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $video=Vedio::find($id);
        return view('admin.content_details',compact(['id','video']));
    }

    public function editvideo($id)
    {
        $video=Vedio::find($id);
        return view('admin.editcontents',compact(['id','video']));
    }

    public function addPrice(Request $request,$video_id){
        $video=Vedio::find($video_id);
        $video->price=$request->price;
        $video->save();
        //dd($video);
        return back();
    }

    public function showallRequests($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $requests=VideoRequested::paginate(10);
        //dd($requests);
        return view('admin.requests',compact('requests'));
    }
    
    public function accept($rquest_id){
        try{
         $rquest=VideoRequested::find($rquest_id);
        VideoAccepted::create([
            'video_id'=>$rquest->video_id,
            'seller_id'=>$rquest->seller_id
        ]);
        $rquest->delete();
         $video=Vedio::find($rquest->video_id);
        $users=User::all();
        foreach ($users as $user) {
            $user->notify(new AddVideo($video));
        }
        //watwermark

        
        
      $vid='/home/lnbeysmy/public_html/sebastock/Seba/storage/videos/'.$video->url;
      $image="/home/lnbeysmy/public_html/sebastock/assets/front/img/logo1.png";
      //(exec('/usr/bin/ffmpeg -i '.$vid.' -i '.$image.' -filter_complex "overlay=310:360" /home/lnbeysmy/public_html/sebastock/Seba/storage/videos/watermark'.$video->url));
      // (exec('/usr/bin/ffmpeg -i '.$vid.' -i '.$image.' -filter_complex "[1]lut=a=val*0.3[a];[0][a]overlay=10:10" /home/lnbeysmy/public_html/sebastock/Seba/storage/videos/watermark'.$video->url));
      // (exec('/usr/bin/ffmpeg -i '.$vid.' -loop 1 -i '.$image.' -filter_complex "[1]lut=a=val*0.6[a];[0][a]overlay=x=\'st(0,floor(random(n)*2)+1);if(eq(mod(n-1,200),0), if(eq(ld(0),1),0,  main_w-overlay_w   ) ,x)\':y=\'st(0,floor(random(n)*2)+1);if(eq(mod(n-1,200),0),if(eq(ld(0),1),0,  main_h-overlay_h   ),y)\':shortest=1" /home/lnbeysmy/public_html/sebastock/Seba/storage/videos/watermark'.$video->url));
       (exec('/usr/bin/ffmpeg -i '.$vid.' -vf "movie='.$image.' [watermark]; [in] [watermark] overlay=x=\'(mod(n\,main_w))\':y=\'(mod(n\,main_h))\' [out]" -strict -2 /home/lnbeysmy/public_html/sebastock/Seba/storage/videos/watermark'.$video->url));

       return redirect()->route('admin.requests',App()->getLocale());
                  
    }
    catch(Exception $ex) {
        return back();
    }
}
    public function rject(Request $request,$rquest_id){
        $rquest=VideoRequested::find($rquest_id);
        $seller=Seller::find($rquest->seller_id);
        // dd($rquest->seller_id);
        RejectedVideos::create([
            'video_id'=>$rquest->video_id,
            'seller_id'=>$rquest->seller_id
        ]);
        $rquest->delete();
        $seller->notify(new RjectVideo($request->input('reason')));
        return redirect()->route('admin.requests');
    }
    public function requestdetails($req_id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        try {
            $req=VideoRequested::find($req_id);
            return view('admin.request_details',compact('req'));
        } catch (Exception $ex) {
            return back();
        }
        
    }

    public function contentsort($urlpram,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        if($urlpram=='sort-asc'){
        $videos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name')
        ->orderBy('vedios.name', 'asc')
        ->get();
        // $videos=Vedio::orderBy('name', 'asc')->get();
        return view('admin.sort',compact('videos'));
        }
        //admin/sort/contents
        else if($urlpram=='sort-desc'){
            $videos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name')
        ->orderBy('vedios.name', 'desc')
        ->get();
            // $videos=Vedio::orderBy('name', 'desc')->get();
            return view('admin.sort',compact('videos'));
        }
        else if($urlpram=='sort-recent'){
            $videos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name')
        ->orderBy('vedios.created_at', 'asc')
        ->get();
            // $videos=Vedio::orderBy('created_at', 'desc')->get();
            return view('admin.sort',compact('videos'));
        }
        else if($urlpram=='sort-old'){
            $videos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name')
        ->orderBy('vedios.created_at', 'desc')
        ->get();
            // $videos=Vedio::orderBy('created_at', 'asc')->get();
            return view('admin.sort',compact('videos'));
        }
    }

    function destroy($id){
        Vedio::where('id',$id)->delete();
        VideoAccepted::where('video_id',$id)->delete();
        return redirect()->back();
    }


}
