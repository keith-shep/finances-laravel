<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ImportTransactions extends Command
{

    private TransactionService $service; 

    public function __construct(){
        $this->service = new TransactionService();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-transactions {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $filepath = $this->argument('file');
            
        // if (!file_exists($filepath)) {
        //     $this->error('The specified file does not exist.');
        //     return 1;
        // }


        // $this->service->importCsv();
        
        

        
    }
}
