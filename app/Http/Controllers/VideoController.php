<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\penilaian;

class VideoController extends Controller
{
    public function saveRecordedVideo(Request $request)
    {
        set_time_limit(360);
        // Validate and store the uploaded video in the public/videos folder
        $video = $request->file('recorded_video');
        $directoryIndex = $request->input('recordCounter');
        $directoryIndex = (int)$directoryIndex;
        $personalityList = [
            'Extraversion', 'Conscientiousness', 'Agreeableness', 'Openness', 'Neuroticism', 'Realistic', 'Investigative', 'Artistic', 'Social', 'Enterprising', 'Conventional', 'Perseptual', 'Psikomotor', 'Intelektual',
        ];
        $firstPersonality = $personalityList[$directoryIndex];
        // dd($firstPersonality);
        // dd($video);
        $userId = session('user_id');
        // Define the path where you want to save the video
        $userVideoDirectory = public_path('videos/' . $userId . '/' . $firstPersonality);
        if (!file_exists($userVideoDirectory)) {
            // Create the user's directory if it doesn't exist
            mkdir($userVideoDirectory, 0777, true);
        }

        // Initialize video number to 1
        $videoNumber = 1;
        // $currentDateTime = date('Y-m-d:H-i-s');
        $outputVideoPath = $userVideoDirectory . '/video' . $videoNumber . '.mp4';

        // Find the next available video number
        while (file_exists($outputVideoPath)) {
            $videoNumber++;
            $outputVideoPath = $userVideoDirectory . '/video' . $videoNumber . '.mp4';
        }

        // Execute FFmpeg command to create output files with a specific duration
        $ffmpegCommand = "ffmpeg -i $video -c:v copy -c:a aac -strict experimental -b:a 192k $outputVideoPath";
        exec($ffmpegCommand);

        
        // SaveAudioFile
        // Define the path where you want to save the audio
        $userAudioDirectory = public_path('audios/' . $userId . '/' . $firstPersonality);

        if (!file_exists($userAudioDirectory)) {
            // Create the user's audio directory if it doesn't exist
            mkdir($userAudioDirectory, 0777, true);
        }

        // Create the path for the audio file (you can customize the filename)
        $outputAudioPath = $userAudioDirectory . '/audio' . $videoNumber . '.wav';

        // Execute FFmpeg command to extract audio as WAV
        $ffmpegAudioCommand = "ffmpeg -i $outputVideoPath -vn -acodec pcm_s16le -ar 44100 -ac 2 $outputAudioPath";
        exec($ffmpegAudioCommand);

        // Return a response to indicate success
        return response()->json(['message' => 'Video and audio saved successfully']);
    }





    public function processSelectedVideo(Request $request)
    {
        set_time_limit(360);
        $numberData = $request->input('numberData');
        $numberData = (int)$numberData;
        $personalityList = [
            'Extraversion', 'Conscientiousness', 'Agreeableness', 'Openness', 'Neuroticism', 'Realistic', 'Investigative', 'Artistic', 'Social', 'Enterprising', 'Conventional', 'Perseptual', 'Psikomotor', 'Intelektual',
        ];
        $firstPersonality = $personalityList[$numberData];
        
        // Get the user's ID (assuming you have it stored in the session)
        $userId = session('user_id');
        //dd($userId);
        // Define the path to the user's video directory
        $userVideoDirectory = base_path('public'. DIRECTORY_SEPARATOR .'videos' . DIRECTORY_SEPARATOR .$userId.  DIRECTORY_SEPARATOR .$firstPersonality);
        // dd($userVideoDirectory);
        // Get a list of video files in the user's directory
        $videoFiles = Storage::disk('public')->files('videos'  . DIRECTORY_SEPARATOR . $userId. DIRECTORY_SEPARATOR .$firstPersonality);
        // dd( $videoFiles);

        // Ambil Video Terakhir
        $videoFile = end($videoFiles);
        // dd($videoFile);
        // Construct the full path to the selected video file
        $videoFilePath = $userVideoDirectory  . DIRECTORY_SEPARATOR .  basename($videoFile);
        // dd($videoFilePath);
        // dd("Something");
        // Call the function to process the selected video
        $pythonData = $this->processVideoWithPython($videoFilePath);
        // dd($pythonData);
        // Return the result as a response
        return response()->json(['data' => $pythonData]);
    }

