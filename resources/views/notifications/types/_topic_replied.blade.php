<div class="media">
    <div class="avatar pull-left">
        <a href="{{ route('users.show', $notification->data['user_id']) }}">
        <img class="media-object img-thumbnail" alt="{{ $notification->data['user_name'] }}" src="{{ $notification->data['user_avatar'] }}"  style="width:48px;height:48px;"/>
        </a>
    </div>

    <div class="infos">
        <div class="media-heading">
            <a href="{{ route('users.show', $notification->data['user_id']) }}">{{ $notification->data['user_name'] }}</a>

            {{-- 通知分为话题被评论；话题评论中被提及 --}}
            @if ($notification->data['type'] == 'reply')
            •回复了你的话题：
            <a href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>
            @else
            •在
            <a href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>
              的评论中提及到了你
            @endif

            <span class="meta pull-right" title="{{ $notification->created_at }}">
                <span class="glyphicon glyphicon-clock" aria-hidden="true"></span>
                {{ $notification->created_at->diffForHumans() }}
            </span>
        </div>
        <div class="reply-content">
            {!! $notification->data['reply_content'] !!}
        </div>
    </div>
</div>
<hr>