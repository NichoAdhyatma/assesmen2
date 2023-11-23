<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\penilaian;
use App\Models\penilaianBeo;
use GuzzleHttp\Client;

use App\Models\banksoalvalidasikepribadian;


class VideoController extends Controller
{

    public function saveRecordedVideo(Request $request)
    {
        set_time_limit(720);
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
        $currentDateTime = date('Y-m-d_H-i-s');
        $outputVideoPath = $userVideoDirectory . '/video' . $videoNumber . '.mp4';

        // Find the next available video number
        while (file_exists($outputVideoPath)) {
            $videoNumber++;
            $outputVideoPath = $userVideoDirectory . '/video' . $videoNumber . '.mp4';
        }
        // $outputVideoPath = $userVideoDirectory . '/video' . $videoNumber . '.mp4';
        
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

        // Upload audio to beo API
        $client = new Client();
        $accessToken = $this->signInAPI();
        $audioName = $firstPersonality . '_' . $userId . '_' . $videoNumber;

        try {
            $response = $client->request('POST', 'https://backend.beo.inergi.id/recordadd', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                ],
                'multipart' => [
                    [
                        'name' => 'type',
                        'contents' => 'upload', 
                    ],
                    [
                        'name' => 'name',
                        'contents' => $audioName,
                    ],
                    [
                        'name' => 'description',
                        'contents' => ' ', // Optional: Adjust based on your needs
                    ],
                    [
                        'name' => 'audio',
                        'contents' => fopen($outputAudioPath, 'r'),
                    ],
                    [
                        'name' => 'num_speakers',
                        'contents' => '0',
                    ],
                    [
                        'name' => 'noise_cancel',
                        'contents' => 'false',
                    ],
                ]
            ]);

        } catch (\Exception $e) {

            return $e;
        }
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
        // $existingQuestionData = session('CSVSession', []);
        foreach ($personalityList as $personality) {

            $videoFiles = Storage::disk('public')->files('videos' . DIRECTORY_SEPARATOR . $userId . DIRECTORY_SEPARATOR . $personality);
            $videoFile = end($videoFiles); // Change this to your logic
            $videoFilePath = $userVideoDirectory . DIRECTORY_SEPARATOR . $personality . DIRECTORY_SEPARATOR . basename($videoFile);
            $pythonData = $this->processVideoWithPython($videoFilePath);
            $decodedData = json_decode($pythonData, true); // Decode the JSON string into an array
           
            if (is_array($decodedData)) {
                foreach ($decodedData as $key => $value) {

                    $sessionName = $key . $personality;
                    array_push($varCheck, ["Question" => $sessionName, "Score" => $value]);

                    session([$sessionName => $value]);
                }
            } 
            
            // Store the result in the results array
            $results[$personality] = $pythonData;


            // Disini kita perlu add ngambil voice recording dengan filter string
            // REMINDER UNTUK ENABLE SAAT BEO GA DOWN
            $filterString = $personality . '_' . $userId;
            // $filterString = "Extraversion_11"; 
            $resultAudio = $this->getRecordingData($filterString);
            $sessionNameAudio = 'voice' . $personality;
            session([$sessionNameAudio => $resultAudio]);

        }
        array_push($varCheck, ["Question" => 'SkorLiveCognitive', "Score" => session('skorVideo', -1)]);
        $existingCSVSession = session('CSVSession', []);
        $combinedData = array_merge($varCheck, $existingCSVSession);
        // Tambah hasil disini 
        // dd($combinedData);
        session(['CSVSession' => $combinedData]);
        

        $questionData = session('CSVSession');
        // dd($questionData);
        $id_user = session('user_id'); // Set the user ID
        $time = session('waktuTes'); // Set the current date in the desired format, e.g., "23 Nov"

        // Initialize an associative array to store scores for each question
        $scoreData = [
            'id_user' => $id_user,
            'Time' => $time,
        ];

        // Extract and add the scores for each question, with the question text as headers
        foreach ($questionData as $index => $question) {
            // $scoreData[$question['Question']] = $question['Score'];
            $questionText = str_replace("\n", '', $question['Question']);
            $scoreData[$questionText] = $question['Score'];
        }

        // Define the path to the CSV file
        $csvFilePath = public_path('csv/csvKep/csvKep.csv');
        if (!file_exists($csvFilePath)) {
            $headers = array_keys($scoreData);
            $csvFile = fopen($csvFilePath, 'w');
            fputcsv($csvFile, $headers);
        } else {
            $csvFile = fopen($csvFilePath, 'a');
        }
        fputcsv($csvFile, $scoreData);
        fclose($csvFile);

        // Gabungkan data dan taruh ke database
        // Sentimen Face
        $f_sentimen_positif = session('positive_scoreExtraversion', -1) . "," . session('positive_scoreConscientiousness',-1) . "," . session('positive_scoreAgreeableness', -1) . "," . session('positive_scoreOpenness', -1) . "," . session('positive_scoreNeuroticism', -1) . "," . session('positive_scoreRealistic', -1) . "," . session('positive_scoreInvestigative', -1) . "," . session('positive_scoreArtistic', -1) . "," . session('positive_scoreSocial', -1) . "," . session('positive_scoreEnterprising', -1) . "," . session('positive_scoreConventional', -1) . "," . session('positive_scorePerseptual', -1) . "," . session('positive_scorePsikomotor', -1) . "," . session('positive_scoreIntelektual', -1);
        $f_sentimen_negatif = session('positive_scoreExtraversion', -1) . "," . session('positive_scoreConscientiousness',-1) . "," . session('positive_scoreAgreeableness', -1) . "," . session('positive_scoreOpenness', -1) . "," . session('positive_scoreNeuroticism', -1) . "," . session('positive_scoreRealistic', -1) . "," . session('positive_scoreInvestigative', -1) . "," . session('positive_scoreArtistic', -1) . "," . session('positive_scoreSocial', -1) . "," . session('positive_scoreEnterprising', -1) . "," . session('positive_scoreConventional', -1) . "," . session('positive_scorePerseptual', -1) . "," . session('positive_scorePsikomotor', -1) . "," . session('positive_scoreIntelektual', -1);
        $f_sentimen_netral = session('neutral_scoreExtraversion', -1) . "," . session('neutral_scoreConscientiousness',-1) . "," . session('neutral_scoreAgreeableness', -1) . "," . session('neutral_scoreOpenness', -1) . "," . session('neutral_scoreNeuroticism', -1) . "," . session('neutral_scoreRealistic', -1) . "," . session('neutral_scoreInvestigative', -1) . "," . session('neutral_scoreArtistic', -1) . "," . session('neutral_scoreSocial', -1) . "," . session('neutral_scoreEnterprising', -1) . "," . session('neutral_scoreConventional', -1) . "," . session('neutral_scorePerseptual', -1) . "," . session('neutral_scorePsikomotor', -1) . "," . session('neutral_scoreIntelektual', -1);
        
        // Sentimen Voice
        // $v_sentimen_positif = session('posExtraversion', -1) . "," . session('posConscientiousness',-1) . "," . session('posAgreeableness', -1) . "," . session('posOpenness', -1) . "," . session('posNeuroticism', -1) . "," . session('posRealistic', -1) . "," . session('posInvestigative', -1) . "," . session('posArtistic', -1) . "," . session('posSocial', -1) . "," . session('posEnterprising', -1) . "," . session('posConventional', -1) . "," . session('posPerseptual', -1) . "," . session('posPsikomotor', -1) . "," . session('posIntelektual', -1);
        // $v_sentimen_netral = session('neuExtraversion', -1) . "," . session('neuConscientiousness',-1) . "," . session('neuAgreeableness', -1) . "," . session('neuOpenness', -1) . "," . session('neuNeuroticism', -1) . "," . session('neuRealistic', -1) . "," . session('neuInvestigative', -1) . "," . session('neuArtistic', -1) . "," . session('neuSocial', -1) . "," . session('neuEnterprising', -1) . "," . session('neuConventional', -1) . "," . session('neuPerseptual', -1) . "," . session('neuPsikomotor', -1) . "," . session('neuIntelektual', -1);
        // $v_sentimen_negatif = session('negExtraversion', -1) . "," . session('negConscientiousness',-1) . "," . session('negAgreeableness', -1) . "," . session('negOpenness', -1) . "," . session('negNeuroticism', -1) . "," . session('negRealistic', -1) . "," . session('negInvestigative', -1) . "," . session('negArtistic', -1) . "," . session('negSocial', -1) . "," . session('negEnterprising', -1) . "," . session('negConventional', -1) . "," . session('negPerseptual', -1) . "," . session('negPsikomotor', -1) . "," . session('negIntelektual', -1);
        $v_sentimen = session('voiceExtraversion', -1) . "," . session('voiceConscientiousness',-1) . "," . session('voiceAgreeableness', -1) . "," . session('voiceOpenness', -1) . "," . session('voiceNeuroticism', -1) . "," . session('voiceRealistic', -1) . "," . session('voiceInvestigative', -1) . "," . session('voiceArtistic', -1) . "," . session('voiceSocial', -1) . "," . session('voiceEnterprising', -1) . "," . session('voiceConventional', -1) . "," . session('voicePerseptual', -1) . "," . session('voicePsikomotor', -1) . "," . session('voiceIntelektual', -1);
        // dd($v_sentimen); 

        // Validation Score
        $validation_score = session('resultExtraversion', -1) . "," . session('resultConscien') . "," . session('resultAgree') . "," . session('resultIntellect') . "," . session('resultEmotionalStability') . "," . session('resultR') . "," . session('resultI') . "," . session('resultA') . "," . session('resultS') . "," . session('resultE') . "," . session('resultC') . "," . session('resultPer') . ",". session('resultPsi') . ",". session('resultInt') ;

        // %Kepercayaan
        $kepercayaan = session('trustExtraversion', -1) . "," . session('trustConscientiousness',-1) . "," . session('trustAgreeableness', -1) . "," . session('trustOpenness', -1) . "," . session('trustNeuroticism', -1) . "," . session('trustRealistic', -1) . "," . session('trustInvestigative', -1) . "," . session('trustArtistic', -1) . "," . session('trustSocial', -1) . "," . session('trustEnterprising', -1) . "," . session('trustConventional', -1) . "," . session('trustPerseptual', -1) . "," . session('trustPsikomotor', -1) . "," . session('trustIntelektual', -1);


        // [Untuk tes cognitive video]
        // RawScore(9Data Dipisah Koma)
        $skor_video = session('skorVideo', -1); 
        // Validasi bakat minat kepribadian
        // RawScore(14 Data dipisah koma)
        $skor_validasi_kepribadianbakatminat = session('resultExtraversion', -1) . "," . session('resultConscien', -1) . "," . session('resultAgree', -1) . "," . session('resultIntellect', -1) . "," . session('resultEmotionalStability', -1) . "," . session('resultR', -1) . "," . session('resultI', -1) . "," . session('resultA', -1) . "," . session('resultS', -1) . "," . session('resultE', -1) . "," . session('resultC', -1) . "," . session('resultPer', -1) . ",". session('resultPsi', -1) . ",". session('resultInt', -1) ;
        // Validasi Cognitive
        // Raw Score(9Data dipisah koma) -> 9 Penilaian jadikan 1 data hingga berikut
        $skorValidasiCognitif = (int) $request->input('skorValidasiCognitif', -1);


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
        
        
        
        
            
        // $createMember = penilaian::create([
        //     'id_user' => $userId,
        //     'f_sentimen_positif' => $f_sentimen_positif,
        //     'f_sentimen_netral' => $f_sentimen_netral,
        //     'f_sentimen_negatif' => $f_sentimen_negatif,
        //     'v_sentimen_positif' => $v_sentimen_positif,
        //     'v_sentimen_netral' => $v_sentimen_netral,
        //     'v_sentimen_negatif' => $v_sentimen_negatif,
        //     'skor_validasi' => $skor_validasi_kepribadianbakatminat,
        //     'kepercayaan' => $kepercayaan,

        //     'cognitive_video_score' => $skor_video,

        //     'skor_validasi_kepribadianbakatminat' =>  $skor_validasi_kepribadianbakatminat,

        //     'skor_validasi_cognitif' => $skorValidasiCognitif,
        // ]);

        $createMember = penilaianBeo::create([
            'id_user' => $userId,
            'f_sentimen_positif' => $f_sentimen_positif,
            'f_sentimen_netral' => $f_sentimen_netral,
            'f_sentimen_negatif' => $f_sentimen_negatif,
            'v_sentimen' => $v_sentimen,
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
        $command = "python3.10 {$pythonScript} '{$videoFilePath}' 2>&1";
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
        $pythonScriptPath = public_path('dd.py');
        $pythonPath = 'python3.10'; // replace with the correct path to your Python interpreter
        $packageName = 'opencv-python';

        $command = "$pythonPath -m pip show $packageName";
        $output = shell_exec($command);
        dd($output);
        $output = shell_exec("python3.10 $pythonScriptPath 2>&1");  // Capture both stdout and stderr
        dd($output);
        // Extract and clean the score from the output
        $output = trim($output); // Remove leading/trailing whitespace
        $score = intval($output); // Convert to an integer
        // dd($score);
        // Save the score in a session variable
        Session::put('skorVideo', $score);

        $data = banksoalvalidasikepribadian::all();
        return view('testvalidationkepribadian', compact('data'));
    }




    // Fungsi Dari API Controller
    public function signInAPI()
    {
        $client = new Client();

        try {
            $response = $client->request('POST', 'https://backend.beo.inergi.id/signin', [
                'multipart' => [
                    [
                        'name' => 'email',
                        'contents' => 'maxy@email.com'
                    ],
                    [
                        'name' => 'password',
                        'contents' => '123456'
                    ]
                ]
            ]);

            $responseBody = $response->getBody();
            $data = json_decode($responseBody);

            if (isset($data->access_token)) {
                $accessToken = $data->access_token;
                // $audioList = $this->getListOfAudio($accessToken);
                return $data->access_token;
                // dd($audioList);
                // You can use the $accessToken in your application or return it as a response.
            } else {
                // Handle the case where the access token is not present in the response.
                dd('fail');
            }

        } catch (\Exception $e) {
            // Handle exceptions (e.g., network errors or API failures).
        }

        // You can return a view or response here if needed.
    }
    public function getListOfAudio($accessToken)
    {
        $client = new Client();

        try {
            $response = $client->request('POST', 'https://backend.beo.inergi.id/recordlist', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                ],
                'form_params' => [
                    // 'limit' => 5,    // Optional: Adjust based on your needs
                    // 'search' => 'Audio', // Optional: Adjust based on your needs
                    // 'status' => '',  // Optional: Adjust based on your needs
                ]
            ]);

            $responseBody = $response->getBody();
            $data = json_decode($responseBody);
            return json_decode($responseBody, true);
            // dd($data);
            // Handle the response data as needed.
            
            return $data;
        } catch (\Exception $e) {
            // Handle exceptions (e.g., network errors or API failures).
        }
    }
    public function signInAndFilterAudioForRecording($filterString)
    {
        // Obtain the JWT access token
        $accessToken = $this->signInAPI();

        if (!$accessToken) {
            // Handle the case where access token could not be obtained.
        }

        // Get the list of audio and filter by name
        $audioList = $this->getListOfAudio($accessToken);

        // Get the filter string from the request
        $search = $filterString;
        $filteredAudio = collect($audioList['arr_record'])->filter(function ($audio) use ($search) {
            return str_contains($audio['name'], $search);
        });

        // You can now work with the filtered audio data.
        return $filteredAudio;
    }
    public function getRecordingData($filterString)
    {
        $accessToken = $this->signInAPI();
        // $filterString = $filterString;
        $audioList = $this->signInAndFilterAudioForRecording($filterString);
        if ($audioList->isEmpty()) {
            // Handle the case where the filtered list is empty (no matching audio files).
        } else {
            // Get the last audio entry from the filtered list
            $lastAudio = $audioList->last();
    
            // Retrieve the 'id' of the last audio entry
            $lastAudioId = $lastAudio['id'];
    
            // dd($lastAudioId);
            $client = new Client();

            try {
                $response = $client->request('POST', 'https://backend.beo.inergi.id/recordget', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                    ],
                    'form_params' => [
                        'record_id' => $lastAudioId,    // Optional: Adjust based on your needs
                    ]
                ]);

                $responseBody = $response->getBody();
                $data = json_decode($responseBody);
                $arrRecord = $data->record;
                $speakerList = $arrRecord->speaker_list;
                $sentimentScore = $speakerList[0]->sentiment_score;
                // return json_decode($responseBody, true);
                return $sentimentScore;
            } catch (\Exception $e) {
                // Handle exceptions (e.g., network errors or API failures).
            }
        }
        
    }
}
