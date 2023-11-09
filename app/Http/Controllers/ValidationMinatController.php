<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\penilaian;
use App\Models\Users;

use Illuminate\Support\Facades\View;
use League\Csv\Reader;



class ValidationMinatController extends Controller
{

    

    public function gotoValidationKepribadian(Request $request)
    {
        // Retrieve the data that you want to store in the session
        $resultR = $request->input('resultR');
        $resultI = $request->input('resultI');
        $resultA = $request->input('resultA');
        $resultS = $request->input('resultS');
        $resultE = $request->input('resultE');
        $resultC = $request->input('resultC');

        // Store the data in the session
        Session::put('resultR', $resultR);
        Session::put('resultI', $resultI);
        Session::put('resultA', $resultA);
        Session::put('resultS', $resultS);
        Session::put('resultE', $resultE);
        Session::put('resultC', $resultC);

        

        // Return a JSON response with the redirect route
        //return response()->json(['redirect' => route('testvalidation')]);
    }
    
    public function gotoValidationMinat(Request $request)
    {
        // Retrieve the data that you want to store in the session
        $resultEmotionalStability = $request->input('resultEmotionalStability');
        $resulresultExtraversiontI = $request->input('resultExtraversion');
        $resultConscien = $request->input('resultConscien');
        $resultAgree = $request->input('resultAgree');
        $resultIntellect = $request->input('resultIntellect');


        // Store the data in the session
        Session::put('resultEmotionalStability', $resultEmotionalStability);
        Session::put('resultExtraversion', $resulresultExtraversiontI);
        Session::put('resultConscien', $resultConscien);
        Session::put('resultAgree', $resultAgree);
        Session::put('resultIntellect', $resultIntellect);


        

        // Return a JSON response with the redirect route
        //return response()->json(['redirect' => route('testvalidation')]);
    }

    public function gotoValidationBakat(Request $request)
    {
        // Retrieve the data that you want to store in the session
        $resultPer = $request->input('resultPer');
        $resultPsi = $request->input('resultPsi');
        $resultInt = $request->input('resultInt');

        // Store the data in the session
        Session::put('resultPer', $resultPer);
        Session::put('resultPsi', $resultPsi);
        Session::put('resultInt', $resultInt);

        // Return a JSON response with the redirect route
        //return response()->json(['redirect' => route('testvalidation')]);
    }

    function postPenilaian(Request $request){
       
    
        
        $validate = $request->validate([
            'id_user' => 'required',
            'f_sentimen_positif' => 'required',
            'f_sentimen_netral' => 'required',
            'f_sentimen_negatif' => 'required',
            'v_sentimen_positif' => 'required',
            'v_sentimen_netral' => 'required',
            'v_sentimen_negatif' => 'required',
            'skor_validasi' => 'required',
            'kepercayaan' => 'required',
            'cognitive_video_score' => 'required',
            'skor_validasi_kepribadianbakatminat' => 'required',
            'skor_validasi_cognitif' => 'required',
        ]);
        
        
        
        
            
        $createMember = penilaian::create([
            'id_user' => $validate['id_user'],
            'f_sentimen_positif' => $validate['f_sentimen_positif'],
            'f_sentimen_netral' => $validate['f_sentimen_netral'],
            'f_sentimen_negatif' => $validate['f_sentimen_negatif'],
            'v_sentimen_positif' => $validate['v_sentimen_positif'],
            'v_sentimen_netral' => $validate['v_sentimen_netral'],
            'v_sentimen_negatif' => $validate['v_sentimen_negatif'],

            'skor_validasi' => $validate['skor_validasi'],
            'kepercayaan' => $validate['kepercayaan'],
            'cognitive_video_score' => $validate['cognitive_video_score'],
            'skor_validasi_kepribadianbakatminat' => $validate['skor_validasi_kepribadianbakatminat'],
            'skor_validasi_cognitif' => $validate['skor_validasi_cognitif'],
        ]);

        // if ($createMember) {
        //     //$this->getPenilaianBefore();
        //     //echo '<script>window.location.href = "'.route('beforeresult').'";</script>';

        // } else {
            

        //     echo '<script>window.history.back();</script>';
        // }

    }

    public function getPenilaian()
    {
        // $value = session('id_user');

        // dd($value);
        $value = Session::get('user_id');
        //dd($value);
        $data = penilaian::get(); // Replace with your query logic
        // $length = count($data);
        // dd($length);

        return view('outputdb', ['data' => $data]);
    }

    public function getPenilaianBefore()
    {
        // $value = session('id_user');
        // dd($value);
        $userId  = Session::get('user_id');
        //dd($value);
        $data = penilaian::where('id_user', $userId)->get(); // Filter data based on user_id        // $length = count($data);
        // dd($length);

        return view('beforeresult', ['data' => $data]);
    }

    public function getPenilaianAfter($itemId)
    {
        $userId = session('user_id');
        //dd($userId);
        //dd($itemId);
        // dd($value);
        //$userId  = Session::get('user_id');
        //dd($value);
        $data = penilaian::where('id_penilaian', $itemId)->get(); // Filter data based on user_id        // $length = count($data);
        $dataUser = Users::where('id', $userId)->get();
        // dd($length);
        //dd($dataUser[0]->nama_lengkap);
        //dd($data[0]->id_penilaian);
        return view('result', ['data' => $data[0], 'dataUser' => $dataUser[0]]);
    }
    
    public function appendToCSV(Request $request)
    {
        // Get the question data from the request
        $questionData = $request->input('questionData');

        // Define the "id_user" and "Time" values
        $id_user = session('user_id'); // Set the user ID
        $time = session('waktuTes'); // Set the current date in the desired format, e.g., "23 Nov"

        // Initialize an associative array to store scores for each question
        $scoreData = [
            'id_user' => $id_user,
            'Time' => $time,
        ];

        // Extract and add the scores for each question, with the question text as headers
        foreach ($questionData as $index => $question) {
            $scoreData[$question['Question']] = $question['Score'];
        }

        // Define the path to the CSV file
        $csvFilePath = public_path('csv/csvKep/csvKep.csv');

        // Check if the CSV file already exists and if not, create it with headers
        if (!file_exists($csvFilePath)) {
            $headers = array_keys($scoreData);

            // Open the CSV file for writing and add headers
            $csvFile = fopen($csvFilePath, 'w');
            fputcsv($csvFile, $headers);
        } else {
            // Open the CSV file for appending
            $csvFile = fopen($csvFilePath, 'a');
        }

        // Write the row with scores to the CSV file
        fputcsv($csvFile, $scoreData);

        // Close the CSV file
        fclose($csvFile);

        return response()->json(['message' => 'Data appended to CSV successfully']);
    }

    public function storeDataInSession(Request $request)
    {
        $questionData = $request->input('questionData');
        // Store the questionData in the session
        session(['CSVSession' => $questionData]);
        
        return response()->json(['message' => 'Data stored in session successfully']);
    }

    public function addDataToSession(Request $request)
    {
        $newQuestionData = $request->input('questionData');
        $existingQuestionData = session('CSVSession', []);

        // Merge the new data with the existing data
        $combinedData = array_merge($existingQuestionData, $newQuestionData);

        // Store the combined data in the session
        session(['CSVSession' => $combinedData]);

        return response()->json(['message' => 'Data added to session successfully']);
    }

}
