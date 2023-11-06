<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bankSoalValidasiCognitive;

class bankSoalValidasiCognitiveController extends Controller
{
    public function index()
    {
        $questions = bankSoalValidasiCognitive::all();
        return view('insertBankSoalCognitive', compact('questions'));
    }
    public function create()
    {
        return view('insertBankSoal');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'pertanyaan' => 'required',
            'answer1' => 'required', // Not required
            'answer2' => 'required', // Not required
            'answer3' => 'required', // Not required
            'answer4' => 'required', // Not required
            'answer_correct' => 'required', // Not required
            'kesulitan' => 'required',
          
        ]);
        // dd($validate);
        $createSoal = bankSoalValidasiCognitive::create([
            'pertanyaan' => $validate['pertanyaan'],
            'jawaban1' => $validate['answer1'],
            'jawaban2' => $validate['answer2'],
            'jawaban3' => $validate['answer3'],
            'jawaban4' => $validate['answer4'],
            'jawaban_benar' => $validate['answer_correct'],
            'kesulitan' => $validate['kesulitan'],

        ]);

        return redirect()->route('insert-question-cognitive');
    }

    // Read a specific question
    public function show($id)
    {
        $question = bankSoalValidasiCognitive::find($id);
        return view('questions.show', compact('question'));
    }

    // Update a question
    public function update(Request $request, $id)
    {
        bankSoalValidasiCognitive::find($id)->update($request->all());
        return redirect()->route('questions.index');
    }

    // Delete a question
    public function destroy(Request $request)
    {
        $id_Soal = $request->input('question_id'); // Use the correct field name
        // Find the question by id_Soal and delete it
        $question = bankSoalValidasiCognitive::find($id_Soal); 

        if (!$question) {
            return redirect()->route('insert-question-cognitive')->with('error', 'Question not found');
        }

        $question->delete();

        return redirect()->route('insert-question-cognitive')->with('success', 'Question deleted successfully');
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
            $createSoal = bankSoalValidasiCognitive::create([
                'pertanyaan' => $rowValues[0],
                'jawaban1' => $rowValues[1],
                'jawaban2' => $rowValues[2],
                'jawaban3' => $rowValues[3],
                'jawaban4' => $rowValues[4],
                'jawaban_benar' => $rowValues[5],
                'kesulitan' => $rowValues[6],
            ]);
        }
    }
}
