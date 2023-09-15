<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'id_user',
        'f_sentimen_positif',
        'f_sentimen_netral',
        'f_sentimen_negatif',
        'v_sentimen_positif',
        'v_sentimen_netral',
        'v_sentimen_negatif',
        'skor_validasi',
        'kepercayaan',

        'cognitive_video_score',
        'skor_validasi_kepribadianbakatminat',
        'skor_validasi_cognitif',
    ];
}
