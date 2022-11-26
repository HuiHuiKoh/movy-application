<?php

namespace App\Http\Controllers;

/**
 * @author Koh Hui Hui
 */

class ForumController extends Controller
{
    public function forum()
    {
        return view('forum.forum');
    }
    
    public function login()
    {
        return view('forum.auth.login');
    }
    
    public function register()
    {
        return view('forum.auth.register');
    }
}