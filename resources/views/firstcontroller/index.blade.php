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
              <span class="img_likes">{{ $p->likes->count() }} ❤️</span>

              @auth 
              @if(Auth::id() != $like->id)
                <a href="#">J'aime !</a>
              @else
                <a href="#">Je n'aime plus !</a>
              @endif
              @endauth
            </div>
          </div>
  @endforeach
</div>

@endsection
