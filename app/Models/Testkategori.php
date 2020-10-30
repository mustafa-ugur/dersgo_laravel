<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testkategori extends Model
{
    protected $table = "test_kategori";
    protected $guarded = [];
    public $timestamps = false;

    public function kategoriler()
    {
        return $this->belongsTo('App\Models\Kategoriler', 'kid')->withDefault();
    }

}
