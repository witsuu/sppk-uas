<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table="nilai";

    protected $fillable=[
        'id_pegawai','C1','C2','C3','C4','C5'
    ];
}
