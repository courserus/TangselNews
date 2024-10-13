<?php

use App\Http\Controllers\{
    ProfileController,
    KontenProfilController,
    InformasiPublikController,
    EvenDanSaranController,
    MenuController,
    VideoController,
    MasterUserController,
    AlbumDanGalleryController,
    Auth\LoginController,
    MasterBeritaController,
    ContactController,
    ImageUploadController,
    VisiMisiController,
    WalikotaController,
    WakilWalikotaController,
    SejarahController,
    KulinerController,
    WisataController,
    PejabatController,
    SkpdController,
    TambahMenuController,
    SaranController,
    AlbumController,
    GalleryController,
    BeritaController
};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::resource('profile', ProfileController::class)->except(['index', 'create', 'show']);
    
    // Custom logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Konten Profil Routes
    Route::get('/profil_walikota', [KontenProfilController::class, 'profil_walikota'])->name('profil.walikota');
    Route::get('/profil_wakil_walikota', [KontenProfilController::class, 'profil_wakil_walikota'])->name('profil.wakil_walikota');
    Route::get('/lambang_daerah', [KontenProfilController::class, 'lambang_daerah'])->name('lambang.daerah');
    Route::get('/visi_misi', [KontenProfilController::class, 'visi_misi'])->name('visi.misi');
    Route::get('/sejarah_tangsel', [KontenProfilController::class, 'sejarah_tangsel'])->name('sejarah.tangsel');
    Route::get('/kontak', [KontenProfilController::class, 'kontak'])->name('kontak');

    // Berita Routes
    Route::resource('berita', BeritaController::class)->except(['show']);

    // SKPD Routes
    Route::resource('skpd', SkpdController::class);

    // Wisata & Kuliner Routes
    Route::get('/wisata', [InformasiPublikController::class, 'wisata'])->name('wisata');
    Route::get('/kuliner', [InformasiPublikController::class, 'kuliner'])->name('kuliner');
    Route::post('/kuliner/store', [KulinerController::class, 'store'])->name('kuliner.store');
    Route::post('/wisata/store', [WisataController::class, 'store'])->name('wisata.store');

    // Saran Routes
    Route::resource('saran', SaranController::class)->except(['show']);

    // Tambah Menu Routes
    Route::prefix('tambah_menu')->group(function () {
        Route::get('/', [TambahMenuController::class, 'index'])->name('tambah_menu.index');
        Route::get('/create', [TambahMenuController::class, 'create'])->name('tambah_menu.create');
        Route::post('/store', [TambahMenuController::class, 'store'])->name('tambah_menu.store');
        Route::get('/{id}/edit', [TambahMenuController::class, 'edit'])->name('tambah_menu.edit');
        Route::put('/{id}', [TambahMenuController::class, 'update'])->name('tambah_menu.update');
        Route::delete('/{id}', [TambahMenuController::class, 'destroy'])->name('tambah_menu.destroy');
    });

    // Album and Gallery Routes
    Route::resource('album', AlbumController::class);
    Route::resource('gallery', GalleryController::class)->except(['edit', 'update', 'show']);

    // Master User and Contacts Routes
    Route::resource('master_user', MasterUserController::class)->except(['show']);
    Route::resource('contacts', ContactController::class)->except(['show']);

    // Video Upload Routes
    Route::get('/video/upload', [VideoController::class, 'index'])->name('video.upload');
    Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');

    // Sejarah, Visi & Misi, Walikota, Wakil Walikota Routes
    Route::resource('sejarah', SejarahController::class)->except(['show']);
    Route::resource('visi-misi', VisiMisiController::class)->except(['show']);
    Route::resource('walikota', WalikotaController::class)->except(['show']);
    Route::resource('wakil_walikota', WakilWalikotaController::class);

    // Image Upload Routes
    Route::resource('upload-image', ImageUploadController::class)->except(['show']);
});

require __DIR__ . '/auth.php';
