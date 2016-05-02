<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Papi;

class papiController extends Controller
{
	private $papi;

	function __construct() {
		$this->papi = new Papi;
	}

	public function getAjaxPr()
	{
		$value = isset($_GET['q']);
		$array = [];
		foreach ($this->papi->getPR() as $val){
			if(strpos($val, $value)){
				$array['id']=$val;
				$array['text']=$val;
			}
		}
		return response()->json($array);
	}
}
