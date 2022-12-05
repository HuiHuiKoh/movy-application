<?php

namespace App\Http\Controllers;

use function view;

/**
 * @author Koh Hui Hui
 */

class ForumController extends Controller
{
    public function forum()
    {
        return view('forum.forum');
    }
    
    public function thread()
    {
        return view('forum.thread');
    }
    
    public function login()
    {
        return view('forum.auth.forum_login');
    }
    
    public function register()
    {
        return view('forum.auth.forum_register');
    }
}