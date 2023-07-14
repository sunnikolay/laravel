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
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Likes</th>
                        <th scope="col">Tags</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $post)
                        <tr>
                            <th scope="row"><a href="{{route('post.show',$post->id)}}">{{$post->id}}</a></th>
                            <td>{{$post->category->title}}</td>
                            <td><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->likes}}</td>
                            <td>
                                @foreach($post->tags as $tag)
                                    <input class="btn btn-outline-info btn-sm mb-1" type="button" value="{{$tag->title}}">
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div>
                    {{$collection->withQueryString()->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
