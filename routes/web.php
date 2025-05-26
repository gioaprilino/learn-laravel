<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswa\MahasiswaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenpnpController;
use App\Http\Controllers\DosentiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ReportController;


Route::get('mahasiswa', action: [MahasiswaController::class, 'index']);

Route::View('hello', 'hello', ["nama"=>'randu']);

Route::post('submit', function(){
    return 'form submitted!!';
});

Route::put('update/{id}', function($id){
    return 'update data for id:' . $id;
});

Route::delete('delete/{id}', function($id){
    return 'delete data for id:' . $id;
});

Route::get('/profile', function(){
    echo '<h1>Profile</h1>';
    return '<p>Jurusan Teknologi Informasi-Politeknik Negeri Padang</p>';
});

Route::get('/mahasiswa/ti/ndui', function (){
    echo "<p style='font-size:40; color:blue'> Teknologi Informasi</p>";
    echo "<h1> selamat datang mahasiswa baru</h1>";
    echo "<hr></hr>";
    return "<p> Nama mahasiswa Aulia Randu Arini</p>";
});

//route with parameter
Route::get('mahasiswa/{nama}', function($nama){
    return '<p> Nama Mahasiswa TRPL : <b>' . $nama .'</b></p>';
});

Route::get('hitungusia/{nama}/{tahunlahir}', function($nama, $tahunlahir){
    $usia = date ('Y') - $tahunlahir;
    return "<p>Hai <b>" . $nama . " </b></br> usia kamu sekarang adalah <b>" . $usia . "</b> tahun . </p>";
});

Route::get('hitungusia/{nama?}/{tahunlahir?}', function($nama="tidak tersedia", $tahunlahir="2025"){
    $usia = date ('Y') - $tahunlahir;
    return "<p>Hai <b>" . $nama . " </b></br> usia kamu sekarang adalah <b>" . $usia . "</b> tahun . </p>";
});

//route with regular expression
Route::get('user/{id}', function($id){
    return '<p> user admin memiliki id <b>' . $id . '</b></p>';
})-> where ('id', '[0-9]+');

//route redirect
Route::redirect('public', 'hitungusia');

//route group
Route::prefix('login')->group(function(){
    route::get('mahasiswa', function(){
        return '<h2> anda login sebagai mahasiswa</h2>';
    });
    route::get('admin', function(){
        return '<h2> anda login sebagai admin</h2>';
    });
    route::get('dosen', function(){
        return '<h2> anda login sebagai dosen</h2>';
    });
});

//route fallback jika route tidak ditemukan
Route::fallback(function(){
    return "<p> Mohon Maaf, Halaman yang anda akses <b>tidak tersedia</b>";
});

Route::get(
    'listmahasiswa', function () {
        $arrMhs = [
            'aulia randu',
            'gio aprillino',
            'mahardika',
            'giovani'
        ];
        return view('akademik.mahasiswa', ['mhs'=>$arrMhs]);
    }
);

Route::get('/listmahasiswaa', function(){
    $mhs1 = "Qalbi";
    $mhs2 = "Fajar";
    $mhs3 = "Lutfi";
    return view('akademik.mahasiswalist', compact('mhs1', 'mhs2', 'mhs3'));
    }
);

Route::get(
    'nilaimahasiswa',
    function() {
        $nama = "Lutfi";
        $nim = "23012312948";
        $total_nilai = 90;
        return view('akademik.nilaimahasiswa', compact('nama', 'nim', 'total_nilai'));
    }
);

Route::get(
    'nilaimahasiswaswitch',
    function() {
        $nama = "randu";
        $nim = "23012312948";
        $total_nilai = 100;
        return view('akademik.nilaimahasiswaswitch', compact('nama', 'nim', 'total_nilai'));
    }
);

Route::get(
    'nilaimahasiswaforloop',
    function() {
        $nama = "randu";
        $nim = "23012312948";
        $total_nilai = 100;
        return view('akademik.nilaimahasiswaforloop', compact('nama', 'nim', 'total_nilai'));
    }
);

