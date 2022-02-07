@extends('layouts.app')

@section('content')
    <div class="container">
      <div>
        <h1>Modifica: {{$post->title}}</h1>

        @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('admin.posts.update', $post) }}" method="POST">
          @csrf
          @method('PUT')
          <form>
            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input value="{{old('title', $post->title)}}" type="text" 
              class="form-control @error('title') is-invalid @enderror" id="title" 
              name="title" placeholder="titolo">
              @error('title')
                  <p>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Contenuto post</label>
              <textarea 
              class="form-control @error('content') is-invalid @enderror"
              id="content" name="content" rows="3">{{old('content', $post->content)}}</textarea>
              @error('content')
                  <p>{{ $message }} </p>
              @enderror
            </div>
            <button type="submit" class="btn btn-success">Invia</button>

          </form>

      </div>
    
    </div>
@endsection

@section('title')
    Nuovo Post
@endsection