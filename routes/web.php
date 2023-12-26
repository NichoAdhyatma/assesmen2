<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pyController;
use App\Http\Controllers\ValidationMinatController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\resultController;
use App\Http\Controllers\banksoalvalidasikepribadianController;
use App\Http\Controllers\bankSoalValidasiCognitiveController;
use App\Http\Controllers\bankSoalDDController;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


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

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Login dan Signup
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/signup', [AuthController::class, 'postSignUp'])->name('postSignUp');
Route::post('/signin', [AuthController::class, 'postSignIn'])->name('postSignIn');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/logout', 'AuthController@logout')->name('logout');


// Consent Page
Route::get('/consent', function () {
    return view('consent');
})->name('consent');

// Rute untuk upload nilai dari validation kepribadian bakat minat menjadi session
Route::post('/gotoValidation', [ValidationMinatController::class, 'gotoValidationKepribadian']);
Route::get('/gotoValidation', function () {
    return view('testvalidation');
});
Route::post('/gotoValidationbakatminat', [ValidationMinatController::class, 'gotoValidationMinat']);
Route::get('/gotoValidationbakatminat', function () {
    return view('testvalidationbakatminat');
});
Route::post('/gotoValidationBakat', [ValidationMinatController::class, 'gotoValidationBakat']);
Route::get('/gotoValidationBakat', function () {
    return view('testvalidationBakat');
});

// Rute untuk menggabung nilai dan mengirim ke database
Route::post('/postPenilaian', [ValidationMinatController::class, 'postPenilaian'])->name('postPenilaian');
Route::get('/postPenilaian', function () {
    return view('beforeresult');
});



Route::get('/signup', function () {
    return view('login');
});
Route::get('/signin', function () {
    return view('consent');
});

Route::get('/test', function () {
    return view('beforetest');
})->name('test');

Route::get('/testInt', function () {
    return view('beforetestIntelegensi');
})->name('testInt');




// Rute Untuk Test Video Teleassesment 
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


// Rute untuk Test Validation Tertulis Pilgan Urutan Kepribadian(1) -> BakatMinat -> Validation/Intelegensi
Route::get('/testvalidation', function () {
    return view('testvalidation');
})->name('testvalidation');

Route::get('/testvalidation1', function () {
    return view('testvalidation1');
})->name('testvalidation1');

Route::get('/testvalidation1Mudah', function () {
    return view('testvalidation1Mudah');
})->name('testvalidation1Mudah');

Route::get('/testvalidation1Susah', function () {
    return view('testvalidation1Susah');
})->name('testvalidation1Susah');

Route::get('/testvalidation2', function () {
    return view('testvalidation2');
})->name('testvalidation2');

Route::get('/testvalidation2Mudah', function () {
    return view('testvalidation2Mudah');
})->name('testvalidation2Mudah');

Route::get('/testvalidation2Susah', function () {
    return view('testvalidation2Susah');
})->name('testvalidation2Susah');


// 
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

Route::post('/processAllvideo', [VideoController::class, 'processAllVideo']);
Route::get('/processAllvideo', function () {
    return view('testvalidation1');
});

// Define a POST route for setting session values
Route::post('/set-session-values', [VideoController::class, 'setSessionValues']);
Route::get('/set-session-values', function () {
    return view('testinterview');
});
Route::post('/generate-pdf',  [resultController::class, 'generatePDF']);

Route::get('/generate-pdf', [resultController::class, 'generatePDF']);

Route::get('/download-pdf', [resultController::class, 'downloadPDF'])->name('download-pdf');



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



// Buat Test validation 1, untuk menyimpan skor sementara buat dibawa ke halaman tes mudah atau susah
Route::post('/store-skor-in-session', function (Request $request) {
    $skorData = $request->json()->all();
    if (isset($skorData['skor'])) {
        Session::put('skor', $skorData['skor']);
        return response()->json(['message' => 'Skor stored in session.']);
    } else {
        return response()->json(['error' => 'Skor data not provided.'], 400);
    }
});
Route::get('/store-skor-in-session', function () {
    return view('testvalidation1');
});

