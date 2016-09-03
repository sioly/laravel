<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdController extends Controller
{
    function adgift($id){
		return view('ad/adgift',compact('id'));
	}

	function adsale($id){
		return view('ad/adsale',compact('id'));
	}

	function adswap($id){
		return view('ad/adswap',compact('id'));
	}

	function adlocation($id){
		return view('ad/adlocation',compact('id'));
	}
}
