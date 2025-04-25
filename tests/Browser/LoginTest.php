<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group Login
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            // Mengunjungi halaman login
            $browser->visit('/login') 
                    // Mengambil screenshot halaman login sebelum mengisi form
                    ->screenshot('prelogin-check') 
                    // Mengisi input email dengan email pengguna yang sudah terdaftar sebelumnya
                    ->type('#email', 'raditya@example.com') 
                    // Mengisi input password dengan nilai 'password'
                    ->type('#password', 'password') 
                    // Menekan tombol login (submit form)
                    ->press('button[type="submit"]')
                    // Mengambil screenshot halaman setelah mencoba login
                    ->screenshot('login-check')
                    // Mengambil screenshot halaman setelah mencoba login
                    ->assertPathIs('/dashboard');
        });
    }
}