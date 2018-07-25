@extends('layouts.app')
@section('title', '首页')

@section('content')

<div class="row">
    {{-- 用户关注用户发布的内容 --}}
    <div class="col-lg-9 col-md-9">
        <div class="panel panel-default">
                <div class="panel-body home-feed-group">
                        <ul class="nav nav-tabs">
                            <li class="{{ active_class(if_query('tab', null)) }}">
                                <a href="{{ route('root') }}">我的关注</a>
                            </li>
                            <li class="{{ active_class(if_query('tab', 'replies')) }}">
                                <a href="{{ route('root', ['tab' => 'replies']) }}">所有动态</a>
                            </li>
                        </ul>
                        @include('pages._feed')
                        
                        {{-- @if (if_query('tab', 'replies'))
                            @include('users._replies', ['replies' => $user->replies()->with('topic')->recent()->paginate(5)])
                        @else
                            @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])
                        @endif --}}
                </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 sidebar">
            <div class="panel-body" style="padding-top:0px">
                @include('topics._sidebar')
            </div>
    </div>
</div>

@endsection