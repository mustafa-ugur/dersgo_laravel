<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sepeturun extends Model
{
    use SoftDeletes;
    protected $table = "sepet_urun";
    protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';

    public function urun()
    {
        return $this->belongsTo('App\Models\Dersnotlari');
    }

}


