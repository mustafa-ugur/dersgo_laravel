<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    protected $table = "kategoriler";
    protected $guarded = [];
    public $timestamps = false;

    public function alt_kategoriler()
    {
        return $this->hasMany('App\Models\Kategoriler', 'ustu', 'id');
    }

    public function ust_kategori() {
        return $this->belongsTo('App\Models\Kategoriler', 'ustu');
    }
}
