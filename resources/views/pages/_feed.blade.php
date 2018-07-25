@if (count($feed_items))

<ul class="list-group">
    @foreach ($feed_items as $feed)
        <li class="list-group-item">
            <a href="{{ $feed->link() }}">
                {{ $feed->title }}
            </a>
            <span class="meta pull-right">
                {{ $feed->reply_count }} 回复
                <span> ⋅ </span>
                {{ $feed->created_at->diffForHumans() }}
            </span>
        </li>
    @endforeach

    {{-- 分页 --}}
    {!! $feed_items->render() !!}
</ul>

@else
   <div class="empty-block">暂无数据 ~_~ </div>
@endif