    public function processAllVideo(Request $request)
    {
        set_time_limit(5040);
        $personalityList = [
            'Extraversion', 'Conscientiousness', 'Agreeableness', 'Openness', 'Neuroticism', 'Realistic', 'Investigative', 'Artistic', 'Social', 'Enterprising', 'Conventional', 'Perseptual', 'Psikomotor', 'Intelektual',
        ];
        
        // Get the user's ID (assuming you have it stored in the session)
        $userId = session('user_id');
        
        // Define the path to the user's video directory
        $userVideoDirectory = base_path('public'. DIRECTORY_SEPARATOR .'videos' . DIRECTORY_SEPARATOR .$userId);
        
        // Initialize an array to store the results for each personality
        $results = [];
        $varCheck = [];
        foreach ($personalityList as $personality) {
            // Get a list of video files in the user's directory for the current personality
            $videoFiles = Storage::disk('public')->files('videos' . DIRECTORY_SEPARATOR . $userId . DIRECTORY_SEPARATOR . $personality);
         
            // Select a video file to process (you can implement your logic to choose one)
            // For example, you can select the first video file in the list
            $videoFile = end($videoFiles); // Change this to your logic
        
            // Construct the full path to the selected video file
            $videoFilePath = $userVideoDirectory . DIRECTORY_SEPARATOR . $personality . DIRECTORY_SEPARATOR . basename($videoFile);
        
            // Call the function to process the selected video
            $pythonData = $this->processVideoWithPython($videoFilePath);
            // dd($pythonData);
            // Modify the keys and values as needed and set them as sessions
            $decodedData = json_decode($pythonData, true); // Decode the JSON string into an array
           
            if (is_array($decodedData)) {
                foreach ($decodedData as $key => $value) {
                    // Modify the key (e.g., append the personality name)
                    $sessionName = $key . $personality;
                    array_push($varCheck, $sessionName);
                    // Set the session with the modified name and the value
                    session([$sessionName => $value]);
                }
            } 
            
            // Store the result in the results array
            $results[$personality] = $pythonData;

            // gabung di sini
            // $userid = session('user_id');
            // Tanggal Penilaian = CurrentDate
            // ...

            // Additional code for Sentimen Positif Facial, Sentimen Netral Facial, etc.
            // $allSessionData = session()->all();
    
            // $filteredSessionData = array_filter($allSessionData, function ($key) {
            //     return strpos($key, 'neutral') !== false;
            // }, ARRAY_FILTER_USE_KEY);

            // dd($filteredSessionData);
            
            
            
            // ... Repeat the same for other variables

            // postPenilaian
        }
        $f_sentimen_positif = session('positive_scoreExtraversion') . "," . session('positive_scoreConscientiousness') . "," . session('positive_scoreAgreeableness') . "," . session('positive_scoreOpenness') . "," . session('positive_scoreNeuroticism') . "," . session('positive_scoreRealistic') . "," . session('positive_scoreInvestigative') . "," . session('positive_scoreArtistic') . "," . session('positive_scoreSocial') . "," . session('positive_scoreEnterprising') . "," . session('positive_scoreConventional') . "," . session('positive_scorePerseptual') . "," . session('positive_scorePsikomotor') . "," . session('positive_scoreIntelektual');
        $f_sentimen_negatif = session('positive_scoreExtraversion') . "," . session('positive_scoreConscientiousness') . "," . session('positive_scoreAgreeableness') . "," . session('positive_scoreOpenness') . "," . session('positive_scoreNeuroticism') . "," . session('positive_scoreRealistic') . "," . session('positive_scoreInvestigative') . "," . session('positive_scoreArtistic') . "," . session('positive_scoreSocial') . "," . session('positive_scoreEnterprising') . "," . session('positive_scoreConventional') . "," . session('positive_scorePerseptual') . "," . session('positive_scorePsikomotor') . "," . session('positive_scoreIntelektual');
        
        $f_sentimen_netral = session('neutral_scoreExtraversion') . "," . session('neutral_scoreConscientiousness') . "," . session('neutral_scoreAgreeableness') . "," . session('neutral_scoreOpenness') . "," . session('neutral_scoreNeuroticism') . "," . session('neutral_scoreRealistic') . "," . session('neutral_scoreInvestigative') . "," . session('neutral_scoreArtistic') . "," . session('neutral_scoreSocial') . "," . session('neutral_scoreEnterprising') . "," . session('neutral_scoreConventional') . "," . session('neutral_scorePerseptual') . "," . session('neutral_scorePsikomotor') . "," . session('neutral_scoreIntelektual');
        

        // Sentimen Positif Voice
        $v_sentimen_positif = session('posExtraversion') . "," . session('posConscientiousness') . "," . session('posAgreeableness') . "," . session('posOpenness') . "," . session('posNeuroticism') . "," . session('posRealistic') . "," . session('posInvestigative') . "," . session('posArtistic') . "," . session('posSocial') . "," . session('posEnterprising') . "," . session('posConventional') . "," . session('posPerseptual') . "," . session('posPsikomotor') . "," . session('posIntelektual');
        // $v_sentimen_positif = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

        // Sentimen Netral Voice
        $v_sentimen_netral = session('neuExtraversion') . "," . session('neuConscientiousness') . "," . session('neuAgreeableness') . "," . session('neuOpenness') . "," . session('neuNeuroticism') . "," . session('neuRealistic') . "," . session('neuInvestigative') . "," . session('neuArtistic') . "," . session('neuSocial') . "," . session('neuEnterprising') . "," . session('neuConventional') . "," . session('neuPerseptual') . "," . session('neuPsikomotor') . "," . session('neuIntelektual');
        // $v_sentimen_netral = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

        // Sentimen Negatif voice
        $v_sentimen_negatif = session('negExtraversion') . "," . session('negConscientiousness') . "," . session('negAgreeableness') . "," . session('negOpenness') . "," . session('negNeuroticism') . "," . session('negRealistic') . "," . session('negInvestigative') . "," . session('negArtistic') . "," . session('negSocial') . "," . session('negEnterprising') . "," . session('negConventional') . "," . session('negPerseptual') . "," . session('negPsikomotor') . "," . session('negIntelektual');
        // $v_sentimen_negatif = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

        // Validation Score
        $validation_score = session('resultExtraversion') . "," . session('resultConscien') . "," . session('resultAgree') . "," . session('resultIntellect') . "," . session('resultEmotionalStability') . "," . session('resultR') . "," . session('resultI') . "," . session('resultA') . "," . session('resultS') . "," . session('resultE') . "," . session('resultC') . "," . session('resultPer') . ",". session('resultPsi') . ",". session('resultInt') ;
        // $validation_score = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

        // %Kepercayaan
        $kepercayaan = session('trustExtraversion') . "," . session('trustConscientiousness') . "," . session('trustAgreeableness') . "," . session('trustOpenness') . "," . session('trustNeuroticism') . "," . session('trustRealistic') . "," . session('trustInvestigative') . "," . session('trustArtistic') . "," . session('trustSocial') . "," . session('trustEnterprising') . "," . session('trustConventional') . "," . session('trustPerseptual') . "," . session('trustPsikomotor') . "," . session('trustIntelektual');
        // $kepercayaan = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"


        // [Untuk tes cognitive video]
        // RawScore(9Data Dipisah Koma)
        $skor_video = session('skorVideo'); 
        // Validasi bakat minat kepribadian
        // RawScore(14 Data dipisah koma)
        $skor_validasi_kepribadianbakatminat = session('resultExtraversion') . "," . session('resultConscien') . "," . session('resultAgree') . "," . session('resultIntellect') . "," . session('resultEmotionalStability') . "," . session('resultR') . "," . session('resultI') . "," . session('resultA') . "," . session('resultS') . "," . session('resultE') . "," . session('resultC') . "," . session('resultPer') . ",". session('resultPsi') . ",". session('resultInt') ;
        // Validasi Cognitive
        // Raw Score(9Data dipisah koma) -> 9 Penilaian jadikan 1 data hingga berikut
        $skorValidasiCognitif = (int) $request->input('skorValidasiCognitif');


        // $validate = $request->validate([
        //     'id_user' => 'required',
        //     'f_sentimen_positif' => 'required',
        //     'f_sentimen_netral' => 'required',
        //     'f_sentimen_negatif' => 'required',
        //     'v_sentimen_positif' => 'required',
        //     'v_sentimen_netral' => 'required',
        //     'v_sentimen_negatif' => 'required',
        //     'skor_validasi' => 'required',
        //     'kepercayaan' => 'required',
        //     'cognitive_video_score' => 'required',
        //     'skor_validasi_kepribadianbakatminat' => 'required',
        //     'skor_validasi_cognitif' => 'required',
        // ]);
        
        
        
        
            
        $createMember = penilaian::create([
            'id_user' => $userId,
            'f_sentimen_positif' => $f_sentimen_positif,
            'f_sentimen_netral' => $f_sentimen_netral,
            'f_sentimen_negatif' => $f_sentimen_negatif,
            'v_sentimen_positif' => $v_sentimen_positif,
            'v_sentimen_netral' => $v_sentimen_netral,
            'v_sentimen_negatif' => $v_sentimen_negatif,
            'skor_validasi' => $skor_validasi_kepribadianbakatminat,
            'kepercayaan' => $kepercayaan,

            'cognitive_video_score' => $skor_video,

            'skor_validasi_kepribadianbakatminat' =>  $skor_validasi_kepribadianbakatminat,

            'skor_validasi_cognitif' => $skorValidasiCognitif,
        ]);
        // Return the results as a response
        return response()->json(['data' => $results]);
        
    }

