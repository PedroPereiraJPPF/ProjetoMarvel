<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create(){
        return view('welcome.welcome');
    }
    public function detalhes($id=null){
        return view('detalhes.detalhes', ['id' => $id]);
    }
}
