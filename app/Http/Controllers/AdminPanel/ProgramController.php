<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Program;
use App\Models\Program1Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $programs = Program::with('batch');

            return DataTables::of($programs)
                ->addColumn('batch', function ($program) {
                    return $program->batch->last();
                })
                ->addColumn('response', function ($program) {
                    return $program->response()->where('batch', $program->batch->last()->batch)->count();
                })
                ->make(true);
        }
        return view('admin.program', ['title' => 'Program']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.program-add', ['title' => 'Program Tambah']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax() && $id == 1) {
            $responses = Program1Response::with('participant', 'infaq', 'batch');

            return DataTables::of($responses)
                ->addColumn('participant', function ($response) {
                    return $response->participant;
                })
                ->addColumn('gender', function ($response) {
                    return $response->participant->gender;
                })
                ->addColumn('contact', function ($response) {
                    return $response->participant->email;
                })
                ->addColumn('age', function ($response) {
                    return Carbon::parse($response->participant->birth)->age;
                })
                ->addColumn('name', function ($response) {
                    return $response->participant->name;
                })
                ->addColumn('infaq', function ($response) {
                    return $response->infaq;
                })
                ->addColumn('batch', function ($response) {
                    return $response->batch->batch;
                })
                ->make(true);

            // add if condition in this block every adding new program to retrive response datatable
        }
        if ($id == 1) {
            $program = Program::find($id);
            return view('admin.program-detail', [
                'title' => 'Program',
                'program' => $program
            ]);
        }
        // add if condition in this block every adding new program to retrive response datatable
    }

    public function showBatch($id)
    {
        if ($id == 1) {
            $batches = Batch::where('program_id', 1);

            return DataTables::of($batches)
                ->make(true);
        }
        // add if condition in this block every adding new program to retrive response datatable
    }


    public function addBatch(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'closed_date' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Tanggal penutupan batch harus diisi.',
            ]);
        } else {
            $program = Program::find($id);
            $program->status = 'Dibuka';
            $program->save();

            $batch = new Batch();
            $batch->batch = $program->batch->last()->batch + 1;
            $batch->program()->associate($program);
            $batch->closed_date = Carbon::parse($request->closed_date);
            $batch->save();
            return response()->json([
                'status' => 200,
                'message' => 'Batch berhasil dibuat.'
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required|min:1',
            'concept' => 'required',
            'requirement' => 'required',
            'superiority' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan.',
            ]);
        } else {
            $program = Program::find($id);
            if ($request->status == 'Ditutup' && $program->status == 'Dibuka') {
                $program->status = 'Ditutup';
                $program->batch->last()->closed_date = Carbon::now();
            } else if ($request->status == 'Dibuka' && $program->status == 'Ditutup') {
                $program->status = 'Dibuka';
                $program->batch->last()->closed_date = Carbon::parse($program->batch->last()->closed_date)->addDays(7);
            }
            $program->title = $request->title;
            $program->concept = $request->concept;
            $program->requirement = $request->requirement;
            $program->superiority = $request->superiority;
            $program->save();

            return response()->json([
                'status' => 200,
                'message' => 'Data program berhasil diupdate. Mohon menunggu, halaman akan termuat ulang secara otomatis',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Program::find($id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Program berhasil dihapus.',
        ]);
    }

    public function open($id)
    {
        $program = Program::find($id);
        $program->status = 'Dibuka';
        $program->save();

        $batch = $program->batch->last();
        $batch->closed_date = Carbon::parse($batch->closed_date)->addDays(7);
        $batch->save();
        return response()->json([
            'status' => 200,
            'message' => 'Program berhasil dibuka.',
        ]);
    }

    public function close($id)
    {
        $item = Program::find($id);
        $item->status = 'Ditutup';
        $item->batch->last()->closed_date = Carbon::now();
        $item->save();
        return response()->json([
            'status' => 200,
            'message' => 'Program berhasil ditutup.',
        ]);
    }
}
