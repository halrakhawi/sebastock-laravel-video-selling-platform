<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisment;
//use Advertisment;
use DB;
use Illuminate\Support\Facades\App;
use Validator;


class AdvertismentController extends Controller
{
    public function index($lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
        $advs=Advertisment::all();
         return view('admin.advertisments.index',compact('advs'));
    }
    public function show($id,$lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
        $adv= Advertisment::where('id',$id)->first();
        return view('admin.advertisments.show',compact('adv'));
    }
    
    public function create($lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
         return view('admin.advertisments.create');
    }
    public function store(Request $request,$lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
        $filename="";
           $validator = Validator::make($request->all(),[
            'title'=>'required',
            'url'=>'required',
            'type'=>'required',
        ]);
        
        if ($request->hasFile('url')) {
                $size=$request->file('url')->getSize();
                
            $fileext=$request->file('url')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('url')->move(('/home/lnbeysmy/public_html/sebastock/Seba/storage/advertisments/'), $filename);
            
             }
             Advertisment::create([
                'title' => $request['title'],
                'url' => $filename,
                'type' => $request['type'],
                'status'=>$request['status'],
            ]);
            return redirect()->route('admin.Advertisments',App()->getLocale());
           //return response()->json(['status'=>1, 'msg'=>'New Adv has been successfully created']);

    }
    
    public function edit($id,$lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
        $adv= Advertisment::where('id',$id)->first();
         return view('admin.advertisments.edit',compact('adv'));
    }

    public function update(Request $request,$id,$lang){
     session()->put('locale', $lang);
    APP::setLocale($lang);
    $adv= Advertisment::where('id',$id)->first();
    $filename="";
    $validator = Validator::make($request->all(),[
     'title'=>'required',
     'url'=>'required',
     'type'=>'required',
 ]);
 
 if ($request->hasFile('url')) {
         $size=$request->file('url')->getSize();
         
     $fileext=$request->file('url')->getClientOriginalExtension();
     $filename=time().'.'.$fileext;
     $path = $request->file('url')->move(('/home/lnbeysmy/public_html/sebastock/Seba/storage/advertisments/'), $filename);
     
      }
    $adv->title=$request['title'];
    $adv->url= $filename;
    $adv->type=$request['type'];
    $adv->status=$request['status'];
    $adv->save();
    return redirect()->route('admin.Advertisments',App()->getLocale());
}

    public function delete($id,$lang){
         session()->put('locale', $lang);
        APP::setLocale($lang);
         $adv= Advertisment::where('id',$id)->first();
         $adv->delete();
         return view('admin.advertisments.index');
    }
}