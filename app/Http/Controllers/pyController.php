<?php

// app/Http/Controllers/MyController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

class pyController extends Controller
{
    public function index()
    {
        // Adjust the path to your script based on your project structure
        $scriptPath = base_path('public/my_python_script.py');

        // Execute the Python script and capture its output
        $output = exec('python "'.$scriptPath.'" 2>&1', $outputArray, $returnValue);

        // Check if the script executed successfully
        if ($returnValue === 0) {
            // Parse the JSON output into a PHP array
            $pythonData = json_decode($output, true);

            // Check if parsing was successful
            if ($pythonData !== null) {
                // Pass the variables to the Blade view
                return View::make('pyview')->with('pythonData', $pythonData);
            } else {
                return "Error: Failed to parse JSON from Python script.";
            }
        } else {
            // Handle the case where the script encountered an error
            return "Python script encountered an error: $output";
        }
    }
}

?>