// Rute Untuk Execute dd.py untuk live cognitive test
Route::get('/execute-python', function () {
    return view('dd');
})->name('dd');
Route::post('/execute-python', [VideoController::class, 'executePython'])->name('execute.python');

// Fungsi Untuk Ubah halaman result/psikogram menjadi pdf dan png
Route::post('/save-screenshot', [resultController::class, 'save']);
Route::get('/imgToPdf', [resultController::class, 'imgToPdf']);
Route::get('/convert-image-to-pdf', [resultController::class, 'convertImageToPdf'])->name('convert.image');;
Route::get('/generate-pdf', [resultController::class, 'generatePDFfromBlade'])->name('/generate-pdf');
// Untuk mendapatkan CSV dari halaman result
Route::get('/download-csv', [resultController::class, 'downloadCsv'])->name('download-csv');


// Testing Bank Soal
Route::resource('questions', 'banksoalvalidasikepribadianController');
Route::get('/insert-question', [banksoalvalidasikepribadianController::class, 'index'])->name('insert-question');
Route::post('/store-question', [banksoalvalidasikepribadianController::class, 'store'])->name('store-question');
Route::delete('/lol', [banksoalvalidasikepribadianController::class, 'destroy'])->name('delete-question');
Route::post('/upload-csv', [banksoalvalidasikepribadianController::class, 'importCSV'])->name('/upload-csv');
// (Sementara Didalam Bank Soal) buat test upload ke csv
Route::get('/generate-csv', [banksoalvalidasikepribadianController::class, 'writeCSV'])->name('/generate-csv');
// Buat test export list ke csv 
Route::get('/export-csv', [banksoalvalidasikepribadianController::class, 'exportToCSV'])->name('export-csv');


// Testing Bank Soal Cognitive
Route::get('/insert-question-cognitive', [bankSoalValidasiCognitiveController::class, 'index'])->name('insert-question-cognitive');
Route::post('/store-question-cognitive', [bankSoalValidasiCognitiveController::class, 'store'])->name('store-question-cognitive');
Route::delete('/lol-cognitive', [bankSoalValidasiCognitiveController::class, 'destroy'])->name('delete-question-cognitive');
Route::post('/upload-csv-cognitive', [bankSoalValidasiCognitiveController::class, 'importCSV'])->name('/upload-csv-cognitive');


// Testing Bank Soal DD
Route::get('/insert-question-DD', [bankSoalDDController::class, 'index'])->name('insert-question-DD');
// Route::post('/store-question-DD', [bankSoalDDController::class,'store'])->name('store-question-DD');
// Route::delete('/lol-DD', [bankSoalDDController::class, 'destroy'])->name('delete-question-DD');
// Route::post('/upload-csv-DD', [bankSoalDDController::class,'importCSV'])->name('/upload-csv-DD');



// API Routes
Route::get('/api/signin', [APIController::class, 'signInAPI'])->name('apiName/signin');
Route::post('/filter-audio', [APIController::class, 'signInAndFilterAudio'])->name('filter-audio');
Route::post('/upload-audio', [APIController::class, 'addAudio'])->name('upload-audio');
Route::post('/get-audio', [APIController::class, 'getRecordingData'])->name('get-audio');


// Untuk data dari Bank Soal untuk Validasi Kepribadian Bakat Minat
Route::get('/test-get-data', [banksoalvalidasikepribadianController::class, 'getAllData'])->name('get-data'); // Name it 'get-data'


// Untuk Append CSV ValidationMinatController
Route::post('/append-to-csv', [ValidationMinatController::class, 'appendToCSV'])->name('/append-to-csv');

// Untuk gabungin data pertanyaan ke session
Route::post('/store-data-in-session', [ValidationMinatController::class, 'storeDataInSession']);
Route::post('/add-data-to-session', [ValidationMinatController::class, 'addDataToSession']);


//admin
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('auth.admin');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    Route::get('/admin/detail/{id}', [AdminController::class, 'detailResult'])->name('admin.detail');
    
    Route::get('/admin/result/{item}/{user}', [AdminController::class, 'result'])->name('admin.result');
});

