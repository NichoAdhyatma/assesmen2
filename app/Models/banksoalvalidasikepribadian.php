<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banksoalvalidasikepribadian extends Model
{
    use HasFactory;

    protected $table = 'banksoalvalidasi';
    protected $primaryKey = 'id_Soal'; // Specify the primary key column

    protected $fillable = [
        'pertanyaan',
        'jawaban1',
        'jawaban2',
        'jawaban3',
        'jawaban4',
        'jawaban5',
        'value1',
        'value2',
        'value3',
        'value4',
        'value5',
        'tipe',
    ];
}
