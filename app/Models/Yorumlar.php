<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yorumlar extends Model
{
    protected $table = "yorumlar";
    protected $guarded = [];
    public $timestamps = false;

    public function yorumlar()
    {
        return $this->belongsTo('App\Models\Dersnotlari', 'ders_id')->withDefault();
    }

    public function uye_adi()
    {
        return $this->belongsTo('App\Models\Kullanici', 'uye_id')->withDefault();
    }

}
