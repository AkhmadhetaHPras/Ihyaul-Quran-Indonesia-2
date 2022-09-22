<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'subject' => 'required|min:4',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'pesan' => 'Terjadi kesalahan.',
            ]);
        } else {
            $adminmail = env('MAIL_FROM_ADDRESS', 'akhmadheta097@gmail.com');
            Mail::to($adminmail)->send(new ContactUs($request->subject, $request->email, $request->name, $request->message));
            return response()->json([
                'status' => 200,
                'pesan' => 'Terimakasih telah menghubungi kami!'
            ]);
        }
    }
}
