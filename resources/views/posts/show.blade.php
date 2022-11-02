@extends('layouts.main')
@section('title',$post->title)
@section('content')
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
    <div class="show-content">

        <h1 class="show-content__header">{{$post->title}}</h1>@if(\Illuminate\Support\Facades\Auth::user() && $post->user_id==\Illuminate\Support\Facades\Auth::user()->id)<a class="btn btn-info"
                                                                 href="{{route('posts.edit',$post->id)}}">Edit</a>@endif
        <hr>
        <div class="show-content__content">
            @if($post->category=='literature')
                <object class="show-content__preview" data='{{asset($post->pathFile)}}' type="application/pdf">
                    <iframe src='{{asset($post->pathFile)}}'>
                        <p>This browser does not support PDF!</p>
                    </iframe>
                </object>
            @elseif($post->category=='art')
                <a data-fancybox="single" href="{{asset($post->pathFile)}}">
                    <img src="{{asset($post->pathFile)}}" alt="{{$post->title}}"
                         class="show-content__photo single-images">
                </a>
            @elseif($post->category=='sound')
                <div class="show-content__sound">
                    <audio controls>
                        <source src="{{asset($post->pathFile)}}" type="audio/mp3">
                        Your browser does not support the <code>audio</code> element
                    </audio>
                </div>
            @endif
        </div>
        <div class="show-content__about-author"><a
                href="{{route('get_posts',$post->user_id)}}">{{$post->user->name}} {{$post->user->surname}}</a></div>
        <hr>
        <div class="show-content__comments">
            <h2>Comments</h2>
            <hr>
            @auth()
                <textarea id="commentField" class="textareaComment" name="commentField"
                          aria-placeholder="Enter your comment"></textarea>
                <button class="btn btn-outline-primary" onclick="sendComment()">Send</button>
                <div id="comments_block" class="show-content__comment">
                    @foreach($comments as $comment)
                        <div class="comment-block" onclick="rememberId({{$comment->id}})" data-bs-toggle="modal"
                             data-bs-target="#exampleModal">
                            <div
                                class="comment-block__header">{{$comment->user->name}} {{$comment->user->surname}}</div>
                            <div class="comment-block__body">{{$comment->text}}</div>
                            @php($tmp=$comment->answers)
                            @if($tmp!=null)
                                <div class="comment-block__answers">
                                    @foreach($tmp as $t)
                                        <div
                                            class="comment-block__header">{{$t->user->name}} {{$t->user->surname}}</div>
                                        <div class="comment-block__body">{{$t->text}}</div>
                                    @endforeach
                                </div>
                            @endif()
                        </div>
                    @endforeach
                </div>
            @endauth
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Answer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea class="textareaComment" id="commentAnswerField"
                              aria-placeholder="Enter your comment"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="sendAnswer()" data-bs-dismiss="modal">Send
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function rebuildTable(data) {
            const div = document.getElementById('comments_block');
            for (var i = 0; i < data.comments.length; i++) {
                var row = `<div class="comment-block" onclick="rememberId(${data.comments[i].id})" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="comment-block__header">${data.comments[i].user_name} ${data.comments[i].user_surname}</div>
                        <div class="comment-block__body">${data.comments[i].text}</div>`;
                row += `<div class="comment-block__answers">`
                for (var j = 0; j < data.answers.length; j++) {
                    if (data.answers[j].comment_id === data.comments[i].id) {
                        row += `<div class="comment-block__header">${data.answers[j].user_name} ${data.answers[j].user_name}</div>
                        <div class="comment-block__body">${data.answers[j].text}</div>`;
                    }
                }
                row += `</div></div>`;
                div.innerHTML += row;
            }
        }

        var id = 0;

        function rememberId(idIn) {
            id = idIn;
        }

        function sendComment() {
            var txt = $('#commentField').val();
            var userId = "<?php echo(Auth::user()->id) ?>";
            var postId = "<?php echo($post->id) ?>";
            $.ajax({
                method: "POST",
                url: "/send_comment",
                data: {
                    text_input: txt,
                    user_id: userId,
                    post_id: postId,
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    $('.comment-block').remove();
                    rebuildTable(data);
                }
            })
        }

        function sendAnswer() {
            var txt = $('#commentAnswerField').val();
            $('#commentAnswerField').val("");
            var userId = "<?php echo(Auth::user()->id) ?>";
            var postId = "<?php echo($post->id) ?>";
            $.ajax({
                method: "POST",
                url: "/send_answer",
                data: {
                    text_input: txt,
                    user_id: userId,
                    post_id: postId,
                    comment_id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    $('.comment-block').remove();
                    rebuildTable(data);
                }
            })
        }
    </script>
@endsection
