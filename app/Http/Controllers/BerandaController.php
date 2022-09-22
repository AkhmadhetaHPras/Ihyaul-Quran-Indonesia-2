<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function  __invoke()
    {
        $amma = Program::find(1);
        return view('home', [
            'title' => 'Beranda',
            'amma' => $amma,
        ]);
    }
}
