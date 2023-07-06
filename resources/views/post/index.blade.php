@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <a href="{{route('post.create')}}" class="btn btn-primary btn-sm mb-3">create</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Likes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $post)
                        <tr>
                            <th scope="row"><a href="{{route('post.show',$post->id)}}">{{$post->id}}</a></th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->likes}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
