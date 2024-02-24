<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.content.dashboard');
 
    } 
    public function profile(){
        return view('backend.content.profile');
    }
}
