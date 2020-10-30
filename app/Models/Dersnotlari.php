<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dersnotlari extends Model
{
    protected $table = "ders_notlari";
    protected $guarded = [];
    public $timestamps = false;

    public function kategoriler()
    {
        return $this->belongsTo('App\Models\Kategoriler', 'kid')->withDefault();
    }

    public function uye_adi()
    {
        return $this->belongsTo('App\Models\Kullanici', 'uye_id')->withDefault();
    }

}
