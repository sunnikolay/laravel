<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class IndexController extends BaseController
{
	public function __invoke(FilterRequest $request)
	{
		// Check policy for user
		// $this->authorize('view', auth()->user());

	    $data = $request->validated();

	    $page = $data['page'] ?? 1;
	    $perPage = $data['per_page'] ?? 10;
	    
	    $filter = app()->make(PostFilter::class, ['queryParams'=>array_filter($data)]);
		$collection = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

		return PostResource::collection($collection);
		//return view('post.index', compact('collection'));
	}
}