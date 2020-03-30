<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Profession;
class ProfessionController extends Controller
{
    //
    public function index(){

        $data = Profession::orderby('sort','desc')->get();

        return view('admin.profession.index',compact('data'));
    }

}
