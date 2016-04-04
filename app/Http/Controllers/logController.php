<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class logController extends Controller
{
    protected $action[
        'delete_dokumen'=> 'dokumen/delete',
        'upload_dokumen'=> 'dokumen/upload',
        'edit_dokumen' => 'dokumen/edit',
        'insert_personil' => 'user/insert',
    ]; 
}
