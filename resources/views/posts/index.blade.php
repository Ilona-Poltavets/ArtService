@extends('layouts.main')
@section('title', 'Arts')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @auth()
        <input class="search form-control" type="text" placeholder="Enter author name ...">
        <div class="row m-2">
            <select class="form-select col sort" name="sort">
                <option class="dropdown-item" value="new_to_old" selected>From new to old</option>
                <option class="dropdown-item" value="old_to_new">From old to new</option>
                <option class="dropdown-item" value="high_to_low">Rated from high to low</option>
                <option class="dropdown-item" value="low_to_high">Rated from low to high</option>
            </select>
            <select class="form-select col category" name="category">
                @foreach($categories as $key=>$cat)--}}
                <option class="dropdown-item" value="{{$key}}">{{$cat}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success col" onclick="sortFilterPosts()">OK</button>
        </div>
    @endauth
    <div id="table">
        @foreach($posts as $post)
            <div class="content-tile">
                <a class="content-tile__link" href="{{route('posts.show',$post->id)}}">
                    <h2 class="content-tile__title">{{$post->title}}</h2>
                    <hr>
                </a>
                <div class="content-tile__main-content">
                    @if($post->category=='literature')
                        <div class="content-tile__main-content">
                            <img class="content-tile__pdf_icon" src="{{asset('/css/icons/pdf.png')}}"
                                 alt="{{$post->title}}"/><a
                                href="{{asset($post->pathFile)}}" target="_blank">{{$post->title}}</a>
                        </div>
                    @elseif($post->category=='art')
                        <img class="content-tile__image" src="{{asset($post->pathFile)}}" alt="{{$post->title}}">
                    @elseif($post->category=='sound')
                        <div class="content-tile__main-content">
                            <audio controls>
                                <source src="{{asset($post->pathFile)}}" type="audio/mp3">
                                Your browser does not support the <code>audio</code> element
                            </audio>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="content-tile__footer row">
                    <p class="col">
                        Author: <a
                            href="{{route('get_posts',$post->user_id)}}">{{$post->user->name}} {{$post->user->surname}}</a>
                    </p>
                    <p class="col">
                        Rating: {{$post->rating}}
                    </p>
                    <p class="col">
                        @if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->hasPermission('can_rate') && \Illuminate\Support\Facades\Auth::user()->expertData->category==$post->category)
                            @php($item=$post->hasReview(\Illuminate\Support\Facades\Auth::user()->id))
                            <a class="btn btn-outline-success"
                               href="@if($item !== null){{route('rates.edit',[$item->id,$post->id])}}@else{{route('rates.create',$post->id)}}@endif">
                                Estimate
                            </a>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div id="paginate" class="d-flex m-2">
        {!! $posts->links() !!}
    </div>

    <script>

        function buildPostTable(data) {
            const tbl = document.getElementById('table');
            var userId = data.user.id;
            for (var i = 0; i < data.posts.length; i++) {
                var row = `
                        <div class="content-tile">
                        <a class="content-tile__link" href="/posts/${data.posts[i].id}">
                            <h2 class="content-tile__title">${data.posts[i].title}</h2>
                            <hr>
                        </a>
                        <div class="content-tile__main-content">`
                if (data.posts[i].category === 'literature') {
                    row += `<div class="content-tile__main-content">
                            <img class="content-tile__pdf_icon" src="/css/icons/pdf.png"
                                         alt="${data.posts[i].title}"/><a
                                        href="${data.posts[i].pathFile}" target="_blank">${data.posts[i].title}</a>
                                </div>`;
                } else if (data.posts[i].category === 'art') {
                    row += `<img class="content-tile__image" src="${data.posts[i].pathFile}" alt="${data.posts[i].title}">`
                } else if (data.posts[i].category === 'music') {
                    row += `<div class="content-tile__main-content">
                            <audio controls>
                                <source src="${data.posts[i].pathFile}" type="audio/mp3">
                                        Your browser does not support the <code>audio</code> element
                                    </audio>
                                </div>`;
                }
                row += `</div>
                        <hr>
                        <div class="content-tile__footer row">
                            <p class="col">
                                Author: <a
                                    href="authorsPosts/${data.posts[i].user_id}">About author</a>
                            </p>
                            <p class="col">
                                Rating: ${data.posts[i].rating}
                        </p>
                    </div>
                </div>`;
                tbl.innerHTML += row;
            }
        }

        function sortPostsByCategory(val) {
            $.ajax({
                method: "POST",
                url: "/getByCat",
                data: {text_input: val, _token: '{{csrf_token()}}'},
                success: function (data) {
                    $("#table .content-tile").remove();
                    $("#paginate").remove();
                    buildPostTable(data);
                }
            })
        }

        $('.search').bind("change keyup input click", function () {
            $.ajax({
                method: "POST",
                url: "/search",
                data: {text_input: $(this).val(), _token: '{{csrf_token()}}'},
                success: function (data) {
                    $("#table .content-tile").remove();
                    $("#paginate").remove();
                    buildPostTable(data);
                }
            })
        })

        function sortFilterPosts() {
            var sort = $("select.sort").val();
            var cat = $("select.category").val();
            $.ajax({
                method: "POST",
                url: "/sort",
                data: {sort: sort, category: cat, _token: '{{csrf_token()}}'},
                success: function (data) {
                    $("#table .content-tile").remove();
                    $("#paginate").remove();
                    buildPostTable(data);
                }
            })
        }

    </script>
@endsection
