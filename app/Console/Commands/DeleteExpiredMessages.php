<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Message;
use Illuminate\Console\Command;

class DeleteExpiredMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Expired Messages.';

    /**
     * Execute the console command. 
     */
    public function handle()
    {
        Message::where('expires_at', '<=', Carbon::now('UTC')->toDateTimeString())->delete();
        $this->info('Expired messages deleted successfully.');
    }
}
