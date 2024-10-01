<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use Illuminate\Console\Command;
use Carbon\Carbon;


class ImportTransactions extends Command
{
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
        $filepath = $this->argument('file');
            
        if (!file_exists($filepath)) {
            $this->error('The specified file does not exist.');
            return 1;
        }
        
        $entries = array_map('str_getcsv', file($filepath));
        $headers = array_shift($entries);

        $STARTING_LINE = 17;
        foreach ($entries as $index => $entry) {
            if ($index < $STARTING_LINE) {
                continue;
            }
            if (!isset($entry[0])) {
                continue;
            }
            $date = Carbon::parse($entry[0]);
            $reference = $entry[1] ?? '';
            $debit_amount = isset($entry[2]) ? (float) $entry[2] : 0;
            $credit_amount = isset($entry[3]) ? (float) $entry[3] : 0;
            $ref1 = $entry[4] ?? '';
            $ref2 = $entry[5] ?? '';
            $ref3 = $entry[6] ?? '';

            Transaction::create([
                'transaction_date' => $date,
                'reference' => $reference,
                'amount' => $debit_amount, // change this
                'ref1' => $ref1,
                'ref2' => $ref2,
                'ref3' => $ref3,
            ]);
            

            
        }
        // DB::table('workgroups')->insert($this->combineHeadersAndData($headers, $data));
        
        // $this->info('Workgroups imported successfully.');
        // return 0;
    }
}
