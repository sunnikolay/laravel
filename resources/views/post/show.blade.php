@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item"><b>id: </b>{{$post->id}}</li>
                    <li class="list-group-item"><b>title: </b>{{$post->title}}</li>
                    <li class="list-group-item"><b>content: </b>{{$post->content}}</li>
                    <li class="list-group-item"><b>image: </b>{{$post->image}}</li>
                    <li class="list-group-item"><b>likes: </b>{{$post->likes}}</li>
                    <li class="list-group-item"><b>published: </b>{{$post->is_published}}</li>
                    <li class="list-group-item"><b>create: </b>{{$post->created_at}}</li>
                    <li class="list-group-item"><b>update: </b>{{$post->updated_at}}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
                <a href="{{route('post.index')}}" class="btn btn-primary btn-sm mt-3">Back</a>
            </div>
            <div class="col-md-1">
                <a href="{{route('post.edit', [$post->id])}}" class="btn btn-success btn-sm mt-3 float-right">Edit</a>
            </div>
            <div class="col-md-1">
                <form action="{{route('post.delete', [$post->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm mt-3">
                </form>
            </div>
        </div>
    </div>
@endsection
