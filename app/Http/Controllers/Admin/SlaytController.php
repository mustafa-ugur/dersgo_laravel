<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slayt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlaytController extends Controller
{
    public function index() {
        $list = Slayt::all();
        return view('admin.slogan.index', compact('list'));
    }

    public function form($id = 0) {
        $item = new Slayt;
        if ($id > 0) {
            $item = Slayt::find($id);
        }
        $slogan = Slayt::all();
        return view('admin.slogan.form', compact('slogan', 'item'));
    }

    public function kaydet($id = 0) {
        $data = request()->only('baslik', 'sayi', 'icon');

        if ($id > 0) {
            $item = Slayt::where('id', $id)->firstOrFail();
            $item->update($data);
        }
        else {
            $item = Slayt::create($data);
        }


        return redirect()->route('admin.slogan.index');
    }
}
