<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = [
        'nama','nip','golongan','jabatan','pangkat'
    ];

    public function nilai(){
        return $this->hasOne(Nilai::class);
    }
}
