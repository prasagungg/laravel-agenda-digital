<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'news', 'picture', 'keterangan', 'tgl_awal', 'tgl_akhir'
    ];
}
