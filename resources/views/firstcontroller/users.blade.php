@extends("layouts.template")


@section("content")

  <h1>{{$user->name}}</h1>
  <div class="img_profil">
    <img src="{{$user->profil}}" alt="{{$user->name}}">
  </div>
  <ul>
    <li><p>{{$user->photos->count()}}<br>publications</p></li>
    <li><p>{{$user->IFollowThem()->count()}}<br>abonnés</p></li>
    <li><p>{{$user->theyFollowMe()->count()}}<br>abonnements</p></li>
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
  <div class="album">
    @foreach($user->photos as $p)
            <div class="pic">
              <img src="{{$p->url}}" alt="{{$p->title}}" />
              <span>{{$p->title}}</span>
            </div>
    @endforeach
  </div>

@endsection
