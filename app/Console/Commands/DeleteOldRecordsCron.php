<?php

namespace App\Console\Commands;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldRecordsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-records:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     */
    public function handle()
    {
        $links = Link::query()
            ->where('created_at', '<', Carbon::now()->subDays(3))->get();
        if (count($links)) {
            foreach ($links as $link) {
                Link::query()->find($link->id)->delete();
            }
        }
    }
}
