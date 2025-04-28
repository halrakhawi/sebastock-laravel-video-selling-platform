<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Http\Requests\LanguagesRequest;

class LanguagesController extends Controller
{
    public function index($lang)
    {
        $tr= new GoogleTranslate($lang); // Translates into English
        $categories=Category::select()->paginate(PAGE_COUNT);
        return view('admin.categories.index',compact(['categories','tr']));
    }
    /*public function index(){
        $languages=Language::select()->paginate(PAGE_COUNT);//PAGE_COUNT in admin routes
        return view('admin.languages.index',compact('languages'));
    }
*/
    public function create(){
        return view('admin.languages.create');
    }

    public function store(LanguagesRequest $request){
   
        try {
 
          Language::create($request->except(['_token']));
            return redirect()->route('admin.languages')->with(['error' => 'تم حفظ اللغة بنجاح']);
        } catch (Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }

    }

    public function edit($id){
        $language=Language::find($id);
        if(!$language){
            return redirect()->route('admin.languages')->withErrors($validator)->withInput();
        }
        return view('admin.languages.edit',compact('language'));
    }

    public function update($id,LanguagesRequest $request){
        try{
        $language=Language::find($id);
        if(!$language){
            return redirect()->route('admin.languages.edit',$id)->withErrors($validator)->withInput();
        }
        $language->update($request->except(['_token']));
        return redirect()->route('admin.languages')->with(['error' => 'تم تحديث اللغة بنجاح']);
        
    }catch(Exception $ex) {
        return redirect()->route('admin.languages')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
    }


    }

    public function delete($id){
        try{
            $language=Language::find($id);
            if(!$language){
                return redirect()->route('admin.languages',$id)->withErrors($validator)->withInput();
            }
            $language->delete();
            return redirect()->route('admin.languages')->with(['error' => 'تم تحديث اللغة بنجاح']);
            
        }catch(Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }   
    }
}
