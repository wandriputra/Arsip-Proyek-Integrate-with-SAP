<?php

namespace App\Models;

class Papi
{
    //
    private $url = 'http://papi.semenpadang.co.id/frontend/web/index.php?';

	
	public function getPR()
	{
    	$pr = json_decode(file_get_contents($this->url.'r=arsip/pr'));
    	foreach ($pr as $value) {
			$array[] = $value->pr;
		}
    	return $array;
	}

	public function getPO()
	{
    	$po = json_decode(file_get_contents($this->url.'r=arsip/po'));
    	foreach ($po as $value) {
			$array[] = $value->po;
		}
    	return $array;
	}

	public function search($array, $key, $value)
	{
	    $results = array();
	    search_r($array, $key, $value, $results);
	    return $results;
	}

	public function search_r($array, $key, $value, &$results)
	{
	    if (!is_array($array)) {
	        return;
	    }

	    if (isset($array[$key]) && $array[$key] == $value) {
	        $results[] = $array;
	    }

	    foreach ($array as $subarray) {
	        search_r($subarray, $key, $value, $results);
	    }
	}
}
