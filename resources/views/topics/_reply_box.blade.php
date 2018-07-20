@include('common.error')
<div class="reply-box">
    <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <div class="form-group">
            <textarea id="inputor" class="form-control" rows="3" placeholder="分享你的想法" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share"></i>回复</button>
    </form>
</div>
<hr>

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.atwho.css') }}">
@stop

@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/jquery.caret.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/jquery.atwho.js') }}"></script>

    <script>
    $('#inputor').atwho({
        at: "@",
        data:['Peter', 'Tom', 'Anne']
    });
    </script>
@stop