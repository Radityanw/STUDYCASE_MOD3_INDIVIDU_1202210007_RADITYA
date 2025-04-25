<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group registration
     */
    public function testRegistration(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Kunjungi halaman utama ('/')  
                    ->assertSee('Modul 3') // Verifikasi bahwa halaman mengandung teks 'Modul 3'
                    ->clickLink('Register') // Klik link dengan teks 'Register'
                    ->assertPathIs('/register') // Pastikan browser berada di halaman '/register'
                    ->type('#name', 'Raditya') // Isi input dengan ID 'name' dengan nilai 'Test User'
                    ->type('#email', 'raditya@example.com') // Isi input dengan ID 'email' dengan email unik berdasarkan waktu saat ini
                    ->type('#password', 'password') // Isi input dengan ID 'password' dengan password 'password'
                    ->type('#password_confirmation', 'password') // Isi input konfirmasi password dengan nilai 'password'
                    ->press('button[type="submit"]') // Tekan tombol submit (button dengan type submit)
                    ->assertPathIs('/dashboard') // Setelah submit berhasil, pastikan diarahkan ke halaman '/dashboard'
                    ->screenshot('registration-success'); // Ambil screenshot halaman setelah registrasi berhasil
        });
    }
}