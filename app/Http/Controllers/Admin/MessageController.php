<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\ContactUs;
use Illuminate\Support\Facades\App;


use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sellermessages=Message::where('reciever_id',auth('seller')->id())->get();
        $adminmessages=Message::where('reciever_id',auth('admin')->id())->get();
        $contactus=ContactUs::all();

        // dd($sellermessages);
        //dd(auth('admin'));
        //  dd(\Auth::user('admin')->id==null);
        if(auth('admin')->id()!=null)
        return view('admin.messages.index',compact('adminmessages','contactus'));
        elseif(auth()->user==auth('seller')->user())
        // return 'sellermessage';
         return view('front.sellers.messages.index',compact('sellermessages'));
    }
    public function sellermessages($lang)
    {
         session()->put('locale', $lang);
        APP::setLocale($lang);
        
        $sellermessages=Message::where('reciever_id',auth('seller')->id())->get();
        $adminmessages=Message::where('reciever_id',auth('admin')->id())->get();
        $contactus=ContactUs::all();

         //dd($sellermessages);
        //dd(auth('admin'));
        //  dd(\Auth::user('admin')->id==null);
        if(auth('admin')->id()!=null)
        return view('admin.messages.index',compact('adminmessages','contactus'));
        elseif(auth()->user()==auth('seller')->user())
        // return 'sellermessage';
         return view('front.sellers.messages.index',compact('sellermessages'));
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
    public function store(Request $request)
    {
        $validated = $request->validate([
        'subject' => 'required',
        'body' => 'required',
    ]);
        $ID;
        $usertype;
        $user=User::where('email',$request['to'])->first();
        if($user!=null){
            $usertype=0;
            $ID=$user->toArray()['id'];
        }
        if($request['subject']!=null || $request['body']!=null){
        Message::create([
            'subject'=>$request['subject'],
            'sender_id'=>auth('admin')->id(),
            'reciever_id'=>$ID,
            'body'=>$request['body'],
            'unread'=>0,
            'usertype'=>$usertype
        ]);
        return \redirect()->route('admin.Message');
        }else
        return \redirect()->route('admin.Message')->with('error');
    }
    public function tosellerstore(Request $request)
    {
        $validated = $request->validate([
        'subject' => 'required',
        'body' => 'required',
    ]);
        $ID;
        $usertype;
        $seller=Seller::where('email',$request['to'])->first();
        if($seller!=null){
            $usertype=0;
            $ID=$seller->seller_id;
        }
        if($request['subject']!=null || $request['body']!=null){
        Message::create([
            'subject'=>$request['subject'],
            'sender_id'=>auth('admin')->id(),
            'reciever_id'=>$ID,
            'body'=>$request['body'],
            'unread'=>0,
            'usertype'=>$usertype
        ]);
        return \redirect()->route('admin.Message');
        }else
        return \redirect()->route('admin.Message')->with('error');
    }

    public function sellerstore(Request $request)
    {
        $validated = $request->validate([
        'subject' => 'required',
        'body' => 'required',
    ]);
        $seller=Seller::find(auth('seller')->id());
        //  dd(auth('seller')->id());
        $admins=Admin::all();
         if($request['subject']!=null ||$request['body']!=null){
        foreach($admins as $admin){
        Message::create([
            'subject'=>$request['subject'],
            'sender_id'=>auth('seller')->id(),
            'reciever_id'=>$admin->id,
            'body'=>$request['body'],
            'unread'=>0,
            'usertype'=>1
        ]);
        }
        return  redirect()->back();
         }else
        return \redirect()->route('admin.Message')->with('error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $message=Message::find($id);
        if($message->usertype==1){
        $sender=Seller::where('seller_id',$message->sender_id)->first();
        
        }
        elseif($message->usertype==2){
        $sender=User::where('id',$message->sender_id)->first();
        }
        $message->unread=1;
        $message->save();
        return view('admin.messages.message_details',compact('message','sender'));
    }
    public function sellermessagedetails($id)
    {
        $message=Message::find($id);
        $sender=Seller::where('seller_id',$message->sender_id)->get();
        $message->unread=1;
        $message->save();
        return view('front.sellers.messages.message_details',compact('message','sender'));
    }

    /**sellermessagedetails
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
    public function destroy(Request $request)
    {
        $checked=$request->input('checked',[]);
        Message::whereIn("id",$checked)->delete(); 
        // }
         return redirect()->back();
    }
     public function sellerdestroy(Request $request)
    {
        $checked=$request->input('checked',[]);
        Message::whereIn("id",$checked)->delete(); 
        // }
         return redirect()->back();
    }
}
