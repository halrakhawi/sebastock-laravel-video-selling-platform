<?php
use App\Models\Language;
use Illuminate\Support\Facades\Route;
use App\Models\Seller;
use Illuminate\Support\Facades\App;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
//use File;


 function get_Languages(){

    return Language::active()->Selection()->get();   

}

function get_CurrentUrl(){
    return Route::currentRouteName();

}

function get_default_lang(){
    return   Config::get('app.locale');
  }
  
  
  
  function uploadImage($folder, $image)
  {
      $image->store('/', $folder);
      $filename = $image->hashName();
      $path = '/' . $folder . '/' . $filename;
      return $path;
  }
  
  
  
  function uploadVideo($folder, $video)
  {
      $video->store('/', $folder);
      $filename = $video->hashName();
      $path = 'video/' . $folder . '/' . $filename;
      return $path;
  }

  function isSeller($idColumn){

$columns = Schema::getColumnListing('sellers'); 

   if(in_array($idColumn, $columns))
   return 'Seller';
      else
   return 'Buyer';

      
  }

  function timeInfo($time){
      if($time<24)
      echo $time .' Hours ago';
      elseif($time>=24 && $time < (30*24))
      echo (int)($time/24) .' Day ago';
      elseif($time >=(30*24) && $time < (30*24*12))
      echo (int)(($time/24)/30) .' Months ago';
      elseif($time >=(30*24*12))
      echo (int)(($time/24)/30) .' Years ago';
  }

  function priceofsellervideos($user_id){
    return (DB::select('select sum(price) from vedios where id IN( select video_id from user_downloads where user_id='.$user_id.') && seller_id='.auth('seller')->id()));
  }

  function downloadscount($user_id){
      
      return (DB::select('select count(id) from vedios where id IN( select video_id from user_downloads where user_id='.$user_id.') && seller_id='.auth('seller')->id()));

  }

  function setLang($lang){
    APP::setLocale($lang);
    return route(get_CurrentUrl());
  }
  
  function totalRevenue(){
      return (DB::select('select sum(balance) as sum from sellers'));
  }
  
  function categoryName($id){
      return (DB::select('select name from categories where id='.$id));
  }
  
  function addWaterMark($video){
    //   FFMpeg::open($video)
    // ->addWatermark(function(WatermarkFactory $watermark) {
    //     $watermark->open('/home/lnbeysmy/public_html/sebastock/Seba/assets/front/img/logo.png')
    //         ->right(25)
    //         ->bottom(25);
    // });
      
      //$video='https://www.sebastock.com/assets/1627935124.mp4';
       //$image="/home/lnbeysmy/public_html/sebastock/assets/front/img/logo.png";
       //echo system('/home/lnbeysmy/public_html/sebastock/assets/ffmpeg/ffmpeg -i '.$video.' -i '.$image.' -filter_complex "overlay" /home/lnbeysmy/public_html/sebastock/Seba/storage/videos/watermark'.$video);

//       //$video=public_path('/storage/videos/'.$video);
   //    echo $video;
//       $video="/home2/sebatwoz/public_html/storage/videos/".$video;
//       //$video = File::get($video);
//       //echo $content;
//       $image="/home2/sebatwoz/public_html/assets/front/img/logo.png";
//       //$image=public_path('assets/front/img/logo.png');//'../public_html/assets/front/img/logo.png';
//       // then you have to resize the selected image to lower resolution
// $command = "/usr/bin/ffmpeg/ffmpeg -i " . $image . " -s 128x128 output.jpeg";
 
// // execute that command
// system($command);
//  //echo exec($command);
 
// //echo "Overlay has been resized";
 
// // both input files has been selected
// $command = "/usr/bin/ffmpeg/ffmpeg -i " . $video . " -i output.jpeg";
 
// // now apply the filter to select both files
// // it must enclose in double quotes
// // [0:v] means first input which is video
// // [1:v] means second input which is resized image
// $command .= " -filter_complex \"[0:v][1:v]";
 
// // now we need to tell the position of overlay in video
// $command .= " overlay=80:50\""; // closing double quotes
 
// // save in a separate output file
// $command .= " -c:a copy watermark.mp4";
 
// // execute the command
// system($command);
// //echo exec($command);
  }
  


  