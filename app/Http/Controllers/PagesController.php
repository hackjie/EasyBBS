<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;

use Auth;

class PagesController extends Controller
{
    public function root(Request $request, User $user, Link $link)
    {
        // 活跃用户列表
        $active_users = $user->getActiveUsers();
        // 资源链接
        $links = $link->getAllCached();

        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(20);
        }

        return view('pages.root', compact('active_users', 'links', 'feed_items'));
    }

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
