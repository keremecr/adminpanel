<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard\DashboardIndex;
use App\Http\Livewire\Dashboard\Auth\UserLogin;
use App\Http\Livewire\Dashboard\Mainsidebar;
use App\Http\Livewire\Index;
use App\Http\Livewire\UpdateActivite;
use App\Http\Livewire\Createactivite;
use App\Http\Livewire\DeleteActivite;
use App\Http\Livewire\Lessons;
use App\Http\Livewire\Lessoncreate;
use App\Http\Livewire\Lessonupdate;
use App\Http\Livewire\Groups;
use App\Http\Livewire\Lessongroups;
use App\Http\Livewire\Lessongroupcreate;
use App\Http\Livewire\Lessongroupupdate;
use App\Http\Livewire\Exams;
use App\Http\Livewire\Examcreate;
use App\Http\Livewire\Examupdate;
use App\Models\Dersler;
use App\Models\Dersgruplari;
use App\Http\Livewire\Answerkeys;
use App\Http\Livewire\Students;
use App\Http\Livewire\Studentcreate;
use App\Models\Exam;
use App\Http\Livewire\Studentanswers;
use App\Http\Livewire\Examanalyze;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.auth.login');
})->name('login');

Route::prefix('dashboard')->middleware('auth')->group(function(){
  Route::get('/',DashboardIndex::class)->name('dashboard.index');
  Route::get('/index',Index::class)->name('activities');
  Route::get('/duzenle/{id}',UpdateActivite::class);
  Route::get('/sil/{id}',DeleteActivite::class);
  Route::get('/create',Createactivite::class);
  Route::get('/lessons',Lessons::class)->name('lessons');
  Route::get('/lessoncreate',Lessoncreate::class);
  Route::get('/lessonupdate/{id}',Lessonupdate::class);
  Route::get('/groups',Groups::class)->name('groups');
  Route::get('/lessongroups',Lessongroups::class)->name('lessongroups');
  Route::get('/lessongroupcreate',Lessongroupcreate::class);
  Route::get('/lessongroupupdate/{id}/{name}',Lessongroupupdate::class);
  Route::get('/exams',Exams::class)->name('exams');
  Route::get('/examcreate',Examcreate::class);
  Route::get('/examupdate/{id}',Examupdate::class);
  Route::get('/logout', function () {
    Auth::logout();
    session()->flash('message','Başarıyla çıkış yaptınız');
    return redirect()->route('login');
  });
  Route::get('/lessongroupdelete/{id}/{name}', function ($id,$name) {
    $ders=Dersler::find($id)->groups()->where('name',$name)->first();
    $lessongroup=Dersgruplari::where('ders_id',$id)->where('grup_id',$ders->id)->first();
    $lessongroup->delete();
    session()->flash('message','Ders grubu başarıyla silindi');
    return redirect()->route('lessongroups');
  });
  Route::get('/answerkeys/{id}',Answerkeys::class)->name('answerkeys');
  Route::get('/students',Students::class)->name('students');
  Route::get('/studentcreate',Studentcreate::class);
  Route::get('/exams/studentanswers/{exam}',Studentanswers::class);
  Route::get('/exams/examanalyze/{exam}',Examanalyze::class);
});
