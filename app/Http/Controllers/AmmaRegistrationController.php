<?php

namespace App\Http\Controllers;

use App\Mail\InfaqInstruction;
use App\Mail\WelcomeMember;
use App\Models\Infaq;
use App\Models\Participant;
use App\Models\Program;
use App\Models\Program1Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AmmaRegistrationController extends Controller
{
    public const REQ_MIN_1 = 'required|min:1';
    public function index(Program $program)
    {
        if ($program->id == 1) {
            return view('formregistrasi.amma', [
                'title' => 'Program',
                'program' => $program,
            ]);
        }
        // add if condition after adding new program -> response -> and form
    }

    public function setbatch(Program1Response $response)
    {
        $batch = Program::find(1)->batch->last();
        if (Carbon::now()->format('Y-m-d') <= $batch->closed_date) {
            $response->batch()->associate($batch);
            return $batch;
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Mohon maaf, Program sedang ditutup',
            ]);
        }
    }

    public function sendinfaqmail(Request $request, Program1Response $response)
    {
        if (!is_null($request->infaq) && $request->infaqyn == 'Ya') {
            $infaq = new Infaq();
            $infaq->name = $request->name;
            $infaq->email = $request->email;
            $infaq->phone = $request->phone;
            $infaq->infaq = $request->infaq;
            $infaq->status = 'Pending';
            $infaq->save();
            $response->infaq()->associate($infaq);

            // send mail infaq
            Mail::to($infaq->email)->send(new InfaqInstruction($infaq->name, $infaq->infaq));
        }
    }

    public function seta2(Request $request, Program1Response $response)
    {
        if (!is_null($request->a2) && $request->a1 == 'true') {
            $response->a2 = $request->a2 == 'true' ? true : false;
        }
    }

    public function setc2(Request $request, Program1Response $response)
    {
        if (!is_null($request->c2) && $request->class == 'Offline') {
            $response->c2 = $request->c2;
        }
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'job' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'birth' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'a1' => 'required',
            'b1' => 'required',
            'b2' => AmmaRegistrationController::REQ_MIN_1,
            'class' => 'required',
            'c3' => AmmaRegistrationController::REQ_MIN_1,
            'infaqyn' => 'required',
            'resources' => AmmaRegistrationController::REQ_MIN_1,
            'motivation' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan.',
            ]);
        } else {
            $response = new Program1Response();

            // batch
            $batch = $this->setbatch($response);

            // participant
            $participant = new Participant();
            $participant->name = $request->name;
            $participant->email = $request->email;
            $participant->gender = $request->gender;
            $participant->city = $request->city;
            $participant->birth = Carbon::parse($request->birth);
            $participant->phone = $request->phone;
            $participant->job = $request->job;
            if (!is_null($request->skill)) {
                $participant->skill = $request->skill;
            }
            $participant->save();
            $response->participant()->associate($participant);

            $this->sendinfaqmail($request, $response);

            $response->a1 = $request->a1 == 'true' ? true : false;
            $this->seta2($request, $response);
            $response->b1 = $request->b1 == 'true' ? true : false;
            $response->b2 = $request->b2;
            $response->c1 = $request->class;
            $this->setc2($request, $response);

            $response->c3 = $request->c3;
            $response->resources = $request->resources;
            $response->motivation_target = $request->motivation;
            $response->save();

            // send email welcome
            $welcomemsg = 'Anda telah terdaftar sebagai salah satu peserta dalam program AMMA (Ayo Menghafal dan Memahami Al-Quran) pada Batch yang ke-' . $batch->batch;
            Mail::to($participant->email)->send(new WelcomeMember($participant, $welcomemsg));

            return response()->json([
                'status' => 200,
                'route' => route('success-redirect', ['title' => Hash::make('Amma')]),
                // 'view' => view('success-registration', ['title' => 'Pendaftaran Berhasil', 'desc' => 'Informasi selanjutnya telah kami kirimkan melalui email.'])->render(),
                'message' => 'Pendaftaran Berhasil!',
            ]);
        }
    }
}
