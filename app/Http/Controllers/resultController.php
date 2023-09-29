<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use PDF; // Import the PDF facade
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class resultController extends Controller
{
    // use PDF;
    public function generatePDF(Request $request)
    {
        // Get the HTML content from the AJAX request
        $htmlContent = $request->input('htmlContent');

        // Generate PDF from the HTML content
        $customPageSize = 'A3'; // You can also specify dimensions like '8.5in x 11in'
        
        // Generate PDF from the HTML content with custom page size
        $pdf = PDF::loadHTML($htmlContent)->setPaper($customPageSize);

        // Generate a unique filename for the PDF
        // $filename = 'example.pdf';

        // Save the PDF to the public folder
        // $pdf->save(public_path($filename));
        // $filedir = public_path($filename);
        // Create a response to serve the saved PDF for download
        // $response = Response::make(file_get_contents(public_path($filename)));
        // $response->header('Content-Type', 'application/pdf');
        // $response->header('Content-Disposition', 'attachment; filename="' . $filename . '"');

        $filename = 'generated_pdf_' . time() . '.pdf';

        // Set the headers to force a download
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        // Output the PDF content directly to the browser
        return response($pdf->output(), 200, $headers);
    }
}
