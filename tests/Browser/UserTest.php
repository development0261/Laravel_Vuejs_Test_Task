<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use App\Userinforamtion;

class UserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('@name',"Demo")
                    ->type('@email',"NewDemo@gmaildemo.com")
                    ->type('@phone_number',"(123) 456-7899")
                    ->type('@zip_code',"12345")
                    ->type('@address',"India")
                    ->press('Add')
                    ->assertPathIs('/');
        });
    }
}
