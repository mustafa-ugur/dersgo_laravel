<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YildizController extends Controller
{
    public function index() {
        return view('admin.yildiz.index');
    }
}
