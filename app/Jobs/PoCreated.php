<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Models\Order;

class PoCreated implements ShouldQueue
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

        Order::create([
          'id' => $this->data['id'],
          'rfq_no' => $this->data['rfq_no'],
          'po_no' => $this->data['po_no'],
          'amdnt_no' => $this->data['amdnt_no'],
          'letterhead' => $this->data['letterhead'],
          'po_date' => $this->data['po_date'],
          'status' => $this->data['status'],
        ]);
    }
}
