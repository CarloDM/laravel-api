@extends('layouts.admin')
@section('content')

<div class="container p-3 text-center">
  <h2 class="fs-4 text-secondary my-3">Autori</h2>
  <div class="">

    <table class="table table-info table-striped">
      <thead>
        <tr>
          <th scope="col">ID</a></th>
          <th scope="col">name</th>
          <th scope="col">numero posts</th>
          <th scope="col">posts pubblicati</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($authors as  $author)
        <tr>
          <th scope="row">{{$author->id}}</th>
          <th scope="row">{{$author->name}}</th>
          <th scope="row">{{count($author->posts)}}</th>
          <th scope="row">

            <ul>
              @foreach ( $author->posts as $post )
              <li><a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a></li>
              @endforeach
            </ul>

          </th>


        </tr>
        @endforeach
      </tbody>

    </table>

  </div>
</div>
@endsection
