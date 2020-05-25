<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class QueueRetryAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:retry-multiple';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Queue retry multiple from DB ( table failed_jobs )';

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
    	$this->line('ready');
	    $failed = $this->laravel['queue.failer']->all();

	    if ( empty($failed) )
		    Log::error('No failed jobs.');

	    collect($failed)->each(function($value) {
		    $this->call('queue:retry', [
			    'id' => $value->id
		    ]);
	    });
    }
}
