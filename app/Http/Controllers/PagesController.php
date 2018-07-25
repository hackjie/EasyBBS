<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }

    // public function index(Request $request, Topic $topic, User $user, Link $link)
    // {
    //     $topics = $topic->withOrder($request->order)->paginate(20);
    //     $active_users = $user->getActiveUsers();
    //     $links = $link->getAllCached();

    //     return view('topics.index', compact('topics', 'active_users', 'links'));
    // }

    public function permissionDenied()
    {
        // 如果当前用户有权限访问后台，直接跳转访问
        if (config('administrator.permission')) {
            return redirect(url(config('administrator.uri')), 302);
        }
        // 否则使用视图
        return view('pages.permission_denied');
    }
}
