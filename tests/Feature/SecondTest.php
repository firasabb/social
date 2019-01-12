<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SecondTest extends TestCase
{

    
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */


    public function retrieve(){

        $accounts = \App\SocialAccount::all();
        
        return $accounts;
    }


    /** @test */
    public function exampleTest(){

        $socialAccount = factory(\App\SocialAccount::class)->create();
        $secSocialAccount = factory(\App\SocialAccount::class)->create([
            'user_id' => $socialAccount->user_id
        ]);
        $accounts = $this->retrieve();

        $this->assertCount(2, $accounts);
    }
}
