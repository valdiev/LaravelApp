@extends("layouts.template")


@section("content")

<h1 class="userName">{{$user->name}}</h1>
<!-- <div class="img_profil">
  <img src="{{$user->profil}}" alt="{{$user->name}}">
</div> -->
<ul class="navItems">
  <li>
    <p>{{$user->photos->count()}}<br>publications</p>
  </li>
  <li>
    <p>{{$user->IFollowThem()->count()}}<br>abonnés</p>
  </li>
  <li>
    <p>{{$user->theyFollowMe()->count()}}<br>abonnements</p>
  </li>
</ul>

<div class="overview">
  <p {{Auth::check()  && Auth::id() == $user->id ? "contenteditable" : ""}}>
    {!! $user->overview == null ? "Dites-en plus sur vous ! :)" : $user->overview !!}

  </p>

  @if(Auth::check() && Auth::id() == $user->id)
  <form id="overviewForm" method="post" action="/users/updateoverview">
    @csrf
    <input type="hidden" name="overview">
    <button type="submit" class="btn">Modifer</button>
  </form>
  @endif
</div>


@auth
@if(Auth::id() != $user->id)
@if(Auth::user()->IFollowThem->contains($user->id))
<a class="suivre" href="/changesuivi/{{$user->id}}">Se désabonner</a>
@else
<a class="suivre" href="/changesuivi/{{$user->id}}">S'abonner</a>
@endif

@endif
@endauth
<div class="album user_photo">
  @foreach($user->photos as $p)
  <div class="pic">
    <img src="{{$p->url}}" alt="{{$p->title}}" />
    <span>{{$p->title}}</span>
  </div>
  @endforeach
</div>

<div class="no_photo">
  <h3>Aucune photo</h3>
</div>

@endsection