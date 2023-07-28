<?php

namespace App\Http\Controllers;

use App\Models\DiagnosaQuestion;
use App\Models\DiagnosaResult;
use App\Models\Disease;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::guest()) {
                Redirect::to("/")->send();
            }

            if (Auth::user()->role != 'patient') {
                Redirect::to("/keluar")->send();
            }

            return $next($request);
        });
    }
    public function home()
    {
        $patient = Patient::where('user_id', Auth::id())->first();
        $diseases = Disease::all();
        return view('patient.home', ['patient' => $patient, 'diseases' => $diseases]);
    }

    public function profile(Request $request)
    {
        $patient = Patient::where('user_id', Auth::id())->first();
        if ($request->method() == 'GET') {
            return view('patient.profile', ['patient' => $patient]);
        } elseif ($request->method() == 'POST') {
            $user = User::where('user_id', Auth::id())->first();
            $patient = Patient::where('user_id', $user->user_id)->first();

            $user->email = $request->email;
            if ($request->password != null) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $patient->name = $request->name;
            $patient->gender = $request->gender;
            $patient->address = $request->address;
            $patient->save();

            return back()->with('success', 'Data anda berhasil diubah!');
        }
    }

    public function diagnosa(Request $request)
    {
        $patient = Patient::where('user_id', Auth::id())->first();
        if ($request->method() == 'GET') {
            $diagnosaQuestions = DiagnosaQuestion::all();
            return view('patient.diagnosa', ['patient' => $patient, 'diagnosaQuestions' => $diagnosaQuestions]);
        } else if ($request->method() == 'POST') {
            $diagnosaResult = new DiagnosaResult();
            $diagnosaResult->patient_id = $patient->patient_id;
            $diagnosaResult->disease_id = '?';
            $diagnosaResult->answer_1 = $request->question_1;
            $diagnosaResult->answer_2 = $request->question_2;
            $diagnosaResult->answer_3 = $request->question_3;
            $diagnosaResult->answer_4 = $request->question_4;
            $diagnosaResult->answer_5 = $request->question_5;
            $diagnosaResult->answer_6 = $request->question_6;
            $diagnosaResult->answer_7 = $request->question_7;
            $diagnosaResult->answer_8 = $request->question_8;
            $diagnosaResult->date = Carbon::now();

            // Logika diagnosis
            $found = false;
            $questionIndex = 1;

            while (!$found) {
                $questionData = DiagnosaQuestion::find($questionIndex);
                $questionAnswer = $_REQUEST['question_' . $questionIndex];

                if ($questionAnswer == '1') {
                    if ($questionData->yes_to == '0') {
                        $diagnosaResult->disease_id = $questionData->yes_diagnosa;
                        $found = true;
                    } else {
                        $questionIndex = $questionData->yes_to;
                    }
                }

                if ($questionAnswer == '0') {
                    if ($questionData->no_to == '0') {
                        $diagnosaResult->disease_id = $questionData->no_diagnosa;
                        $found = true;
                    } else {
                        $questionIndex = $questionData->no_to;
                    }
                }
            }

            $diagnosaResult->save();
            return redirect('/patient/diagnosa/' . $diagnosaResult->diagnosa_result_id . '/detail');
        }
    }

    public function diagnosaList() {
        $patient = Patient::where('user_id', Auth::id())->first();
        $diagnosaResults = DiagnosaResult::with(['patient', 'disease'])->where('patient_id', $patient->patient_id)->get();
        return view('patient.diagnosa-list', ['patient' => $patient, 'diagnosaResults' => $diagnosaResults]);

    }

    public function diagnosaDetail($id) {
        $patient = Patient::where('user_id', Auth::id())->first();
        $result = DiagnosaResult::find($id);
        $diagnosaQuestions = DiagnosaQuestion::all();
        $disease = Disease::find($result->disease_id);

        if($patient->patient_id != $result->patient_id) {
            return redirect('/patient/home');
        }

        return view('patient.diagnosa-detail', ['patient' => $patient, 'result' => $result, 'diagnosaQuestions' => $diagnosaQuestions, 'disease' => $disease]);
    }
}
