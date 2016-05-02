<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class pjaxController extends Controller
{

    public function getIndex(Request $request)
    {
    	$home = $request->input('home');
        return view('pjax.index', compact('home'));
    }

    public function getHome($value='')
    {
        $data = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere harum ducimus quasi, accusantium maiores nisi laudantium quos eligendi adipisci, quae, odit enim reprehenderit consectetur perspiciatis non. Debitis at, cum eveniet!';
        return $data;
    }
}
