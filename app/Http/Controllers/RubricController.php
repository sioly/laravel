<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RubricController extends Controller
{
    public function carpooling()
    {
        return view('rubric/carpooling');
    }

    public function gift()
    {
        return view('rubric/gift');
    }

    public function location()
    {
        return view('rubric/location');
    }

    public function partners()
    {
        return view('rubric/partners');
    }

    public function swap()
    {
        return view('rubric/swap');
    }

    public function sale()
    {
        return view('rubric/sale');
    }
}
