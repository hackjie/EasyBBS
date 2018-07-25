@extends('layouts.app')
@section('title', '首页')

@section('content')

<div class="row">
    {{-- 用户发布的内容 --}}
    {{-- <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="{{ active_class(if_query('tab', null)) }}">
                    <a href="{{ route('users.show', $user->id) }}">Ta 的话题</a>
                </li>
                <li class="{{ active_class(if_query('tab', 'replies')) }}">
                    <a href="{{ route('users.show', [$user->id, 'tab' => 'replies']) }}">Ta 的回复</a>
                </li>
            </ul>
            @if (if_query('tab', 'replies'))
                @include('users._replies', ['replies' => $user->replies()->with('topic')->recent()->paginate(5)])
            @else
                @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])
            @endif
        </div>
    </div> --}}

    {{-- <div class="col-lg-3 col-md-3 sidebar">
        @include('topics._sidebar')
    </div> --}}
</div>

@endsection