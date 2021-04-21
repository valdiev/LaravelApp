@extends("layouts.general")

@section("content")

  <h1>profil de {{$user->name}}</h1>
  <ul>
    <li><p>Follow {{$user->IFollowThem()->count()}} personnes</p></li>
    <li><p>Followed by {{$user->theyFollowMe()->count()}} personnes</p></li>
  </ul>


  @auth
    @if(Auth::id() != $user->id)
              @if(Auth::user()->IFollowThem->contains($user->id))
                  je le suis
                  <a href="/changesuivi/{{$user->id}}">STOP</a>
              @else
                  je ne le suis pas encore <a href="/changesuivi/{{$user->id}}">SUIVRE</a>
              @endif

    @endif
  @endauth

  @foreach($user->photos as $p)
          <div class="pic">
            <img src="{{$p->url}}" alt="{{$p->title}}" />
            <span>{{$p->title}}</span>
          </div>
  @endforeach


@endsection
