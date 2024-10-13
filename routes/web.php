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
<<<<<<< HEAD

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
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GalleryController;

=======
>>>>>>> d22dad2979bfd7a5f1bc12b391be6771ac9aea46
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

<<<<<<< HEAD
    Route::get('/SKPD', [InformasiPublikController::class, 'SKPD'])->name('SKPD');
    Route::get('/list_SKPD', [InformasiPublikController::class, 'list_SKPD'])->name('list_SKPD');
    Route::get('/wisata', [InformasiPublikController::class, 'wisata'])->name('wisata');
    Route::get('/kuliner', [InformasiPublikController::class, 'kuliner'])->name('kuliner');
    Route::get('/nama_pejabat', [InformasiPublikController::class, 'nama_pejabat'])->name('nama.pejabat');


    Route::resource('skpd', SkpdController::class, [
        'names' => [
            'index' => 'skpd.index',
            'create' => 'skpd.create',
            'store' => 'skpd.store',
            'edit' => 'skpd.edit',
            'update' => 'skpd.update',
            'destroy' => 'skpd.destroy',
            'show' => 'skpd.show', // Tambahkan ini
        ],
    ]);
    


    Route::get('/tambah_menu', [EvenDanSaranController::class, 'tambah_Menu'])->name('tambah_menu');
    Route::post('/menu/store', [EvenDanSaranController::class, 'storeMenu'])->name('menu.store');
    Route::get('/list_menu', [EvenDanSaranController::class, 'list_menu'])->name('list_menu');

    Route::get('/saran', [EvenDanSaranController::class, 'saran'])->name('saran');

    Route::get('/upload', [VideoController::class, 'index'])->name('video.upload');
    Route::post('/upload/video', [VideoController::class, 'store'])->name('video.store');

    Route::get('/master_user', [MasterUserController::class, 'master_user'])->name('master_user');
    Route::get('master-user', [MasterUserController::class, 'index'])->name('master_user.index');
    Route::get('master-user/create', [MasterUserController::class, 'create'])->name('master_user.create');
    Route::post('master-user', [MasterUserController::class, 'store'])->name('master_user.store');
    Route::get('master-user/{user}', [MasterUserController::class, 'show'])->name('master_user.show');
    Route::get('master-user/{user}/edit', [MasterUserController::class, 'edit'])->name('master_user.edit');
    Route::put('master-user/{user}', [MasterUserController::class, 'update'])->name('master_user.update');
    Route::delete('master-user/{user}', [MasterUserController::class, 'destroy'])->name('master_user.destroy');

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
    ]);

    Route::get('/album', [AlbumController::class, 'index'])->name('album.index');
    Route::get('/album/create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('/album', [AlbumController::class, 'store'])->name('album.store');
    Route::get('/album/{id}/edit', [AlbumController::class, 'edit'])->name('album.edit');
    Route::put('/album/{id}', [AlbumController::class, 'update'])->name('album.update');
    Route::delete('/album/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');

    Route::resource('gallery', GalleryController::class)->except(['edit', 'update', 'show']);
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');

    Route::get('/kuliner', [InformasiPublikController::class, 'kuliner'])->name('kuliner');
    Route::get('/kuliner/create', function () {
        return view('informasi_kuliner'); // Sesuaikan dengan nama view Anda
    })->name('kuliner.create');
    Route::post('/kuliner/store', [KulinerController::class, 'store'])->name('kuliner.store');

    Route::get('/wisata', [InformasiPublikController::class, 'wisata'])->name('wisata');
    Route::get('/wisata/create', function () {
        return view('informasi_wisata'); // Sesuaikan dengan nama view Anda
    })->name('wisata.create');
=======
    // SKPD Routes
    Route::resource('skpd', SkpdController::class);

    // Wisata & Kuliner Routes
    Route::get('/wisata', [InformasiPublikController::class, 'wisata'])->name('wisata');
    Route::get('/kuliner', [InformasiPublikController::class, 'kuliner'])->name('kuliner');
    Route::post('/kuliner/store', [KulinerController::class, 'store'])->name('kuliner.store');
>>>>>>> d22dad2979bfd7a5f1bc12b391be6771ac9aea46
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
