<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesCreationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group Createnotes
     */
    public function testNotesCreation(): void
    {
        $this->browse(function (Browser $browser) {
            // Mengunjungi halaman login
            $browser->visit('/login')
                    // Mengisi input email dengan alamat email pengguna yang sudah terdaftar
                    ->type('#email', 'raditya@example.com')
                    // Mengisi input password dengan nilai 'password'
                    ->type('#password', 'password')
                    // Menekan tombol submit untuk login
                    ->press('button[type="submit"]')
                    // Screenshot setelah login sebagai debug
                    ->screenshot('loginfornotes-check')
                    // Memastikan pengguna berhasil login dan diarahkan ke halaman dashboard
                    ->assertPathIs('/dashboard')
                    // Mengunjungi halaman notes setelah login berhasil
                    ->visit('/notes')
                    // Mengklik tautan atau tombol menuju halaman create note
                    ->click('a[href="/create-note"]')
                    // Mengisi input judul note dengan judul notetest
                    ->type('input[name="title"]', 'notestest')
                    // Mengisi input deskripsi note dengan konten yang diinginkan
                    ->type('textarea[name="description"]', 'whatever content')
                    // Menekan tombol submit untuk menyimpan note baru
                    ->press('button[type="submit"]')
                    // Memastikan ada notifikasi atau teks yang mengindikasikan note berhasil dibuat
                    ->assertSee('new note has been created');
        });
    }
}