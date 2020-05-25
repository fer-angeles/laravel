<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PostJob implements ShouldQueue
{
	private $url = 'http://laravel.local/api/fake/post';

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
	    Log::info( $this->url );
	    $response = Http::post($this->url);
	    try
	    {
		    if ( $response->failed() || $response->clientError() || $response->serverError())
		    {
		    	$message = "Http: failed - " .
				    json_encode($response->failed())." clientError - ".
				    json_encode($response->clientError())." serverError - ".
				    json_encode($response->serverError());

			    PostJob::dispatch()->delay(now()->addSeconds(10));

			    Log::error($message);
		    	throw new \Exception($message);
		    }
		    else
		    {
			    Log::info( $response );
		    }
	    }
	    catch (\Exception $e)
	    {
		    Log::error('Http: post error:' . $e->getMessage() );
	    }
    }
}
