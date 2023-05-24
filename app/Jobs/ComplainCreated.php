<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Models\ComplainRemarks;
use App\Models\Models\ComplainMain;

class ComplainCreated implements ShouldQueue
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

        ComplainMain::create([
          'id' => $this->data['complainmain']['id'],
          'com_cate_id' =>$this->data['complainmain']['com_cate_id'],
          'com_sub_cate_id' =>$this->data['complainmain']['com_sub_cate_id'],
          'po_number' =>$this->data['complainmain']['po_number'],
          'po_date' =>$this->data['complainmain']['po_date'],
          'user_id'=>$this->data['complainmain']['user_id']
        ]);


       ComplainRemarks::create([
         'id' => $this->data['remarks']['id'],
         'cust_com_file' => $this->data['remarks']['cust_com_file'],
         'complain_id' => $this->data['remarks']['complain_id'],
         'customer_remarks' => $this->data['remarks']['customer_remarks']

       ]);

    }
}
