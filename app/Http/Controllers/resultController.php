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
        set_time_limit(360);
        // Get the HTML content from the AJAX request
        $htmlContent = $request->input('htmlContent');

        // Generate PDF from the HTML content
        $customPageSize = 'A3'; // You can also specify dimensions like '8.5in x 11in'

        // Generate PDF from the HTML content with custom page size
        $pdf = PDF::loadHTML($htmlContent)->setPaper($customPageSize);

        // Specify the subdirectory where you want to save the PDF
        $subdirectory = 'pdf/';

        // Generate a unique filename for the PDF
        $filename = $subdirectory . 'example.pdf';

        // Save the PDF to the public/pdf subdirectory
        $pdf->save(public_path($filename));

        // Create a response to serve the saved PDF for download
        $filename = 'generated_pdf_' . time() . '.pdf';

        // Set the headers to force a download
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        // Output the PDF content directly to the browser
        return response($pdf->output(), 200, $headers);
    }


    public function downloadPDF()
    {
        // Define the directory where PDF files are stored
        $pdfDirectory = public_path('pdf');

        // Get all PDF files in the directory
        $pdfFiles = glob($pdfDirectory . '/*.pdf');

        // Sort the files by modification time to get the latest one
        usort($pdfFiles, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        if (count($pdfFiles) > 0) {
            // Get the path of the latest PDF file
            $latestPdfFile = $pdfFiles[0];

            // Extract the filename from the path
            $filename = pathinfo($latestPdfFile, PATHINFO_BASENAME);

            // Download the latest PDF file and delete it after sending
            return response()->download($latestPdfFile, $filename)->deleteFileAfterSend(true);
        } else {
            // Handle the case where no PDF files exist in the directory
            abort(404);
        }
    }

}
