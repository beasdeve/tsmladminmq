<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Models\Quote;
use App\Models\Models\QuoteSchedule;
use DB;

class RfqCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         print_r($this->data);

         $up = Quote::where('rfq_no',$this->data['rfq_no'])->where('cat_id',$this->data['cat_id'])->delete();
       
         Quote::create([
           'id' => $this->data['id'],
            'product_id'=> $this->data['product_id'],
            'cat_id'=> $this->data['cat_id'],
            'user_id'=> $this->data['user_id'],
            'quantity'=> $this->data['quantity'],
            'quote_type'=> $this->data['quote_type'],
            'kam_status'=> $this->data['kam_status'],
            'rfq_no'=> $this->data['rfq_no'],
            'quote_no'=> $this->data['quote_no'],

        ]);
    }
}
