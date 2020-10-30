<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testler extends Model
{
    protected $table = "testler";
    protected $guarded = [];
    public $timestamps = false;

    public function kategoriler()
    {
        return $this->belongsTo('App\Models\Testkategori', 'kid')->withDefault();
    }

}
