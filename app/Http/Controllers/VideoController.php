<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class VideoController extends Controller
{
    public function saveRecordedVideo(Request $request)
    {
        
        // Validate and store the uploaded video in the public/videos folder
        $video = $request->file('recorded_video');

        $userId = session('user_id');
        // Define the path where you want to save the video
        $userVideoDirectory = public_path('videos/' . $userId);
        if (!file_exists($userVideoDirectory)) {
            // Create the user's directory if it doesn't exist
            mkdir($userVideoDirectory, 0777, true);
        }
        $i = 1;
        do {
            $videoName = 'video' . $i . '.webm';
            $videoPath = $userVideoDirectory . '/' . $videoName;
            $i++;
        } while (file_exists($videoPath));
        file_put_contents($videoPath, file_get_contents($video));


        // Write the video content to the specified path
        file_put_contents($videoPath, file_get_contents($video));

        //return response()->json(['message' => 'Video saved successfully']);
    }

    public function processSelectedVideo(Request $request)
    {
        
        // Get the user's ID (assuming you have it stored in the session)
        $userId = session('user_id');
        //dd($userId);
        // Define the path to the user's video directory
        $userVideoDirectory = public_path('videos' . DIRECTORY_SEPARATOR . $userId);
        //dd($userVideoDirectory);
        // Get a list of video files in the user's directory
        $videoFiles = Storage::disk('public')->files('videos'  . DIRECTORY_SEPARATOR . $userId);
        //dd( $videoFiles);
        // Select a video file to process (you can implement your logic to choose one)
        // For example, you can select the first video file in the list
        $videoFile = $videoFiles[0]; // Change this to your logic
       
        // Construct the full path to the selected video file
        $videoFilePath = $userVideoDirectory  . DIRECTORY_SEPARATOR . basename($videoFile);
        //dd($videoFilePath);
        // dd("Something");
        // Call the function to process the selected video
        $pythonData = $this->processVideoWithPython($videoFilePath);
        // dd($pythonData);
        // Return the result as a response
        return response()->json(['data' => $pythonData]);
    }

    // Function to process the selected video with Python
    private function processVideoWithPython($videoFilePath)
    {
        // Call your Python script and pass the video file path as an argument
        //$pythonScript = public_path('asesmen.py'); //public/python ya bisa
        $pythonScript = base_path('public\asesmen.py');
        //dd($videoFilePath);
        $command = "python {$pythonScript} '{$videoFilePath}'";
        //dd($command);
        $output = exec($command);
        dd($output);
        $pythonData = $output;
        return $pythonData;
        
    }
}
