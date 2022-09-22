<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuccessRedirectController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Hash::check('Amma', $request->title)) {
            return view('success-registration', ['title' => 'Pendaftaran Berhasil', 'desc' => 'Informasi selanjutnya telah kami kirimkan melalui email (spam).']);
        } else {
            return redirect('not-found');
        }
    }
}
