<?php

namespace App\Console\Commands;

use App\Jobs\PostJob;
use App\Jobs\ReintentPost;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendFakePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:fake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send fake post with http';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	    PostJob::dispatch()->delay(now()->addSeconds(5));
    }
}
