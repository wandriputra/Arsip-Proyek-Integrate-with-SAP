<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class sapController extends Controller
{
    public function getIndex($value='')
    {
        echo "hello world";
    }
}
