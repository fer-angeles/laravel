<?php

namespace App\Jobs;

use App\FakePostModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessFakePost implements ShouldQueue
{

	private $data;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( array $data )
    {
    	$this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    	$post = new FakePostModel;

	    $post->post_name = $this->data['post_name'];
	    $post->description = $this->data['description'];
	    $post->save();
    }
}
