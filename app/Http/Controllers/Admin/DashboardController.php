<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Auth;
use Illuminate\Support\Facades\App;


class DashboardController extends Controller
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
        $adminName=Auth::guard('admin')->user()->name;  
        $barchart = (new LarapexChart)->barChart()
        ->setTitle('Buyers vs. Sellers')
        ->addData('User\'s ID',\App\Models\User::query()->inRandomOrder()->limit(6)->pluck('id')->toArray())
        ->addData('User\'s Name',\App\Models\User::query()->limit(6)->pluck('name')->toArray())
        ->setLabels(\App\Models\User::query()->limit(6)->pluck('name')->toArray()); 
        
        //----------------------------------

        $piechart = (new LarapexChart)->pieChart()
        ->setTitle('Downloads of Videos')
        ->addData([\App\Models\Vedio::where('sales','>',10)->count(),\App\Models\Vedio::where('sales','<=',10)->count()])
        ->setLabels(['Downloads >10','Downloads <=10']);
        return view('admin.dashboard',compact(['adminName','barchart','piechart']));
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
        //
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
        //
    }
}
