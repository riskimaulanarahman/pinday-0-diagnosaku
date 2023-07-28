<?php

namespace App\Http\Controllers;

use App\Models\DiagnosaQuestion;
use App\Models\DiagnosaResult;
use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::guest()) {
                Redirect::to("/")->send();
            }

            if (Auth::user()->role != 'doctor') {
                Redirect::to("/keluar")->send();
            }

            return $next($request);
        });
    }

    public function home() {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $diseases = Disease::all();
        return view('doctor.home', ['doctor' => $doctor, 'diseases' => $diseases]);
    }

    public function profile(Request $request) {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        if ($request->method() == 'GET') {
            return view('doctor.profile', ['doctor' => $doctor]);
        } elseif ($request->method() == 'POST') {
            $user = User::where('user_id', Auth::id())->first();
            $doctor = Doctor::where('user_id', $user->user_id)->first();

            $user->email = $request->email;
            if ($request->password != null) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $doctor->name = $request->name;
            $doctor->gender = $request->gender;
            $doctor->address = $request->address;
            $doctor->contact_person = $request->contact_person;
            $doctor->specialist = $request->specialist;
            $doctor->save();

            return back()->with('success', 'Data anda berhasil diubah!');
        }
    }

    public function patient() {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $patients = Patient::with('user')->get();
        return view('doctor.patient', ['doctor' => $doctor, 'patients' => $patients]);
    }

    public function diagnosaList($id) {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $diagnosaResults = DiagnosaResult::with(['patient', 'disease'])->where('patient_id', $id)->get();
        return view('doctor.diagnosa-list', ['doctor' => $doctor, 'diagnosaResults' => $diagnosaResults]);
    }

    public function diagnosaDetail($id) {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $result = DiagnosaResult::with('patient')->where('diagnosa_result_id', $id)->first();
        $diagnosaQuestions = DiagnosaQuestion::all();
        $disease = Disease::find($result->disease_id);

        return view('doctor.diagnosa-detail', ['doctor' => $doctor, 'result' => $result, 'diagnosaQuestions' => $diagnosaQuestions, 'disease' => $disease]);
    }

    public function giveSuggestion(Request $request) {
        $suggestion = DiagnosaResult::find($request->id);
        $suggestion->suggestion_doctor = $request->suggest_doctor;
        $suggestion->save();

        return back()->with('success', 'Berhasil memberi saran!');
    }

    public function authentication() {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $users = User::with('patient')->where('role', 'patient')->get();
        return view('doctor.authentication', ['doctor' => $doctor, 'users' => $users]);
    }

    public function editAuthentication(Request $request) {
        $user = User::find($request->id);
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back()->with('success', 'Berhasil mengubah autentikasi!');
    }

    public function deleteAuthentication($id) {
        $user = User::find($id);
        $patient = Patient::where('user_id', $id)->first();
        $diagnosaResults = DiagnosaResult::where('patient_id', $patient->patient_id)->get();

        foreach($diagnosaResults as $diagnosaResult) {
            $diagnosaResult->delete();
        }

        $patient->delete();
        $user->delete();
        return back()->with('success', 'Berhasil menghapus autentikasi!');
    }
}