    // Function to process the selected video with Python
    private function processVideoWithPython($videoFilePath)
    {
        set_time_limit(3600);
        // Call your Python script and pass the video file path as an argument
        //$pythonScript = public_path('asesmen.py'); //public/python ya bisa
        $pythonScript = base_path('public\asesmen.py');
        // dd($videoFilePath);
        $command = "python {$pythonScript} '{$videoFilePath}' 2>&1";
        // dd($command);
        // Inside your Laravel controller
        $output = exec($command, $outputArray, $exitCode);
        // Log or print $output, $outputArray, and $exitCode for debugging
        // dd($output);
        
        $pythonData = json_decode($output, true);
        // dd($pythonData);
        $pythonData = $output;
        return $pythonData;
        
    }
    public function setSessionValues(Request $request)
    {
        $data = $request->all();
        // dd($data);
        foreach ($data as $key => $value) {
            Session::put($key, $value);
        }

        // You can send a success response if needed
        return response()->json(['message' => 'Session values set successfully']);
    }

    public function executePython()
    {
        set_time_limit(5040);
        $pythonScriptPath = base_path('public\dd.py');
        $output = shell_exec("python $pythonScriptPath");

        // Extract and clean the score from the output
        $output = trim($output); // Remove leading/trailing whitespace
        $score = intval($output); // Convert to an integer

        // Save the score in a session variable
        Session::put('skorVideo', $score);

        return view('testvalidationkepribadian', ['output' => $output]);
    }

}
