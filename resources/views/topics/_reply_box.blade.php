@include('shared._errors')

<div class="reply-box">
  <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    <div class="mb-3">
      <textarea class="form-control" rows="3" placeholder="{{Auth::user()->name}}要加入討論嗎?" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i> 送出</button>
  </form>
</div>
<hr>
