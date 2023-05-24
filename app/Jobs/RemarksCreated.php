<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Models\Remark;

class RemarksCreated implements ShouldQueue
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

        Remark::create([
          'id'=> $this->data['id'],
          'rfq_no' => $this->data['rfq_no'],
          'sche_no' => $this->data['sche_no'],
          'remarks' => $this->data['remarks'],
          'camremarks' => $this->data['camremarks'],
          'salesremarks' => $this->data['salesremarks'],
          'from' => $this->data['from'],
          'to' => $this->data['to'],
          'status' => $this->data['status']
        ]);
    }
}