Route::get(
    'nilaimahasiswawhileloop',
    function() {
        $nama = "randu";
        $nim = "23012312948";
        $total_nilai = 98;
        return view('akademik.nilaimahasiswawhileloop', compact('nama', 'nim', 'total_nilai'));
    }
);

Route::get(
    'nilaimahasiswaforeach',
    function() {
        $nama = "randu";
        $nim = "23012312948";
        $total_nilai = [90,89,76];
        return view('akademik.nilaimahasiswaforeach', compact('nama', 'nim', 'total_nilai'));
    }
);

Route::get(
    'nilaimahasiswaforelse',
    function() {
        $nama = "randu";
        $nim = "23012312948";
        $total_nilai = [90,89,76,43];
        return view('akademik.nilaimahasiswaforelse', compact('nama', 'nim', 'total_nilai'));
    }
);

Route::get(
    'nilaimahasiswacontinue',
    function() {
        $nama = "randu";
        $nim = "23012312948";
        $total_nilai = [90,89,76,43,65,19,2];
        return view('akademik.nilaimahasiswacontinue', compact('nama', 'nim', 'total_nilai'));
    }
);

Route::get(
    'nilaimahasiswabreak',
    function() {
        $nama = "randu";
        $nim = "23012312948";
        $total_nilai = [90,89,76,43,97,78,22];
        return view('akademik.nilaimahasiswabreak', compact('nama', 'nim', 'total_nilai'));
    }
);

Route::get('/mahasiswati', function () {
    $arrMhs = ['Gio', 'Randu', 'Luthfi', 'Luthfia', 'Dina', 'Latifa', 'Hanif'];
    return view('akademik.mahasiswapnp', ['mhs' => $arrMhs]);
});

Route::get('/dosenti', function () {
    $arrDsn = ['Web Framework', 'IoT', 'Appl', 'PPKPL', 'Matematika', 'Sistim Informasi', 'Web Dasar'];
    return view('akademik.dosenpnp', ['dsn' => $arrDsn]);
});

Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan, $prodi) {
    $data =[$jurusan, $prodi];
    return view('akademik.prodi')-> with('data', $data);
})->name('prodi');


Route::get('/teknisi', [TeknisiController::class, 'index']);
Route::get('/teknisi/create', [TeknisiController::class, 'create']);
Route::post('/teknisi', [TeknisiController::class, 'store']);
Route::get('/teknisi/{id}', [TeknisiController::class, 'show']);
Route::get('/teknisi/{id}/edit', [TeknisiController::class, 'edit']);
Route::put('/teknisi/{id}', [TeknisiController::class, 'update']);
Route::delete('/teknisi/{id}', [TeknisiController::class, 'destroy']);

Route::apiResource('users', UserController::class);

// Route::apiResource('users',UserController::class);
Route::get('/insert-sql', [MahasiswaController::class,'insertSql']);
Route::get('/insert-prepared', [MahasiswaController::class,'insertPrepared']);
Route::get('/insert-binding', [MahasiswaController::class,'insertBinding']);
Route::get('/update', [MahasiswaController::class,'update']);
Route::get('/delete', [MahasiswaController::class,'delete']);
Route::get('/select', [MahasiswaController::class,'select']);
Route::get('/select-tampil', [MahasiswaController::class,'selectTampil']);
Route::get('/select-view', [MahasiswaController::class,'selectView']);
Route::get('/select-where', [MahasiswaController::class,'selectWhere']);
Route::get('/statement', [MahasiswaController::class,'statement']);


