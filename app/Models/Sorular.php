<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sorular extends Model
{
    protected $table = "sorular";
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
