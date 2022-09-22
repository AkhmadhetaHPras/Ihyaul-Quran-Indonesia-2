<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $participants = Participant::all();

            return DataTables::of($participants)
                ->addColumn('age', function ($participant) {
                    return Carbon::parse($participant->birth)->age;
                })
                ->make(true);
        }
        return view('admin.participant', ['title' => 'Pendaftar']);
    }
}
