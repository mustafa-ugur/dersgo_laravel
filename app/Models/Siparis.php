<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siparis extends Model
{
    use SoftDeletes;
    protected $table = "siparis";
    protected $fillable = ['sepet_id', 'uye_id', 'siparis_tutari', 'adsoyad', 'email', 'ceptelefon', 'adres', 'banka', 'taksit_sayisi', 'durum', 'iptal'];
    //protected $guarded = [];
    const DELETED_AT = 'silinme_tarihi';

    public function sepet()
    {
        return $this->belongsTo('App\Models\Sepet');
    }
}
