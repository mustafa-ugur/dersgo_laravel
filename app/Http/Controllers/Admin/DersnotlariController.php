<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DersnotlariController extends Controller
{
    public function index() {
        return view('admin.ders_notlari.index');
    }
}
