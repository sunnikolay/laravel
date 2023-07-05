@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('post.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="title">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" name="post_content" id="content" placeholder="Content"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" class="form-control" name="image" id="image" placeholder="Image">
                    </div>
                    <div class="mb-3">
                        <label for="likes" class="form-label">Likes</label>
                        <input type="number" class="form-control" name="likes" id="likes" placeholder="Likes">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection