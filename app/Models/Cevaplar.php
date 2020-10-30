<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cevaplar extends Model
{
    protected $table = "cevaplar";
    protected $guarded = [];
    public $timestamps = false;

    public function sorular()
    {
        return $this->belongsTo('App\Models\Sorular', 'soru_id')->withDefault();
    }

    public function uye_adi()
    {
        return $this->belongsTo('App\Models\Kullanici', 'uye_id')->withDefault();
    }

}
