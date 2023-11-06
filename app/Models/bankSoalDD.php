<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bankSoalDD extends Model
{
    use HasFactory;

    protected $table = 'banksoaldd';
    protected $primaryKey = 'id_soal'; // Specify the primary key column

    protected $fillable = [
        'pertanyaan',
        'jawaban1',
        'jawaban2',
        'jawaban3',
        'jawaban4',
        'jawaban_benar',
        'kesulitan', //0 Untuk Mudah, 1 Untuk Sedang, 2 Untuk Susah
        'tipe',
    ];
}
