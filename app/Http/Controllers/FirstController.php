<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function strings()
    {
      return "Hello Laravel";
    }
    public function data()
    {
        $data=[];
        $data['id']=1;
        $data['name']='Khalid';
        $data['age']=22;
        return view('welcome',$data);
    }
}
