<?php

namespace App\Jobs;

use App\Services\TransactionService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\UploadedFile;

class ImportCsv implements ShouldQueue
{
    use Queueable;

    public UploadedFile $file;

    public function __construct(UploadedFile $file){
        $this->file = $file;
    }
    
    public function handle(TransactionService $service): void {
        $entries = array_map('str_getcsv', file($this->file));
        $STARTING_LINE = 18;
        $service->importCsv($entries, $STARTING_LINE);
    }
}
