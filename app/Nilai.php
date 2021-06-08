<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Nilai extends Model
{
    protected $table="nilai";

    protected $fillable=[
        'pegawai_id','C1','C2','C3','C4','C5'
    ];

    public static function maxValue($select){
        $value = DB::table('nilai')->select($select)->get();

        return $value->max();
    }
}
