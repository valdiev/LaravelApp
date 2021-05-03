@extends("layouts.template")


@section("content")
  <h1 class="font">Index</h1>

<div class="album">
  @foreach($photos as $p)
          <div class="pic">
            <img src="{{$p->url}}" alt="{{$p->title}}" />
            <div class="img_bg"></div>
            <div class="user_infos">
              <span class="img_title">{{ $p->title }}</span>
              <span class="user_name"><a href='/users/{{$p->user_id}}' >{{ $p->user->name }}</a></span>
              <span class="img_likes">{{ $p->liked()->count() }} ❤️</span>
            </div>
            <div class="like_btn">
              <a href="/likes/{{$p->id}}"><i class="far fa-heart"></i></a>
            </div>
          </div>
  @endforeach
</div>

@endsection
