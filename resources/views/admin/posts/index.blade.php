@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1>Elenco posts</h1>
        @if (session('deleted'))
          <div class="alert alert-danger" role="alert">
            {{session('deleted')}}
          </div>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col" colspan="4">TITOLO</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
                
              <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td><a href="{{route('admin.posts.show', $post)}}" class="btn btn-info">SHOW</a></td>
                <td><a href="{{route('admin.posts.edit', $post)}}" class="btn btn-success">EDIT</a></td>
                <td>
                  <form onsubmit="return confirm('Confermi eliminazione post: {{$post->title}} ')" 
                  action="{{route('admin.posts.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">DELETE</button>

                  </form>
                </td> 
              </tr>

            @endforeach
          </tbody>
        </table>
        
    </div>
    {{ $posts->links() }} 
</div>
@endsection

@section('title')

   | Elenco post
    
@endsection