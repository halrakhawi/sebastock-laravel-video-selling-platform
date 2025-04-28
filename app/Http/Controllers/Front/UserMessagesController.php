<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Admin;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class UserMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $contactus=ContactUs::all();
        $messages=Message::where('reciever_id',auth()->id())->get();
        if(count($messages)>0)
        return view('front.users.messages.index');
        else
        return view('front.users.messages.emptymessage');
    }

    public function contactusdetails($id)
    {
        $contactus=ContactUs::find($id);
        return view('admin.messages.contactus',compact('contactus'));
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
    public function store(Request $request,$lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
         $validated = $request->validate([
        'subject' => 'required',
        'body' => 'required',
    ]);
        $admins=Admin::all();
        foreach ($admins as $admin) {
            if(auth()->user()==auth('user')->user())
        Message::create([
            'subject'=>$request['subject'],
            'sender_id'=>auth()->id(),
            'reciever_id'=>$admin->id,
            'body'=>$request['body'],
            'unread'=>0,
            'usertype'=>2
        ]);
        else
        Message::create([
            'subject'=>$request['subject'],
            'sender_id'=>auth()->id(),
            'reciever_id'=>$admin->id,
            'body'=>$request['body'],
            'unread'=>0,
            'usertype'=>1
        ]);
        
    }
        return redirect()->route('user.messages',App()->getLocale())->with('error');
    }


    public function contactus(Request $request,$lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        // $admins=Admin::all();
        // foreach ($admins as $admin) {
        
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'msg' => 'required',
    ]);
        ContactUs::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'msg'=>$request['msg'],
            
        ]);
    // }
        return redirect()->route('home',App()->getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id,$lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $message=Message::find($id);
        $message->unread=1;
        $message->save();
        return view('front.users.messages.message_details',compact('message'));
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
        Message::where("id",$id)->delete(); 
        $messages=Message::where('reciever_id',auth()->id())->get();
        if(count($messages)>0)
        return view('front.users.messages.index');
        else
        return view('front.users.messages.emptymessage');
    }
}
