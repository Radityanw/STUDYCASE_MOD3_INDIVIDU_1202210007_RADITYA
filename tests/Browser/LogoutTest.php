<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testlogout(): void
    {
        $this->browse(function (Browser $browser) {
            // Mengunjungi halaman login
            $browser->visit('/login')
                    // Mengisi input email (dengan name="email")
                    ->type('email', 'raditya@example.com')
                    // Mengisi input password (dengan name="password")
                    ->type('password', 'password')
                    // Menekan tombol submit untuk login
                    ->press('button[type="submit"]')
                    // Memastikan pengguna diarahkan ke halaman dashboard setelah login berhasil
                    ->assertPathIs('/dashboard')
                    // Klik tombol dropdown user manual via CSS class 
                    ->click('button[class*="inline-flex"]') 
                    // Klik link logout dari dropdown berdasarkan teks
                    ->clickLink('Log Out')
                    // Tunggu halaman logout selesai
                    ->waitForLocation('/')
                    // Verifikasi halaman login muncul lagi
                    ->assertSee('Log in');
        });
        
    }
}