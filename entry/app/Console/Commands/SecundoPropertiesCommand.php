<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use UseCases\Integration\Secundo\SynchronizeSecundoProperties;

class SecundoPropertiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secundo:synchronization';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Secundo Properties Synchronization';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(SynchronizeSecundoProperties $synchronize_properties)
    {
        $synchronize_properties->handle();

        return 0;
    }
}
