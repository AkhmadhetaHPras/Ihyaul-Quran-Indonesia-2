<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Mail\ThankYouPayment;
use App\Models\Infaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class InfaqController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $infaqs = Infaq::where('status', 'Lunas');

            return DataTables::of($infaqs)
                ->make(true);
        }
        return view('admin.infaq', ['title' => 'Infaq']);
    }

    public function incoming(Request $request)
    {
        if ($request->ajax()) {
            $infaqs = Infaq::where('status', 'Pending');

            return DataTables::of($infaqs)
                ->make(true);
        }
        return view('admin.infaq-incoming', ['title' => 'Infaq Masuk']);
    }

    public function confirmation($id)
    {
        $infaq = Infaq::find($id);
        $infaq->status = 'Lunas';
        if ($infaq->save()) {
            Mail::to($infaq->email)->send(new ThankYouPayment($infaq->name, $infaq->infaq));
            return response()->json([
                'status' => 200,
                'pesan' => 'Infaq berhasil dikonfirmasi. Terima kasih!'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'pesan' => 'Terjadi kesalahan.',
            ]);
        }
    }
}
