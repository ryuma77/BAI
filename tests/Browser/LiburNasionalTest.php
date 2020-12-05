<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LiburNasionalTest extends DuskTestCase
{
    public function testIndex()
    {
        $admin = App\Models\User::find(1);
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin);
            $browser->visit(route('admin.liburnasional.index'));
            $browser->assertRouteIs('admin.liburnasional.index');
        });
    }
}
