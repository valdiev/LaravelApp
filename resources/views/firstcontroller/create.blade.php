@extends("layouts.template")


@section("content")
<h1>Importer une image</h1>


@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach

<form class="formCreate" action="photos/store" method="post" enctype="multipart/form-data">
  @csrf

  <input type="file" name="image" class="file" placeholder="upload de la photo" required>
  <input type="text" name="title" class="input" placeholder="titre de la photo" required value="{{ old('title') }}">
  <input class="submit" type="submit">

</form>

<p>Votre image doit respecter les normes de la plateforme. Pas de nudité, pas d'incitation à la haine.<br>
  <br>
  En cas de non respect vous vous exposez à une exclusion temporaire ou définitive.
</p>
@endsection