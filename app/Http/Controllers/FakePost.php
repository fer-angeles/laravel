<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessFakePost;
use Illuminate\Support\Facades\Log;

class FakePost extends Controller
{
	/**
	 * fake_post
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function fake_post()
	{
		ProcessFakePost::dispatch(\request()->all());
		return response()->json(true,200);
	}
}
