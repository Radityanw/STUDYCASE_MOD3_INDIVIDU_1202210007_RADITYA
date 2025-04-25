<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesViewTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group Viewnote
     */
    public function testViewNotes(): void
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
                // Memastikan user diarahkan ke halaman dashboard setelah login berhasil
                ->assertPathIs('/dashboard')
                // Mengunjungi halaman daftar catatan (notes)
                ->visit('/notes')
                // Mengambil screenshot halaman notes list
                ->screenshot('noteslist-check')
                // Memastikan elemen catatan (note) dengan class .div-note ada di halaman
                ->assertPresent('.div-note')
                // Mengklik link detail dari salah satu catatan
                ->click('.div-note a[dusk^="detail-"]')
                // Memastikan path URL setelah klik mengandung "/note/"
                ->assertPathContains('/note/')
                // Memastikan halaman detail catatan juga memiliki elemen .div-note (menampilkan kontennya)
                ->assertPresent('.div-note')
                // Mengambil screenshot halaman detail catatan
                ->screenshot('view-note-details');
        });
        
    }
}