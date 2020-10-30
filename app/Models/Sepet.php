<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Sepet extends Model
{
    use SoftDeletes;
    protected $table = "sepet";
    protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';

    public function siparis()
    {
        return $this->hasOne('App\Models\Siparis');
    }

    public function sepet_urunler()
    {
        return $this->hasMany('App\Models\Sepeturun');
    }

    public function sepet_urun_adet()
    {
        return DB::table('sepet_urun')->where('sepet_id', $this->id)->sum('adet');
    }


}
