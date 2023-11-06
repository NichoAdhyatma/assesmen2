<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    // BEO API Voice Sentiment
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

    public function addAudio(Request $request)
    {   
        $client = new Client();
        // dd(date_default_timezone_get());
        // Replace 'YOUR_JWT_TOKEN' with the actual JWT token.
        $accessToken = $this->signInAPI();
        // dd($accessToken);
        $personalityList = [
            'Extraversion', 'Conscientiousness', 'Agreeableness', 'Openness', 'Neuroticism', 'Realistic', 'Investigative', 'Artistic', 'Social', 'Enterprising', 'Conventional', 'Perseptual', 'Psikomotor', 'Intelektual',
        ];
        $firstPersonality = $personalityList[0]; // Assuming you want the first personality.
        // $userId = 11;
        $userId = session('user_id');
        // Build the file path based on the user's ID and the first personality.
        $audioFilePath = public_path('audios/' . $userId . '/' . $firstPersonality);
        $audioFiles = glob($audioFilePath . '/*.wav'); // Adjust the file extension as needed.

        if (file_exists($audioFilePath) && !empty($audioFiles)) {
            $firstAudioFile = $audioFiles[0];
            // dd($firstAudioFile);
            try {
                $response = $client->request('POST', 'https://backend.beo.inergi.id/recordadd', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                    ],
                    'multipart' => [
                        [
                            'name' => 'type',
                            'contents' => 'upload', // Optional: Adjust based on your needs
                        ],
                        [
                            'name' => 'name',
                            'contents' => 'Sample Audio',
                        ],
                        [
                            'name' => 'description',
                            'contents' => 'Test Audio', // Optional: Adjust based on your needs
                        ],
                        [
                            'name' => 'audio',
                            'contents' => fopen($firstAudioFile, 'r'),
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

                // Handle the API response here.
            } catch (\Exception $e) {
                // dd($e);
                return $e;
            }
        } else {
            dd('gaketemu');
        }

        // if (file_exists($audioFilePath)) {
        //     try {
        //     $firstAudioFile = $audioFiles[0];
        //     // dd($audioFiles[0]);
        //     $response = Http::withToken($accessToken)
        //         ->withHeaders([
        //             'Authorization' => 'Bearer ' . $accessToken,
        //         ])
        //         ->attach('audio', file_get_contents($firstAudioFile))
        //         ->post('https://backend.beo.inergi.id/recordadd', [
        //             'type' => 'upload',
        //             'name' => 'CobaAudio',
        //             'description' => 'Meetingharisenin', // Optional: Adjust based on your needs
        //             // 'audio' => file_get_contents($firstAudioFile),
        //             'num_speakers' => '0',
        //             'noise_cancel' => 'false'
        //         ]);
        //     } catch (GuzzleHttp\Exception\RequestException $e) {
        //         // Handle the exception.
        //         $response = $e->getResponse();
                
        //         if ($response) {
        //             // Check the response headers and handle the issue.
        //             $headers = $response->getHeaders();
        //             // Additional handling logic here.
        //         } else {
        //             // Handle the case where there is no response.
        //             // This could indicate a network or server problem.
        //         }
        //     }
        //     dd($response);
        //     if ($response->successful()) {
        //         $data = $response->json();
        //         // Handle the response data as needed.
        //     } else {
        //         dd("FAIL");
        //     }
        // } else {
        //     dd("Unfound");
        // }
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

    public function signInAndFilterAudio(Request $request)
    {
        // Obtain the JWT access token
        $accessToken = $this->signInAPI();

        if (!$accessToken) {
            // Handle the case where access token could not be obtained.
        }

        // Get the list of audio and filter by name
        $audioList = $this->getListOfAudio($accessToken);

        // Get the filter string from the request
        $filterString = $request->input('filterString');

        $filteredAudio = collect($audioList['arr_record'])->filter(function ($audio) use ($filterString) {
            return str_contains($audio['name'], $filterString);
        });

        // You can now work with the filtered audio data.
        return response()->json(['filtered_audio' => $filteredAudio]);
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


    public function getRecordingData(Request $request)
    {
        $accessToken = $this->signInAPI();
        $filterString = $request->input('filterString');
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
                // dd($sentimentScore);
                // return json_decode($responseBody, true);
                return $sentimentScore;
            } catch (\Exception $e) {
                // Handle exceptions (e.g., network errors or API failures).
            }
        }

    }
}
