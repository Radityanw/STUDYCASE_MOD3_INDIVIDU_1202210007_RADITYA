<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesEditTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editnote
     */
    public function testNotesEdit(): void
    {
        $this->browse(function (Browser $browser) {
            // Mengunjungi halaman login
            $browser->visit('/login')
                // Mengisi input email (mengandalkan name="email")
                ->type('email', 'raditya@example.com')
                // Mengisi input password (mengandalkan name="password")
                ->type('password', 'password')
                // Menekan tombol submit untuk login
                ->press('button[type="submit"]')
                // Memastikan berhasil login dan diarahkan ke dashboard
                ->assertPathIs('/dashboard')
                // Setelah login, mengunjungi halaman daftar catatan (notes)
                ->visit('/notes')
                // Mengambil screenshot halaman notes (untuk debugging atau verifikasi visual)
                ->screenshot('notespage-check')
                // Memastikan ada elemen dengan class "div-note" di halaman (validasi bahwa note tampil)
                ->assertPresent('.div-note')
                // Mengklik tautan edit pada salah satu note, selector akan mencocokkan href yang diawali dengan "/edit-note-page/"
                ->click('a[href^="/edit-note-page/"]')
                // Mengambil screenshot form edit note
                ->screenshot('edit-note-form')
                // Mengisi ulang judul note dengan teks baru (menggunakan name="title")
                ->type('title', 'thisnoteisupdateduwu')
                // Mengisi ulang deskripsi note dengan teks baru
                ->type('description', 'UWU')
                // Menekan tombol untuk menyimpan perubahan note
                ->press('button[type="submit"]')
                // Mengambil screenshot saat submit
                ->screenshot('edit-note-check')
                // Memastikan redirect kembali ke halaman /notes setelah berhasil mengupdate
                ->assertPathIs('/notes');
        });
        
    }
}