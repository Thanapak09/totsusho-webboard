<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class DashboardController extends Controller
{
    //
    public function index(){
        $topics = Topic::withCount('comments')->with('comments')->latest()->get();
        // dd($topics);
        return view('dashboard', compact('topics')); 
    }
}
