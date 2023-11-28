<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\TrainingclassController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\MobileController;
use App\Http\Controllers\Admin\AiSoftwarController;
use App\Http\Controllers\Admin\UiuxController;
use App\Http\Controllers\Admin\CodekidzController;
use App\Http\Controllers\Admin\DesktopSoftwareController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller('/app/tes', [TesController::class, 'index']);
Route::get('/app', [TesController::class, 'app'])->name('guru.app');


Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(
    ['middleware' => ['auth']],
    function () {
    Route::get('/alsav/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');
    Route::get('/alsav/edutech/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    Route::get('/alsav/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/alsav/dashboard/desktop-software', [GuruController::class, 'desktop'])->name('guru.desktop');
    Route::get('/alsav/dashboard/desktop-software/{productID}', [GuruController::class, 'sow'])->name('guru.sow');
    Route::get('/alsav/edutech/dashboard/desktop-software', [SiswaController::class, 'desktop'])->name('siswa.desktop');
    Route::get('/alsav/edutech/dashboard/desktop-software/{productID}', [SiswaController::class, 'sow'])->name('siswa.sow');
    


    Route::get('/admin/desktop-software/industrial-class', [TrainingController::class, 'index'])->name('admin.index');
    Route::get('/admin/desktop-software/teacher', [TrainingController::class, 'index2'])->name('admin.index2');
    Route::get('/admin/trainings/create', [TrainingController::class, 'create'])->name('admin.create');
    Route::get('/admin/trainings/create2', [TrainingController::class, 'create2'])->name('admin.create2');
    Route::post('admin/trainings/add', [TrainingController::class, 'store'])->name('admin.add');
    Route::post('admin/trainings/add2', [TrainingController::class, 'store2'])->name('admin.add2');
    Route::get('admin/trainings/{productID}/edit', [TrainingController::class, 'edit'])->name('admin.edit');
    Route::get('admin/trainings/{productID}/edit2', [TrainingController::class, 'edit2'])->name('admin.edit2');
    Route::PUT('admin/trainings/{productID}', [TrainingController::class, 'update'])->name('admin.update');
    Route::PUT('admin/trainings2/{productID}', [TrainingController::class, 'update2'])->name('admin.update2');
    Route::delete('admin/trainings/{productID}', [TrainingController::class, 'destroy'])->name('admin.destroy');
    Route::delete('admin/trainings2/{productID}', [TrainingController::class, 'destroy2'])->name('admin.destroy2');
    
    Route::get('/admin/trainings/materi/{productID}', [MateriController::class, 'index'])->name('materi.create');
    Route::get('/admin/trainings/materi-tc/{productID}', [MateriController::class, 'index2'])->name('materi.create2');
    Route::get('/admin/trainings/materi/create/{productID}', [MateriController::class, 'create'])->name('materi.create');
    Route::get('/admin/trainings/materi/create2/{productID}', [MateriController::class, 'create2'])->name('materi.create2');
    Route::post('admin/trainings/materi/add/{productID}', [MateriController::class, 'store'])->name('materi.add');
    Route::post('admin/trainings/materi/add2/{productID}', [MateriController::class, 'store2'])->name('materi.add2');
    Route::get('admin/trainings/materi/{productID}/edit', [MateriController::class, 'edit'])->name('materi.edit');
    Route::get('admin/trainings/materi/{productID}/edit2', [MateriController::class, 'edit2'])->name('materi.edit2');
    Route::PUT('admin/trainings/materi/{productID}', [MateriController::class, 'update'])->name('materi.update');
    Route::PUT('admin/trainings2/materi/{productID}', [MateriController::class, 'update2'])->name('materi.update2');
    Route::delete('admin/trainings/materi/{productID}', [MateriController::class, 'destroy'])->name('materi.destroy');
    Route::delete('admin/trainings2/materi/{productID}', [MateriController::class, 'destroy2'])->name('materi.destroy2');
    
    Route::get('/admin/trainings/materi/video/{productID}', [MateriController::class, 'video'])->name('materi_video.create');
    Route::get('/admin/trainings/materi-tc/video/{productID}', [MateriController::class, 'video2'])->name('materi_video.create2');
    Route::get('/admin/trainings/materi/create/video/{productID}', [MateriController::class, 'video_create'])->name('video_materi.create');
    Route::get('/admin/trainings/materi/create2/video/{productID}', [MateriController::class, 'video_create2'])->name('video_materi.create2');
    Route::post('admin/trainings/materi/add/video/{productID}', [MateriController::class, 'video_store'])->name('video_materi.add');
    Route::post('admin/trainings/materi/add2/video/{productID}', [MateriController::class, 'video_store2'])->name('video_materi.add2');
    Route::get('admin/trainings/materi/video/{productID}/edit', [MateriController::class, 'video_edit'])->name('video_materi.edit');
    Route::get('admin/trainings/materi/video/{productID}/edit2', [MateriController::class, 'video_edit2'])->name('video_materi.edit2');
    Route::PUT('admin/trainings/materi/video/{productID}', [MateriController::class, 'video_update'])->name('video_materi.update');
    Route::PUT('admin/trainings2/materi/video/{productID}', [MateriController::class, 'video_update2'])->name('video_materi.update2');
    Route::delete('admin/trainings/materi/video/{productID}', [MateriController::class, 'video_destroy'])->name('video_materi.destroy');
    Route::delete('admin/trainings2/materi/video/{productID}', [MateriController::class, 'video_destroy2'])->name('video_materi.destroy2');

    Route::get('/admin/website', [WebsiteController::class, 'index'])->name('admin.website.index');
    Route::get('/admin/website/create', [WebsiteController::class, 'create'])->name('admin.website.create');
    Route::post('admin/website/add', [WebsiteController::class, 'store'])->name('admin.website.add');
    Route::get('admin/website/{productID}/edit', [WebsiteController::class, 'edit'])->name('admin.website.edit');
    Route::PUT('admin/website/{productID}', [WebsiteController::class, 'update'])->name('admin.website.update');
    Route::delete('admin/website/{productID}', [WebsiteController::class, 'destroy'])->name('admin.website.destroy');
    
    Route::get('/admin/website/materi/{productID}', [WebsiteController::class, 'materi_index'])->name('website.materi.create');
    Route::get('/admin/website/materi/create/{productID}', [WebsiteController::class, 'materi_create'])->name('website.materi.create');
    Route::post('admin/website/materi/add/{productID}', [WebsiteController::class, 'materi_store'])->name('website.materi.add');
    Route::get('admin/website/materi/{productID}/edit', [WebsiteController::class, 'materi_edit'])->name('website.materi.edit');
    Route::PUT('admin/website/materi/{productID}', [WebsiteController::class, 'materi_update'])->name('website.materi.update');
    Route::delete('admin/website/materi/{productID}', [WebsiteController::class, 'materi_destroy'])->name('website.materi.destroy');
   
    Route::get('/admin/website/materi/video/{productID}', [WebsiteController::class, 'video'])->name('website.materi_video.create');
    Route::get('/admin/website/materi/create/video/{productID}', [WebsiteController::class, 'video_create'])->name('website.video_materi.create');
    Route::post('admin/website/materi/add/video/{productID}', [WebsiteController::class, 'video_store'])->name('website.video_materi.add');
    Route::get('admin/website/materi/video/{productID}/edit', [WebsiteController::class, 'video_edit'])->name('website.video_materi.edit');
    Route::PUT('admin/website/materi/video/{productID}', [WebsiteController::class, 'video_update'])->name('website.video_materi.update');
    Route::delete('admin/website/materi/video/{productID}', [WebsiteController::class, 'video_destroy'])->name('website.video_materi.destroy');

    // pemisah
    Route::get('/admin/codekidz', [CodekidzController::class, 'index'])->name('admin.codekidz.index');
    Route::get('/admin/codekidz/create', [CodekidzController::class, 'create'])->name('admin.codekidz.create');
    Route::post('admin/codekidz/add', [CodekidzController::class, 'store'])->name('admin.codekidz.add');
    Route::get('admin/codekidz/{productID}/edit', [CodekidzController::class, 'edit'])->name('admin.codekidz.edit');
    Route::PUT('admin/codekidz/{productID}', [CodekidzController::class, 'update'])->name('admin.codekidz.update');
    Route::delete('admin/codekidz/{productID}', [CodekidzController::class, 'destroy'])->name('admin.codekidz.destroy');
    
    Route::get('/admin/codekidz/materi/{productID}', [CodekidzController::class, 'materi_index'])->name('codekidz.materi.create');
    Route::get('/admin/codekidz/materi/create/{productID}', [CodekidzController::class, 'materi_create'])->name('codekidz.materi.create');
    Route::post('admin/codekidz/materi/add/{productID}', [CodekidzController::class, 'materi_store'])->name('codekidz.materi.add');
    Route::get('admin/codekidz/materi/{productID}/edit', [CodekidzController::class, 'materi_edit'])->name('codekidz.materi.edit');
    Route::PUT('admin/codekidz/materi/{productID}', [CodekidzController::class, 'materi_update'])->name('codekidz.materi.update');
    Route::delete('admin/codekidz/materi/{productID}', [CodekidzController::class, 'materi_destroy'])->name('codekidz.materi.destroy');
   
    Route::get('/admin/codekidz/materi/video/{productID}', [CodekidzController::class, 'video'])->name('codekidz.materi_video.create');
    Route::get('/admin/codekidz/materi/create/video/{productID}', [CodekidzController::class, 'video_create'])->name('codekidz.video_materi.create');
    Route::post('admin/codekidz/materi/add/video/{productID}', [CodekidzController::class, 'video_store'])->name('codekidz.video_materi.add');
    Route::get('admin/codekidz/materi/video/{productID}/edit', [CodekidzController::class, 'video_edit'])->name('codekidz.video_materi.edit');
    Route::PUT('admin/codekidz/materi/video/{productID}', [CodekidzController::class, 'video_update'])->name('codekidz.video_materi.update');
    Route::delete('admin/codekidz/materi/video/{productID}', [CodekidzController::class, 'video_destroy'])->name('codekidz.video_materi.destroy');
    // pemisah
    Route::get('/admin/mobile', [MobileController::class, 'index'])->name('admin.mobile.index');
    Route::get('/admin/mobile/create', [MobileController::class, 'create'])->name('admin.mobile.create');
    Route::post('admin/mobile/add', [MobileController::class, 'store'])->name('admin.mobile.add');
    Route::get('admin/mobile/{productID}/edit', [MobileController::class, 'edit'])->name('admin.mobile.edit');
    Route::PUT('admin/mobile/{productID}', [MobileController::class, 'update'])->name('admin.mobile.update');
    Route::delete('admin/mobile/{productID}', [MobileController::class, 'destroy'])->name('admin.mobile.destroy');
    
    Route::get('/admin/mobile/materi/{productID}', [MobileController::class, 'materi_index'])->name('mobile.materi.create');
    Route::get('/admin/mobile/materi/create/{productID}', [MobileController::class, 'materi_create'])->name('mobile.materi.create');
    Route::post('admin/mobile/materi/add/{productID}', [MobileController::class, 'materi_store'])->name('mobile.materi.add');
    Route::get('admin/mobile/materi/{productID}/edit', [MobileController::class, 'materi_edit'])->name('mobile.materi.edit');
    Route::PUT('admin/mobile/materi/{productID}', [MobileController::class, 'materi_update'])->name('mobile.materi.update');
    Route::delete('admin/mobile/materi/{productID}', [MobileController::class, 'materi_destroy'])->name('mobile.materi.destroy');
   
    Route::get('/admin/mobile/materi/video/{productID}', [MobileController::class, 'video'])->name('mobile.materi_video.create');
    Route::get('/admin/mobile/materi/create/video/{productID}', [MobileController::class, 'video_create'])->name('mobile.video_materi.create');
    Route::post('admin/mobile/materi/add/video/{productID}', [MobileController::class, 'video_store'])->name('mobile.video_materi.add');
    Route::get('admin/mobile/materi/video/{productID}/edit', [MobileController::class, 'video_edit'])->name('mobile.video_materi.edit');
    Route::PUT('admin/mobile/materi/video/{productID}', [MobileController::class, 'video_update'])->name('mobile.video_materi.update');
    Route::delete('admin/mobile/materi/video/{productID}', [MobileController::class, 'video_destroy'])->name('mobile.video_materi.destroy');
     // pemisah
     Route::get('/admin/ui_ux', [UiuxController::class, 'index'])->name('admin.ui_ux.index');
     Route::get('/admin/ui_ux/create', [UiuxController::class, 'create'])->name('admin.ui_ux.create');
     Route::post('admin/ui_ux/add', [UiuxController::class, 'store'])->name('admin.ui_ux.add');
     Route::get('admin/ui_ux/{productID}/edit', [UiuxController::class, 'edit'])->name('admin.ui_ux.edit');
     Route::PUT('admin/ui_ux/{productID}', [UiuxController::class, 'update'])->name('admin.ui_ux.update');
     Route::delete('admin/ui_ux/{productID}', [UiuxController::class, 'destroy'])->name('admin.ui_ux.destroy');
     
     Route::get('/admin/ui_ux/materi/{productID}', [UiuxController::class, 'materi_index'])->name('mobile.ui_ux.create');
     Route::get('/admin/ui_ux/materi/create/{productID}', [UiuxController::class, 'materi_create'])->name('ui_ux.materi.create');
     Route::post('admin/ui_ux/materi/add/{productID}', [UiuxController::class, 'materi_store'])->name('ui_ux.materi.add');
     Route::get('admin/ui_ux/materi/{productID}/edit', [UiuxController::class, 'materi_edit'])->name('ui_ux.materi.edit');
     Route::PUT('admin/ui_ux/materi/{productID}', [UiuxController::class, 'materi_update'])->name('ui_ux.materi.update');
     Route::delete('admin/ui_ux/materi/{productID}', [UiuxController::class, 'materi_destroy'])->name('ui_ux.materi.destroy');
    
     Route::get('/admin/ui_ux/materi/video/{productID}', [UiuxController::class, 'video'])->name('ui_ux.materi_video.create');
     Route::get('/admin/ui_ux/materi/create/video/{productID}', [UiuxController::class, 'video_create'])->name('ui_ux.video_materi.create');
     Route::post('admin/ui_ux/materi/add/video/{productID}', [UiuxController::class, 'video_store'])->name('ui_ux.video_materi.add');
     Route::get('admin/ui_ux/materi/video/{productID}/edit', [UiuxController::class, 'video_edit'])->name('ui_ux.video_materi.edit');
     Route::PUT('admin/ui_ux/materi/video/{productID}', [UiuxController::class, 'video_update'])->name('ui_ux.video_materi.update');
     Route::delete('admin/ui_ux/materi/video/{productID}', [UiuxController::class, 'video_destroy'])->name('ui_ux.video_materi.destroy');
     // pemisah
     Route::get('/admin/ai_softwar', [AiSoftwarController::class, 'index'])->name('admin.ai_softwar.index');
     Route::get('/admin/ai_softwar/create', [AiSoftwarController::class, 'create'])->name('admin.ai_softwar.create');
     Route::post('admin/ai_softwar/add', [AiSoftwarController::class, 'store'])->name('admin.ai_softwar.add');
     Route::get('admin/ai_softwar/{productID}/edit', [AiSoftwarController::class, 'edit'])->name('admin.ai_softwar.edit');
     Route::PUT('admin/ai_softwar/{productID}', [AiSoftwarController::class, 'update'])->name('admin.ai_softwar.update');
     Route::delete('admin/ai_softwar/{productID}', [AiSoftwarController::class, 'destroy'])->name('admin.ai_softwar.destroy');
     
     Route::get('/admin/ai_softwar/materi/{productID}', [AiSoftwarController::class, 'materi_index'])->name('ai_softwar.materi.create');
     Route::get('/admin/ai_softwar/materi/create/{productID}', [AiSoftwarController::class, 'materi_create'])->name('ai_softwar.materi.create');
     Route::post('admin/ai_softwar/materi/add/{productID}', [AiSoftwarController::class, 'materi_store'])->name('ai_softwar.materi.add');
     Route::get('admin/ai_softwar/materi/{productID}/edit', [AiSoftwarController::class, 'materi_edit'])->name('ai_softwar.materi.edit');
     Route::PUT('admin/ai_softwar/materi/{productID}', [AiSoftwarController::class, 'materi_update'])->name('ai_softwar.materi.update');
     Route::delete('admin/ai_softwar/materi/{productID}', [AiSoftwarController::class, 'materi_destroy'])->name('ai_softwar.materi.destroy');
    
     Route::get('/admin/ai_softwar/materi/video/{productID}', [AiSoftwarController::class, 'video'])->name('ai_softwar.materi_video.create');
     Route::get('/admin/ai_softwar/materi/create/video/{productID}', [AiSoftwarController::class, 'video_create'])->name('ai_softwar.video_materi.create');
     Route::post('admin/ai_softwar/materi/add/video/{productID}', [AiSoftwarController::class, 'video_store'])->name('ai_softwar.video_materi.add');
     Route::get('admin/ai_softwar/materi/video/{productID}/edit', [AiSoftwarController::class, 'video_edit'])->name('ai_softwar.video_materi.edit');
     Route::PUT('admin/ai_softwar/materi/video/{productID}', [AiSoftwarController::class, 'video_update'])->name('ai_softwar.video_materi.update');
     Route::delete('admin/ai_softwar/materi/video/{productID}', [AiSoftwarController::class, 'video_destroy'])->name('ai_softwar.video_materi.destroy');
 
     Route::resource('admin/users', UserController::class);

     Route::get('/dashboard', [TrainingclassController::class, 'dashboard'])->name('dashboard'); 
     Route::get('/dashboard/class/{typeclass}', [TrainingclassController::class, 'class'])->name('dashboard.class');
     Route::get('/dashboard/class/edu/{classname}/{id}', [TrainingclassController::class, 'app'])->name('dashboard.sow'); 

});