<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilemanagerController extends Controller
{
    public function index(){
        return view('filemanager.file');
    }
}
