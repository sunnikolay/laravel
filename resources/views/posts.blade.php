@extends('layouts.main')
@section('content')
    <h2>This is POSTS page</h2>
    @foreach($collection as $post)
        <div>{{$post->title}}</div>
        <div>{{$post->content}}</div>
        <div>{{$post->likes}}</div>
    @endforeach
@endsection
