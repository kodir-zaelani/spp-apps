<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('root');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    // Dashboard
    Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend.dashboard');

    // User
    Route::get('backend/users/index', [App\Http\Controllers\Backend\UserController::class, 'index'])->name('backend.users.index');
    Route::get('backend/users/create', [App\Http\Controllers\Backend\UserController::class, 'create'])->name('backend.users.create');
    Route::post('backend/users/store', [App\Http\Controllers\Backend\UserController::class, 'store'])->name('backend.users.store');
    Route::get('backend/users/{user}/edit', [App\Http\Controllers\Backend\UserController::class, 'edit'])->name('backend.users.edit');
    Route::put('backend/users/{user}/update', [App\Http\Controllers\Backend\UserController::class, 'update'])->name('backend.users.update');
    Route::get('backend/users/profile', [App\Http\Controllers\Backend\UserController::class, 'userprofile'])->name('backend.userprofile');


    // Setting Web
    Route::get('backend/settings', [App\Http\Controllers\Backend\SettingController::class, 'setting'])->name('backend.settings.index');
    Route::post('backend/settings/create', [App\Http\Controllers\Backend\SettingController::class, 'createsetting'])->name('backend.settings.create');
    Route::post('backend/settings/store', [App\Http\Controllers\Backend\SettingController::class, 'storesetting'])->name('backend.settings.store');
    Route::get('backend/settings/{setting}/edit', [App\Http\Controllers\Backend\SettingController::class, 'editsetting'])->name('backend.settings.edit');
    Route::put('backend/settings/{setting}/update', [App\Http\Controllers\Backend\SettingController::class, 'updatesetting'])->name('backend.settings.update');

    // Yayasan
    Route::get('backend/yayasan', [App\Http\Controllers\Backend\YayasanController::class, 'index'])->name('backend.yayasan.index');
    Route::post('backend/yayasan/create', [App\Http\Controllers\Backend\YayasanController::class, 'create'])->name('backend.yayasan.create');
    Route::post('backend/yayasan/store', [App\Http\Controllers\Backend\YayasanController::class, 'store'])->name('backend.yayasan.store');
    Route::get('backend/yayasan/{yayasan}/edit', [App\Http\Controllers\Backend\YayasanController::class, 'edit'])->name('backend.yayasan.edit');
    Route::put('backend/yayasan/{yayasan}/update', [App\Http\Controllers\Backend\YayasanController::class, 'update'])->name('backend.yayasan.update');
    Route::put('backend/yayasan/{yayasan}/updatelogo', [App\Http\Controllers\Backend\YayasanController::class, 'updatelogo'])->name('backend.yayasan.updatelogo');
    Route::get('backend/yayasan/export', [App\Http\Controllers\Backend\YayasanController::class, 'export'])->name('backend.yayasan.export');
    Route::post('backend/yayasan/import', [App\Http\Controllers\Backend\YayasanController::class, 'import'])->name('backend.yayasan.import');

    // Sekolah
    Route::get('backend/sekolah', [App\Http\Controllers\Backend\SekolahController::class, 'index'])->name('backend.sekolah.index');
    Route::post('backend/sekolah/create', [App\Http\Controllers\Backend\SekolahController::class, 'create'])->name('backend.sekolah.create');
    Route::post('backend/sekolah/store', [App\Http\Controllers\Backend\SekolahController::class, 'store'])->name('backend.sekolah.store');
    Route::get('backend/sekolah/{setting}/edit', [App\Http\Controllers\Backend\SekolahController::class, 'edit'])->name('backend.sekolah.edit');
    Route::put('backend/sekolah/{setting}/update', [App\Http\Controllers\Backend\SekolahController::class, 'update'])->name('backend.sekolah.update');
    Route::post('backend/sekolah/import', [App\Http\Controllers\Backend\SekolahController::class, 'import'])->name('backend.sekolah.import');

    // Permission
    Route::get('backend/permissions/index', [App\Http\Controllers\Backend\PermissionController::class, 'index'])->name('backend.permissions.index');

    // Role
    Route::get('backend/roles/index', [App\Http\Controllers\Backend\RoleController::class, 'index'])->name('backend.roles.index');
    Route::get('backend/roles/create', [App\Http\Controllers\Backend\RoleController::class, 'create'])->name('backend.roles.create');
    Route::post('backend/roles/store', [App\Http\Controllers\Backend\RoleController::class, 'store'])->name('backend.roles.store');
    Route::get('backend/roles/{role}/edit', [App\Http\Controllers\Backend\RoleController::class, 'edit'])->name('backend.roles.edit');
    Route::put('backend/roles/{role}/update', [App\Http\Controllers\Backend\RoleController::class, 'update'])->name('backend.roles.update');

    // Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    // Wilayah Indonesia
    Route::get('backend/indonesia', [App\Http\Controllers\Backend\WilayahController::class, 'index'])->name('backend.wilayah.index');

    // Agama
    Route::get('backend/agama', [App\Http\Controllers\Backend\AgamaController::class, 'index'])->name('backend.agama.index');

    // Bentuk Pendidikan
    Route::get('backend/bentukpendidikan', [App\Http\Controllers\Backend\BentukpendidikanController::class, 'index'])->name('backend.bentukpendidikan.index');

    // Jenjang Pendidikan
    Route::get('backend/jenjangpendidikan', [App\Http\Controllers\Backend\JenjangpendidikanController::class, 'index'])->name('backend.jenjangpendidikan.index');

    // Tingkat Pendidikan
    Route::get('backend/tingkatpendidikan', [App\Http\Controllers\Backend\TingkatpendidikanController::class, 'index'])->name('backend.tingkatpendidikan.index');

    // Status Kepemilikan
    Route::get('backend/statuskepemilikan', [App\Http\Controllers\Backend\StatuskepemilikanController::class, 'index'])->name('backend.statuskepemilikan.index');

    // Kebutuhan Khusus
    Route::get('backend/kebutuhankhusus', [App\Http\Controllers\Backend\KebutuhankhususController::class, 'index'])->name('backend.kebutuhankhusus.index');

    // Akreditasi
    Route::get('backend/akreditasi', [App\Http\Controllers\Backend\AkreditasiController::class, 'index'])->name('backend.akreditasi.index');

    // Jenis Rombel
    Route::get('backend/jenisrombel', [App\Http\Controllers\Backend\JenisrombelController::class, 'index'])->name('backend.jenisrombel.index');

    // Jenis PTK
    Route::get('backend/jenisptk', [App\Http\Controllers\Backend\JenisptkController::class, 'index'])->name('backend.jenisptk.index');

    // Jurusan
    Route::get('backend/jurusan', [App\Http\Controllers\Backend\JurusanController::class, 'index'])->name('backend.jurusan.index');

    // Kurikulum Controller
    Route::get('backend/kurikulum', [App\Http\Controllers\Backend\KurikulumController::class, 'index'])->name('backend.kurikulum.index');

    // Matapelajaran Controller
    Route::get('backend/matapelajaran', [App\Http\Controllers\Backend\MatapelajaranController::class, 'index'])->name('backend.matapelajaran.index');

    // Tahun ajaran Controller
    Route::get('backend/tahunajaran', [App\Http\Controllers\Backend\TahunajaranController::class, 'index'])->name('backend.tahunajaran.index');

    // SemesterController
    Route::get('backend/semester', [App\Http\Controllers\Backend\SemesterController::class, 'index'])->name('backend.semester.index');


});