<?php

namespace Tests\Feature;

use App\Models\SentEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {


        $this->withoutExceptionHandling();
        $response =  $this->post('/api/sentEmail',[
            'toEmail'=>'felixrunye@gmail.com',
            'subject'=>'Greetings',
            'content'=>'Hey There',
            'status'=>'posted'
        ]);

        $response->assertOk();

        $this->assertCount(1, SentEmail::all());

    }
}
