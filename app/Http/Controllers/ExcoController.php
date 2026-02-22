<?php

namespace App\Http\Controllers;

use App\Models\Exco;
use Illuminate\Http\Request;

class ExcoController extends Controller
{
    public function index() {
        $excos = Exco::all();
        return view('excos.index', compact('excos'));
    }

    public function show(Exco $exco) {
        return view('excos.show', compact('exco'));
    }
}