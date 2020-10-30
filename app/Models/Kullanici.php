<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kullanici extends Authenticatable
{
    use SoftDeletes;
    protected $table = "kullanici";
    protected $fillable = ['adsoyad', 'sifre', 'email', 'yonetici', 'adres', 'telefon', 'aktif'];
    protected $hidden = ['sifre'];
    const DELETED_AT = 'silinme_tarihi';
    public function getAuthPassword()
    {
        return $this->sifre;
    }


}
