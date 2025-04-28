<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StorageFileController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function getFile($filename)
	{
        //return $filename;
		return response()->file(('/home/lnbeysmy/public_html/sebastock/assets/'.$filename), array('Content-Type' =>'image/jpeg'));
	}
}
