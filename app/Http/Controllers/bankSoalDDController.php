<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bankSoalDD;

class bankSoalDDController extends Controller
{
    public function index()
    {
        $questions = bankSoalDD::all();
        return view('insertBankSoalDD', compact('questions'));
    }
}
