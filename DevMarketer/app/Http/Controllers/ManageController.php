<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ManageController extends Controller
{
    public function index()
    {
        return redirect()->route('manage.dashboard');
    }
    public function dashboard(){
        $status ='published';
        $posts = Post::orderBy('id','desc')->where('status',$status)->paginate(10);

        return view('manage.dashboard')->withPosts($posts);
    }
}
