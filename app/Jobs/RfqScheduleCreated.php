<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Models\QuoteSchedule;

class RfqScheduleCreated implements ShouldQueue
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

        QuoteSchedule::where('schedule_no',$this->data['schedule_no'])->delete();

        QuoteSchedule::create([
           'id' => $this->data['id'],
           'quote_id'=> $this->data['quote_id'],
           'schedule_no'=> $this->data['schedule_no'],
           'quantity'=> $this->data['quantity'],
           'pro_size'=> $this->data['pro_size'],
           'sub_cat_id'=> $this->data['sub_cat_id'],
           'to_date'=> $this->data['to_date'],
           'from_date'=> $this->data['from_date'],
           'kam_price'=> $this->data['kam_price'],
           'expected_price'=> $this->data['expected_price'],
           'plant'=> $this->data['plant'],
           'pickup_type'=> $this->data['pickup_type'],
           'location'=> $this->data['location'],
           'bill_to'=> $this->data['bill_to'],
           'ship_to'=> $this->data['ship_to'],
           'remarks'=> $this->data['remarks'],
           'kamsRemarks'=> $this->data['kamsRemarks'],
           'salesRemarks'=> $this->data['salesRemarks'],
           'kamsRemarkssp'=> $this->data['kamsRemarkssp'],
           'kamsRemarkssh'=> $this->data['kamsRemarkssh'],
           'delivery'=> $this->data['delivery'],
           'valid_till'=> $this->data['valid_till'],
           'confirm_date'=> $this->data['confirm_date'],
           'pay_term'=> $this->data['pay_term'],
           'credit_days'=> $this->data['credit_days'],
           'quote_status'=> $this->data['quote_status'],

       ]);
    }
}
