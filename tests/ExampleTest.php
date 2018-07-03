<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use MailTracking;


    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        Mail::raw('Hello World', function ($message) {
            $message->to('example@gmail.com');
            $message->from('zaratedev@gmail.com');
        });

        Mail::raw('Hello World', function ($message) {
            $message->to('example@gmail.com');
            $message->from('zaratedev@gmail.com');
        });

        $this->seeEmailsSent(2)
            ->seeEmailTo('example@gmail.com');
    }
}
