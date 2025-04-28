<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Vedio;
use App\Http\Requests\CategoryRequest;
use DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\App;


class CategoriesController extends Controller
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
        $tr= new GoogleTranslate($lang); // Translates into English
        $categories=Category::select()->paginate(PAGE_COUNT);
        return view('admin.categories.index',compact(['categories','tr']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    public function Add($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        return view('admin.categories.Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
         
        try {
            $filePath = "";
            if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/', $filename);
            }
 
            Category::create([
                'name' => $request['name'],
                'picture' => $filename,
                'active'=>$request->has(['active'])
            ]);
              return redirect()->route('admin.categories',get_default_lang())->with(['error' => 'تم التصنيف بنجاح']);
          } catch (Exception $ex) {
              return redirect()->route('admin.categories')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
          }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $categories=Category::find($id);
        return view('admin.categories.edit',compact(['id','categories']));
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
        try {
             if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/', $filename);
            }
             
            Category::where('id',$id)
            ->update([
                'name' => $request['name'],
                'picture'=>$filename,
            ]);
              return redirect()->route('admin.categories',get_default_lang())->with(['error' => 'تم حفظ اللغة بنجاح']);
          } catch (Exception $ex) {
              return 'error';
             return redirect()->route('admin.categories')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
          }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
             
           $category=Category::find($id)->delete();
              return redirect()->route('admin.categories',get_default_lang())->with('id' , $id);
          } catch (Exception $ex) {
              return 'error';
             return redirect()->route('admin.categories')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
          }
        
    }

   public function getfile($filename)
    {

            return \response()->download((url('/profile/').$filename),null,[],null);

    }
    public function getvideos(Request $request,$id,$lang) {
         session()->put('locale', $lang);
        APP::setLocale($lang);
        $catvideos=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->where('vedios.cat_id',$id)
        ->select('vedios.*','sellers.seller_name','sellers.picture')
        ->paginate(10);
        if($request->ajax()){
            $view=view('front.categoryvideosData',compact('catvideos'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('front.categoryVideos',compact('catvideos'));
    }

    public function getcategories(Request $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $allcategories=Category::all();
        $allVidcategories=DB::table('video_accepteds')
        ->join('vedios','vedios.id','video_accepteds.video_id')
        ->join('sellers','sellers.seller_id','video_accepteds.seller_id')
        ->select('vedios.*','sellers.seller_name','sellers.picture')
        ->paginate(10);
        if($request->ajax()){
            $view=view('front.allcategoriesData',compact(['allcategories','allVidcategories']))->render();
            return response()->json(['html'=>$view]);
        }
        return view('front.allcategories',compact(['allcategories','allVidcategories']));
    }
}
