<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banksoalvalidasikepribadian;


class banksoalvalidasikepribadianController extends Controller
{
    // Create a new question
    public function index()
    {
        $questions = banksoalvalidasikepribadian::all();
        return view('insertBankSoal', compact('questions'));
    }
    public function create()
    {
        return view('insertBankSoal');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'pertanyaan' => 'required',
            'tipe' => 'required',
            'answer1' => 'nullable', // Not required
            'answer2' => 'nullable', // Not required
            'answer3' => 'nullable', // Not required
            'answer4' => 'nullable', // Not required
            'answer5' => 'nullable', // Not required
            'value1' => 'integer|nullable', // Integer but not required
            'value2' => 'integer|nullable', // Integer but not required
            'value3' => 'integer|nullable', // Integer but not required
            'value4' => 'integer|nullable', // Integer but not required
            'value5' => 'integer|nullable', // Integer but not required
        ]);

        $createSoal = banksoalvalidasikepribadian::create([
            'pertanyaan' => $validate['pertanyaan'],
            'tipe' => $validate['tipe'],
            'jawaban1' => $validate['answer1'],
            'jawaban2' => $validate['answer2'],
            'jawaban3' => $validate['answer3'],
            'jawaban4' => $validate['answer4'],
            'jawaban5' => $validate['answer5'],

            'value1' => $validate['value1'],
            'value2' => $validate['value2'],
            'value3' => $validate['value3'],
            'value4' => $validate['value4'],
            'value5' => $validate['value5'],

            'tipe' => $validate['tipe'],

        ]);

        return redirect()->route('insert-question');
    }

    // Read a specific question
    public function show($id)
    {
        $question = banksoalvalidasikepribadian::find($id);
        return view('questions.show', compact('question'));
    }

    // Update a question
    public function update(Request $request, $id)
    {
        banksoalvalidasikepribadian::find($id)->update($request->all());
        return redirect()->route('questions.index');
    }

    // Delete a question
    public function destroy(Request $request)
    {
        $id_Soal = $request->input('question_id'); // Use the correct field name
        // Find the question by id_Soal and delete it
        $question = Banksoalvalidasikepribadian::find($id_Soal); // Use the correct model name

        if (!$question) {
            return redirect()->route('insert-question')->with('error', 'Question not found');
        }

        $question->delete();

        return redirect()->route('insert-question')->with('success', 'Question deleted successfully');
    }
    public function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);
    
        $file = $request->file('csv_file');
    
        // try {
        $csvData = array_map('str_getcsv', file($file));
        array_shift($csvData); // Remove the header row
        // dd($csvData[0]);
        foreach ($csvData as $row) {
            $rowValues = explode(';', $row[0]);
            $createSoal = banksoalvalidasikepribadian::create([
                'pertanyaan' => $rowValues[0],
                'tipe' => $rowValues[11],
                'jawaban1' => $rowValues[1],
                'jawaban2' => $rowValues[2],
                'jawaban3' => $rowValues[3],
                'jawaban4' => $rowValues[4],
                'jawaban5' => $rowValues[5],
                'value1' => $rowValues[6],
                'value2' => $rowValues[7],
                'value3' => $rowValues[8],
                'value4' => $rowValues[9],
                'value5' => $rowValues[10],
            ]);
        }

        return redirect()->route('insert-question')->with('success', 'CSV data has been imported.');
        // } catch (\Exception $e) {
        //     return redirect()->route('insert-question')->with('error', 'Error importing CSV data: ' . $e->getMessage());
        // }
    }

    public function getAllData(Request $request){
        $data = banksoalvalidasikepribadian::all();
        return view('testvalidationkepribadian', compact('data'));
    }

    public function writeCSV() {
        // Data to be written to the CSV file
        $data = banksoalvalidasikepribadian::all();
    
        // File path where you want to save the CSV file
        $filePath = public_path('testcsv.csv');
    
        // Open the CSV file for writing
        $file = fopen($filePath, 'w');
    
        // Write the CSV header
        fputcsv($file, ['id', 'Question', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 'Answer5', 'Value1', 'Value2', 'Value3', 'Value4', 'Value5', 'Type', 'updated_at', 'created_at']);
    
        // Write the data to the CSV file
        foreach ($data as $item) {
            $row = [
                $item->id_Soal,
                $item->pertanyaan,
                $item->jawaban1,
                $item->jawaban2,
                $item->jawaban3,
                $item->jawaban4,
                $item->jawaban5,
                $item->value1,
                $item->value2,
                $item->value3,
                $item->value4,
                $item->value5,
                $item->tipe,
                $item->updated_at,
                $item->created_at
            ];
            fputcsv($file, $row);
        }
    
        // Close the file
        fclose($file);
    
        return "CSV file created successfully!";
    }
    
}
