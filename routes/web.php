<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pyController;
use App\Http\Controllers\ValidationMinatController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\resultController;



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
    return view('welcome');
});

Route::get('/consent', function () {
    return view('consent');
})->name('consent');


// Route::get('/signin', 'AuthController@show')->name('signUp');

Route::post('/signup', [AuthController::class, 'postSignUp'])->name('postSignUp');
Route::post('/signin', [AuthController::class, 'postSignIn'])->name('postSignIn');
Route::post('/gotoValidation', [ValidationMinatController::class, 'gotoValidation']);


Route::get('/gotoValidation', function () {
    return view('testvalidation');
});

Route::post('/gotoValidationbakatminat', [ValidationMinatController::class, 'gotoValidationbakatminat']);

Route::get('/gotoValidationbakatminat', function () {
    return view('testvalidationbakatminat');
});

Route::post('/postPenilaian', [ValidationMinatController::class, 'postPenilaian'])->name('postPenilaian');
Route::get('/postPenilaian', function () {
    return view('beforeresult');
});

Route::get('/signup', function () {
    return view('consent');
});
Route::get('/signin', function () {
    return view('consent');
});

Route::get('/test', function () {
    return view('beforetest');
})->name('test');

Route::get('/login', function () {
    return view('login');
})->name('login');

// Route::get('/testlogin', function () {
//     return view('testlogin');
// })->name('testlogin');

// Rute Untuk Test Video/Teleassesment Urutuan Interview -> BakatMinat -> Cognitive
Route::get('/testinterview', function () {
    return view('testinterview');
})->name('testinterview');

Route::get('/testinterviewConscientiousness', function () {
    return view('testinterviewConscientiousness');
})->name('testinterviewConscientiousness');

Route::get('/testinterviewAgreeableness', function () {
    return view('testinterviewAgreeableness');
})->name('testinterviewAgreeableness');

Route::get('/testinterviewOpenness', function () {
    return view('testinterviewOpenness');
})->name('testinterviewOpenness');

Route::get('/testinterviewNeuroticism', function () {
    return view('testinterviewNeuroticism');
})->name('testinterviewNeuroticism');

Route::get('/testinterviewRealistic', function () {
    return view('testinterviewRealistic');
})->name('testinterviewRealistic');

Route::get('/testinterview', function () {
    return view('testinterview');
})->name('testinterview');

Route::get('/testinterviewInvestigative', function () {
    return view('testinterviewInvestigative');
})->name('testinterviewInvestigative');

Route::get('/testinterviewArtistic', function () {
    return view('testinterviewArtistic');
})->name('testinterviewArtistic');

Route::get('/testinterviewSocial', function () {
    return view('testinterviewSocial');
})->name('testinterviewSocial');

Route::get('/testinterviewEnterprising', function () {
    return view('testinterviewEnterprising');
})->name('testinterviewEnterprising');

Route::get('/testinterviewConventional', function () {
    return view('testinterviewConventional');
})->name('testinterviewConventional');

Route::get('/testinterviewPerseptual', function () {
    return view('testinterviewPerseptual');
})->name('testinterviewPerseptual');

Route::get('/testinterviewPsikomotor', function () {
    return view('testinterviewPsikomotor');
})->name('testinterviewPsikomotor');

Route::get('/testinterviewIntelektual', function () {
    return view('testinterviewIntelektual');
})->name('testinterviewIntelektual');




Route::get('/testcognitive', function () {
    return view('testcognitive');
})->name('testcognitive');

Route::get('/testbakatminat', function () {
    return view('testbakatminat');
})->name('testbakatminat');


// Rute untuk Test Validation Tertulis Pilgan Urutan Kepribadian(1) -> BakatMinat -> Validation/Intelegensi
Route::get('/testvalidation', function () {
    return view('testvalidation');
})->name('testvalidation');

Route::get('/testvalidationkepribadian', function () {
    return view('testvalidationkepribadian');
})->name('testvalidationkepribadian');

Route::get('/testvalidationbakatminat', function () {
    return view('testvalidationbakatminat');
})->name('testvalidationbakatminat');
// Hasil
Route::get('/result', function () {
    return view('result');
})->name('result');

Route::get('/insert', function () {
    return view('insertvideo');
})->name('insert');

Route::get('/my-route', [pyController::class, 'index'])->name('my-route');

Route::get('/outputdb', [ValidationMinatController::class, 'getPenilaian']);
Route::get('/beforeresult', [ValidationMinatController::class, 'getPenilaianBefore'])->name('beforeresult');
Route::get('/resultID/{itemId}', [ValidationMinatController::class, 'getPenilaianAfter'])->name('resultID');

Route::post('/save-recorded-video', [VideoController::class, 'saveRecordedVideo']);
Route::get('/save-recorded-video', function () {
    return view('testinterview');
});

Route::post('/process-video', [VideoController::class, 'processSelectedVideo']);
Route::get('/process-video', function () {
    return view('beforetest');
});

// Define a POST route for setting session values
Route::post('/set-session-values', [VideoController::class, 'setSessionValues']);
Route::get('/set-session-values', function () {
    return view('testinterview');
});
Route::post('/generate-pdf',  [resultController::class, 'generatePDF']);

Route::get('/generate-pdf', [resultController::class, 'generatePDF']);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Route::get('/upload', function () {
    return view('insertvideo');
});

Route::post('/upload', function (Request $request) {
    // Validate the uploaded file
    $request->validate([
        'video' => 'required|mimes:mp4|max:10240', // Max 10MB
        'folder' => 'required|in:Extraversion,Conscientiousness,Agreeableness,Openness,Neuroticism,Realistic,Investigative,Artistic,Social,Enterprising,Conventional,Perseptual,Psikomotor,Intelektual', // Only allow specific folders
    ]);

    // Get the selected folder from the form
    $selectedFolder = $request->input('folder');

    // Store the uploaded video in the selected folder
    $videoPath = $request->file('video')->store("assets/video/{$selectedFolder}", 'public');
 
    return "The video has been successfully uploaded to {$selectedFolder}.";
})->name('upload.video');


