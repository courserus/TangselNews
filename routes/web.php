<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KontenProfilController;
use App\Http\Controllers\InformasiPublikController;
use App\Http\Controllers\EvenDanSaranController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\AlbumDanGalleryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MasterBeritaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\WalikotaController;
use App\Http\Controllers\WakilWalikotaController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\TambahMenuController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BeritaController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/profil_walikota', [KontenProfilController::class, 'profil_walikota'])->name('profil.walikota');
    Route::get('/profil_wakil_walikota', [KontenProfilController::class, 'profil_wakil_walikota'])->name('profil.wakil_walikota');
    Route::get('/lambang_daerah', [KontenProfilController::class, 'lambang_daerah'])->name('lambang.daerah');
    Route::get('/visi_misi', [KontenProfilController::class, 'visi_misi'])->name('visi.misi');
    Route::get('/sejarah_tangsel', [KontenProfilController::class, 'sejarah_tangsel'])->name('sejarah.tangsel');
    Route::get('/kontak', [KontenProfilController::class, 'kontak'])->name('kontak');

    // Berita Routes
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita'); // Halaman daftar berita
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create'); // Form untuk tambah berita
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store'); // Simpan berita baru
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit'); // Form edit berita
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update'); // Update berita
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy'); // Hapus berita


    Route::get('/SKPD', [InformasiPublikController::class, 'SKPD'])->name('SKPD');
    Route::post('/SKPD', [InformasiPublikController::class, 'SKPD'])->name('SKPD.store');

    //Route untuk SKPD
    Route::get('skpd', [SkpdController::class, 'index'])->name('skpd.index');
    Route::get('skpd/create', [SkpdController::class, 'create'])->name('skpd.create');
    Route::post('skpd', [SkpdController::class, 'store'])->name('skpd.store');
    Route::get('skpd/{skpd}', [SkpdController::class, 'show'])->name('skpd.show');
    Route::get('skpd/{skpd}/edit', [SkpdController::class, 'edit'])->name('skpd.edit');
    Route::put('skpd/{skpd}', [SkpdController::class, 'update'])->name('skpd.update');
    Route::delete('skpd/{skpd}', [SkpdController::class, 'destroy'])->name('skpd.destroy');


    Route::get('/SKPD', [InformasiPublikController::class, 'SKPD'])->name('SKPD');
    Route::get('/list_SKPD', [InformasiPublikController::class, 'list_SKPD'])->name('list_SKPD');
    
    
    Route::get('/wisata', [InformasiPublikController::class, 'wisata'])->name('wisata');
    Route::get('/kuliner', [InformasiPublikController::class, 'kuliner'])->name('kuliner');
    Route::get('/nama_pejabat', [InformasiPublikController::class, 'nama_pejabat'])->name('nama.pejabat');

    Route::get('/tambah_menu', [EvenDanSaranController::class, 'tambah_Menu'])->name('tambah_menu');
    Route::post('/menu/store', [EvenDanSaranController::class, 'storeMenu'])->name('menu.store');
    Route::get('/list_menu', [EvenDanSaranController::class, 'list_menu'])->name('list_menu');

    Route::resource('saran', SaranController::class, [
        'names' => [
            'index' => 'saran.index',
            'create' => 'saran.create',
            'store' => 'saran.store',
            'edit' => 'saran.edit',
            'update' => 'saran.update',
            'destroy' => 'saran.destroy',
        ],
        'except' => ['show'], // Jika Anda tidak membutuhkan show route
    ]);

    Route::get('/video/upload', [VideoController::class, 'index'])->name('video.upload');
    Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');

    Route::get('/master_user', [MasterUserController::class, 'master_user'])->name('master_user');
    Route::resource('master_user', MasterUserController::class, [
        'names' => [
            'index' => 'master_user.index',
            'create' => 'master_user.create',
            'store' => 'master_user.store',
            'edit' => 'master_user.edit',
            'update' => 'master_user.update',
            'destroy' => 'master_user.destroy',
        ],
        'except' => ['show'], // Jika Anda tidak membutuhkan show route
    ]);

    Route::get('/album_dan_gallery', [AlbumDanGalleryController::class, 'album_dan_gallery'])->name('album_dan_gallery');

    Route::get('/master_berita', [MasterBeritaController::class, 'master_berita'])->name('master_berita');

    Route::resource('contacts', ContactController::class, [
        'names' => [
            'index' => 'contacts.index',
            'create' => 'contacts.create',
            'store' => 'contacts.store',
            'edit' => 'contacts.edit',
            'update' => 'contacts.update',
            'destroy' => 'contacts.destroy',
        ],
        'except' => ['show'], // Jika Anda tidak membutuhkan show route
    ]);

    // Tambahkan ini di bagian akhir grup middleware 'auth'
    Route::resource('upload-image', ImageUploadController::class)->names([
        'index'   => 'uploadImage.index',
        'create'  => 'uploadImage.create',
        'store'   => 'uploadImage.store',
        'edit'    => 'uploadImage.edit',
        'update'  => 'uploadImage.update',
        'destroy' => 'uploadImage.destroy',
    ])->except(['show']); // Kecuali Anda membutuhkan metode 'show'


    // Route::get('/visi-misi', function () {
    //     return view('visi-misi'); // Sesuaikan dengan nama view Anda
    // })->name('visi.misi');
    
    Route::post('/visi-misi/store', [VisiMisiController::class, 'store'])->name('visi.misi.store');
    Route::resource('visi-misi', VisiMisiController::class, [
        'names' => [
            'index' => 'visi.misi.index',
            'create' => 'visi.misi.create',
            'store' => 'visi.misi.store',
            'edit' => 'visi.misi.edit',
            'update' => 'visi.misi.update',
            'destroy' => 'visi.misi.destroy',
        ],
        'except' => ['show'], // Jika Anda tidak membutuhkan show route
    ]);
    
    
    Route::get('/form-walikota', [WalikotaController::class, 'create'])->name('walikota.create');
    Route::post('/form-walikota', [WalikotaController::class, 'store'])->name('walikota.store');
    Route::resource('walikota', WalikotaController::class, [
        'names' => [
            'index' => 'walikota.index',
            'create' => 'walikota.create',
            'store' => 'walikota.store',
            'edit' => 'walikota.edit',
            'update' => 'walikota.update',
            'destroy' => 'walikota.destroy',
        ],
        'except' => ['show'], // Jika Anda tidak membutuhkan show route
    ]);

    Route::post('/wakil_walikota/store', [WakilWalikotaController::class, 'store'])->name('wakil_walikota.store');
    Route::resource('wakil_walikota', WakilWalikotaController::class, [
        'names' => [
            'index' => 'wakil_walikota.index',
            'create' => 'wakil_walikota.create',
            'store' => 'wakil_walikota.store',
            'edit' => 'wakil_walikota.edit',
            'update' => 'wakil_walikota.update',
            'destroy' => 'wakil_walikota.destroy',
        ],
    ]);
    

    Route::post('/sejarah/store', [SejarahController::class, 'store'])->name('sejarah.store');
    Route::resource('sejarah', SejarahController::class, [
        'names' => [
            'index' => 'sejarah.index',
            'create' => 'sejarah.create',
            'store' => 'sejarah.store',
            'edit' => 'sejarah.edit',
            'update' => 'sejarah.update',
            'destroy' => 'sejarah.destroy',
        ],
        'except' => ['show'], // Jika Anda tidak membutuhkan show route
    ]);

    Route::prefix('tambah_menu')->group(function () {
        // Route untuk menampilkan daftar menu
        Route::get('/', [TambahMenuController::class, 'index'])->name('tambah_menu.index');

        // Route untuk menampilkan form tambah menu
        Route::get('/create', [TambahMenuController::class, 'create'])->name('tambah_menu.create');

        // Route untuk menyimpan menu baru
        Route::post('/store', [TambahMenuController::class, 'store'])->name('tambah_menu.store');

        // Route untuk menampilkan form edit menu
        Route::get('/{id}/edit', [TambahMenuController::class, 'edit'])->name('tambah_menu.edit');

        // Route untuk mengupdate menu yang ada
        Route::put('/{id}', [TambahMenuController::class, 'update'])->name('tambah_menu.update');

        // Route untuk menghapus menu
        Route::delete('/{id}', [TambahMenuController::class, 'destroy'])->name('tambah_menu.destroy');
    });

    Route::get('/kuliner/create', function () {
        return view('informasi_kuliner'); // Sesuaikan dengan nama view Anda
    })->name('kuliner.create');
    Route::post('/kuliner/store', [KulinerController::class, 'store'])->name('kuliner.store');

    Route::get('/wisata/create', function () {
        return view('informasi_wisata'); // Sesuaikan dengan nama view Anda
    })->name('wisata.create');
    Route::post('/wisata/store', [WisataController::class, 'store'])->name('wisata.store');

    Route::post('/pejabat/store', [PejabatController::class, 'store'])->name('pejabat.store');

    Route::get('/album', [AlbumController::class, 'index'])->name('album.index');
    Route::get('/album/create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('/album', [AlbumController::class, 'store'])->name('album.store');
    Route::get('/album/{id}/edit', [AlbumController::class, 'edit'])->name('album.edit');
    Route::put('/album/{id}', [AlbumController::class, 'update'])->name('album.update');
    Route::delete('/album/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');


    //route untuk gallery
    Route::resource('gallery', GalleryController::class)->except(['edit', 'update', 'show']);
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
});

require __DIR__ . '/auth.php';
