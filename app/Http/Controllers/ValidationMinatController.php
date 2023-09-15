<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\penilaian;
use App\Models\Users;





class ValidationMinatController extends Controller
{
    public function gotoValidation(Request $request)
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
    
    public function gotoValidationbakatminat(Request $request)
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
}
