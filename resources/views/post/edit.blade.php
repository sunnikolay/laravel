@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('post.update', ['post' => $post->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{$post->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" name="post_content" id="content" placeholder="Content">{{$post->post_content}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" class="form-control" name="image" id="image" placeholder="Image"  value="{{$post->image}}">
                    </div>
                    <div class="mb-3">
                        <label for="likes" class="form-label">Likes</label>
                        <input type="number" class="form-control" name="likes" id="likes" placeholder="Likes"  value="{{$post->likes}}">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category_id">
                            @foreach($categories as $category)
                                <option
                                        {{$category->id === $post->category->id ? ' selected':''}}
                                        value="{{$category->id}}"
                                >{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary btn-sm mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
