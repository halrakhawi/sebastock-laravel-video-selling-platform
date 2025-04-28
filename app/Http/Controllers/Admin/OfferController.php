<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\App;

use App\Models\Vedio;

class OfferController extends Controller
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
        $Adminoffers=Offer::paginate(10);
        return view('admin.offers.index',compact('Adminoffers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($video_id,$lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $video=Vedio::where('id',$video_id)->first();
        return view('admin.offers.create',compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        // $request->validate([
        //     'offerPrice'=>'required',
        // ]);

        Offer::create([
            'video_id'=>$id,
            'offerPrice'=>$request['offerprice'],
            'startdate'=>$request['startdate'],
            'enddate'=>$request['enddate']
        ]);
        return redirect()->route('admin.offers',App()->getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $offer=Offer::find($id);
        return view('admin.offers.offerDetails',compact('offer'));
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
    public function action(Request $request,$id,$lang)
    {
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $offer=Offer::find($id);
        switch ($request->input('action')) {
            case 'delete Video':
                $offer->delete();
                break;
    
            case 'Update':
                Offer::where('id',$id)
            ->update([
                'offerPrice' => $request['offerPrice'],
                'startdate' => $request['startdate'],
                'enddate' => $request['enddate'],
            ]);
                break;
        }

        return redirect()->route('admin.offers',App()->getLocale());
    }
}
