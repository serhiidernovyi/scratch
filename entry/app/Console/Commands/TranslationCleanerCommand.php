<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use UseCases\Integration\PMS\ClearTranslation;

class TranslationCleanerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pms:clear-translation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Translation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ClearTranslation $use_case)
    {
        $use_case->handle();

        return 0;
    }
}
