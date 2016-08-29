<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 18/08/16
 * Time: 07:44 PM
 */

namespace App\Jobs;


class Test extends Job
{
    public function fire($job) {
        \Log::info("Hola que hace ");
        $user = \App\User::first();
        $user->assistance ++;
        $user->update();
        $job->delete();
    }
}