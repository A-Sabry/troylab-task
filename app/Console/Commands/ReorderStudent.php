<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\School;
use App\Models\Student;

class ReorderStudent extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Students:reorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command reorder all student by school';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {

        $schools = School::all();

        foreach ($schools as $school) {
            $order = 1;
            foreach ($school->students as $student) {
                //$this->info($order);
                $student->update(['order' => $order]);
                $order++;
            }
        }
        
//        Mail::raw('Hello, welcome to Laravel!', function ($message) {
//            $message
//                    ->to(...)
//                    ->subject(...);
//        });
        $this->info('reorder all student by school Run successfully!');
    }

}