Route::get('check-objek', [DosenController::class, 'check-objek']);
Route::get('insert', [DosenController::class, 'insert']);
Route::get('mass-assigment', [DosenController::class, 'massAssignment']);
Route::get('updatedosen', [DosenController::class, 'update']);
Route::get('updatedosen-where', [DosenController::class, 'update-dosen']);
Route::get('updatedosen', [DosenController::class, 'update']);
Route::get('mass-update', [DosenController::class, 'massUpdate']);
Route::get('deletedosen', [DosenController::class,'deleteDosen']);
Route::get('destroy', [DosenController::class, 'destroyDosen']);
Route::get('mass-delete', [DosenController::class, 'massDelete']);
Route::get('all', [DosenController::class, 'all']);
Route::get('all-view', [DosenController::class, 'allView']);
Route::get('get-where', [DosenController::class, 'getWhere']);
Route::get('test-where', [DosenController::class, 'testWhere']);
Route::get('first', [DosenController::class, 'first']);
Route::get('find', [DosenController::class, 'findg']);
Route::get('latest', [DosenController::class, 'latest']);
Route::get('limit', [DosenController::class, 'limit']);
Route::get('skip-take', [DosenController::class, 'skipTake']);
Route::get('soft-delete', [DosenController::class, 'softDelete']);
Route::get('with-trash', [DosenController::class, 'withTrashed']);
Route::get('restore', [DosenController::class, 'restore']);
Route::get('force-delete', [DosenController::class, 'forceDelete']);

//query builder
Route::get('dosen', [DosenpnpController::class,'index'])->name('dosens.index');
Route::get('dosen/create', [DosenpnpController::class,'create'])->name('dosens.create');
Route::post('dosen', [DosenpnpController::class,'store'])->name('dosens.store');
Route::get('dosen/{id}/edit', [DosenpnpController::class,'edit'])->name('dosens.edit');
Route::put('dosen/{id}', [DosenpnpController::class,'update'])->name('dosens.update');
Route::delete('dosen/{id}', [DosenpnpController::class,'destroy'])->name('dosens.destroy');

//eloquent ORM
Route::get('dosenti', [DosentiController::class,'index'])->name('dosensti.index');
Route::get('dosenti/create', [DosentiController::class,'create'])->name('dosensti.create');
Route::post('dosenti', [DosentiController::class,'store'])->name('dosensti.store');
Route::get('dosenti/{id}/edit', [DosentiController::class,'edit'])->name('dosensti.edit');
Route::put('dosenti/{id}', [DosentiController::class,'update'])->name('dosensti.update');
Route::delete('dosenti/{id}', [DosentiController::class,'destroy'])->name('dosensti.destroy');

// Route::get('pengguna/create', [PenggunaController::class, 'create'])->name('penggunas.create');
// Route::post('pengguna', [PenggunaController::class, 'store'])->name('penggunas.store');
// Route::get('pengguna', [PenggunaController::class, 'index'])->name('penggunas.index');
// Route::get('pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('penggunas.edit');
// Route::put('pengguna/{id}', [PenggunaController::class, 'update'])->name('penggunas.update');
// Route::delete('pengguna/{id}', [PenggunaController::class, 'destroy'])->name('penggunas.destroy');


Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::resource('penggunas', PenggunaController::class);
        Route::resource('books', BookController::class);
        Route::resource('sales', SaleController::class);
        Route::get('/publishing-reports', [ReportController::class, 'publishingIndex'])->name('publishing.reports.index');
        Route::get('/sales-reports', [ReportController::class, 'salesIndex'])->name('sales.reports.index');
        Route::get('/laporan/penerbitan/pdf', [ReportController::class, 'exportPenerbitanPdf'])->name('laporan.penerbitan.pdf');
        Route::get('/laporan/penjualan/pdf', [ReportController::class, 'exportPenjualanPdf'])->name('laporan.penjualan.pdf');


Route::get('/laporan/penerbitan/excel', [ReportController::class, 'exportPenerbitanExcel'])->name('laporan.penerbitan.excel');
Route::get('/laporan/penjualan/excel', [ReportController::class, 'exportPenjualanExcel'])->name('laporan.penjualan.excel');
    });
});

Route::middleware('auth')->group(function () {
    Route::resource('penggunas', PenggunaController::class);
});

require __DIR__.'/auth.php';
