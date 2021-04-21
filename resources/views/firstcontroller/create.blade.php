@extends("layouts.template")


@section("content")
  <h1>Create</h1>

  @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
  @endforeach

  <form class="" action="photos/store" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset>
      <input type="text" name="title" placeholder="titre de la photo" required value="{{ old('title') }}">
      <input type="file" name="image" placeholder="upload de la photo" required>
      <input type="number" name="note" placeholder="note de la photo" required value="{{ old('note') }}">
      <input type="submit">
    </fieldset>
  </form>

@endsection
