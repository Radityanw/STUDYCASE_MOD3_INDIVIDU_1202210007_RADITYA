<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesDeletionTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group deletenote
     */
    public function testnotesdeletion(): void
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
                // Mengunjungi halaman daftar notes
                ->visit('/notes')
                // Mengambil screenshot sebelum proses delete dilakukan
                ->screenshot('predelete-check')
                // Mengklik tombol delete yang memiliki ID diawali dengan 'delete-'
                ->click('button[id^="delete-"]')
                // Memastikan setelah delete, tetap berada di halaman /notes
                ->assertPathIs('/notes');
        });
        
    }
}