@if ($comments != null)
@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div style="text-align:center; align-items:center; justify-content:center; padding-bottom: 15px;">
            <img src="{{asset('/storage/avatars/founders/'.$comment->user->founder->founder_avatar)}}" alt="avatar" style="width: 40px; height:40px; float: left; border-radius: 50%; margin-right: 25px;">
        </div >
        <strong>{{ $comment->user->name }} <span style="background-color:red; border-radius:10px; color: white; padding: 0 5px; font-size: 13px;">{{ $comment->user->role }}</span>  </strong>
        
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="project_post_id" value="{{ $project_post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Reply" />
            </div>
            {{-- <hr /> --}}
        </form>
        @include('FounderPostsPublic.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
@endif