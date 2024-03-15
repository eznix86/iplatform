<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Policy;
use Illuminate\Console\Command;

class ScoutCreateIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scout:import-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scout import all models to Meilisearch.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $indexable_models = [
            Policy::class,
        ];

        foreach ($indexable_models as $indexable_model) {
            $this->call('scout:flush', ['model' => $indexable_model]);
        }

        foreach ($indexable_models as $indexable_model) {
            $this->call('scout:import', ['model' => $indexable_model]);
        }
    }
}
