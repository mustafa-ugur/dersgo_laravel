<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sss extends Model
{
    protected $table = "sss";
    protected $guarded = [];
    public $timestamps = false;

    public function kategoriler()
    {
        return $this->belongsTo('App\Models\Kategoriler', 'kid')->withDefault();
    }

}
