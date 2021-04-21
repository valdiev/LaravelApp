@extends("layouts.template")


@section("content")
  <h1 class="font">Index</h1>

<div class="album">
  @foreach($photos as $p)
          <div class="pic">
            <img src="{{$p->url}}" alt="{{$p->title}}" />
            <span>{{$p->title}} - <a href='/users/{{$p->user_id}}' >{{$p->user->name}}</a></span>
          </div>
  @endforeach
</div>

    <p class="font">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
      It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
@endsection
