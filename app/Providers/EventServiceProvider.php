<?php

namespace App\Providers;

use App\Jobs\RfqCreated;
use App\Jobs\RfqScheduleCreated;
use App\Jobs\RfqStatusUpdate;
use App\Jobs\RfqScheStatusUpdate;
use App\Jobs\PoCreated;
use App\Jobs\PoUpdate;
use App\Jobs\PoStatusUpdate;
use App\Jobs\PoLetterheadUpdate;
use App\Jobs\RemarksCreated;
use App\Jobs\ComplainCreated;
use App\Jobs\ComplainRemarksCreated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        \App::bindMethod(RfqCreated::class . '@handle' , function($job) {
            return $job->handle();
       });

         \App::bindMethod(RfqScheduleCreated::class . '@handle' , function($job) {
             return $job->handle();
        });

        \App::bindMethod(RfqStatusUpdate::class . '@handle' , function($job) {
            return $job->handle();
       });

     \App::bindMethod(RfqScheStatusUpdate::class . '@handle' , function($job) {
         return $job->handle();
      });

      \App::bindMethod(PoCreated::class . '@handle' , function($job) {
          return $job->handle();
     });

      \App::bindMethod(PoUpdate::class . '@handle' , function($job) {
          return $job->handle();
     });


     \App::bindMethod(PoStatusUpdate::class . '@handle' , function($job) {
         return $job->handle();
    });

    \App::bindMethod(PoLetterheadUpdate::class . '@handle' , function($job) {
        return $job->handle();
   });

     \App::bindMethod(RemarksCreated::class . '@handle' , function($job) {
         return $job->handle();
    });


      \App::bindMethod(ComplainCreated::class . '@handle' , function($job) {
          return $job->handle();
     });

     \App::bindMethod(ComplainRemarksCreated::class . '@handle' , function($job) {
         return $job->handle();
    });
        // \App::bindMethod(UserCreated::class . '@handle', fn($job) => $job->handle());
    }
}
