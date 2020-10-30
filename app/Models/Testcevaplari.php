<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testcevaplari extends Model
{
    protected $table = "test_cevaplari";
    protected $guarded = [];
    public $timestamps = false;

    public function cevap_kat()
    {
        return $this->belongsTo('App\Models\Testkategori', 'test_id')->withDefault();
    }

}
