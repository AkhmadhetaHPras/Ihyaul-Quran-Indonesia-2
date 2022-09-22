<?php

namespace App\Http\Controllers;

use App\Mail\InfaqInstruction;
use App\Models\Infaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InfaqController extends Controller
{

    public function index()
    {
        return view('infaq', ['title' => 'Infaq']);
    }

    public function infaq(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'infaq' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'pesan' => 'Terjadi kesalahan.',
            ]);
        } else {
            $infaq = new Infaq();
            $infaq->name = $request->name;
            $infaq->email = $request->email;
            $infaq->phone = $request->phone;
            $infaq->infaq = $request->infaq;
            $infaq->status = 'Pending';
            if ($infaq->save()) {
                Mail::to($infaq->email)->send(new InfaqInstruction($infaq->name, $infaq->infaq));
                return response()->json([
                    'status' => 200,
                    'pesan' => 'Terimakasih, infaq berhasil dilakukan. Semoga selalu dilimpahkan rahmat oleh Nya! Informasi selanjutnya cek pada email (spam)'
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'pesan' => 'Terjadi kesalahan.',
                ]);
            }
        }
    }
}
