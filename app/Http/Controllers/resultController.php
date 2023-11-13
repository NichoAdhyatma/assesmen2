<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Dompdf\Dompdf;
// use Dompdf\Options;
use PDF;
use Barryvdh\Snappy\Facades\SnappyPdf;



class resultController extends Controller
{
    // use PDF;
    public function generatePDF(Request $request)
    {
        set_time_limit(300);
        $htmlContent = $request->input('htmlContent');

        $customPageSize = 'A3'; // You can specify other page sizes

        $pdf = SnappyPdf::loadHTML($htmlContent)
            ->setOption('page-size', $customPageSize);

        // Specify the filename for the generated PDF
        $filename = 'pdf/generated_pdf_' . date('Y-m-d-H-i-s') . '.pdf';

        // Save the PDF to a directory
        $pdf->save(public_path($filename));
        return response()->json(['success' => 'PDF generated and ready for download', 'filename' => $filename]);
        // Optionally, you can return the PDF as a response for download:
        // return response()->download(public_path($filename));
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


    public function save(Request $request) {
        $imgData = $request->input('imageData');
        
        $img = str_replace('data:image/png;base64,', '', $imgData);
        $img = base64_decode($img);
        
        $fileName = 'screenshot.png'; // You can define a custom name or use a timestamp.
        $filePath = public_path($fileName);

        if (file_exists($filePath)) {
            unlink($filePath); // Delete the existing file if it exists.
        }

        file_put_contents($filePath, $img);
        
        return response()->download($filePath, 'screenshot.png', ['Content-Type' => 'image/png']);
    }


    public function convertImageToPdf()
    {

        $imgData = file_get_contents(public_path('screenshot.png'));
        $img = str_replace('data:image/png;base64,', '', $imgData);
        $img = base64_decode($img);

        // dd($imgData);

        PDF::loadHTML('<img src="data:image/png;base64,' . base64_encode($img) . '">')->setPaper('a4')->save(public_path('ss.pdf'));
        return response()->json(['message' => 'berhasil']);

        
        ini_set('memory_limit', '256M');
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);

        // Load HTML content with an embedded image
        $imagePath = public_path('screenshot.png'); // Change to lowercase 'png'
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/png;base64,' . $imageData;

        $html = '<img src="' . $imageSrc . '">';

        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Save the PDF to the public directory
        $pdfOutput = $dompdf->output();
        $pdfPath = public_path('output.pdf');
        file_put_contents($pdfPath, $pdfOutput);

        // If you want to return the PDF as a download response
        return response()->download($pdfPath, 'output.pdf');
    }

    public function generatePDFfromBlade()
    {
    	$pdf = PDF::loadView('pdf.image_to_pdf', [
    		'title' => 'codesolutionstuff.com Laravel Pdf with Image Example',
    		'description' => 'This is an example Laravel pdf with Image tutorial.',
    		'footer' => 'by <a href="https://www.codesolutionstuff.com/">codesolutionstuff.com</a>'
    	]);
    
        return $pdf->download('sample-with-image.pdf');
    }

    public function downloadCsv()
    {
        $filePath = public_path('csv/csvKep/csvKep.csv'); // Path to your CSV file

        if (file_exists($filePath)) {
            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filePath, 'csvKep.csv', $headers);
        } else {
            // Handle file not found
            return response('File not found.', 404);
        }
    }

}
