<li class="d-flex @if ( ! $loop->last) border-bottom @endif">
    <div>
      <a href="{{ route('users.show', $notification->data['user_id']) }}">
        <img class="img-thumbnail mr-3" alt="{{ $notification->data['user_name'] }}" src="{{ $notification->data['user_avatar'] }}" style="width:48px;height:48px;" />
      </a>
    </div>

    <div class="flex-grow-1 ms-2">
      <div class="mt-0 mb-1 text-secondary">
        <a class="text-decoration-none" href="{{ route('users.show', $notification->data['user_id']) }}">{{ $notification->data['user_name'] }}</a>
        回覆了
        <a class="text-decoration-none" href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>

        {{-- 回覆刪除按鈕 --}}
        <span class="meta float-end" title="{{ $notification->created_at }}">
          <i class="far fa-clock"></i>
          {{ $notification->created_at->diffForHumans() }}
        </span>
      </div>
      <div class="reply-content">
        {!! $notification->data['reply_content'] !!}
      </div>
    </div>
  </li>
