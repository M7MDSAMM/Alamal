<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Mail\NewPatientMail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $patients =User::orderBy('id', 'DESC')->when($request->search, function ($q) use ($request) {
            return $q->where('name', 'LIKE', "%$request->search%")->orWhere('email', 'LIKE', "%$request->search%");
        })->paginate(10);

        return response()->view('dashboard.patient.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $doctors =Admin::where('type','doctor')->get();

        return response()->view('dashboard.patient.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        //
        $doctor = Admin::findOrFail($request->get('doctor'));
        if(!$doctor->type == 'doctor'){

            return response()->json([
                'message' =>  'You Must Choose Doctor'
            ], Response::HTTP_BAD_REQUEST);        }



        $user = new User($request->validated());
        if ($request->hasFile('main_patient_file')) {
            $file = $request->file('main_patient_file');
            $main_patient_fileName = time() . '_' . $user->id . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $main_patient_file = $file->move('files/patients', $main_patient_fileName, ['disk' => 'public']);
            $user->main_patient_file = $main_patient_file;
        }
        $user->age = $request->validated('age');
        $user->phone_number = $request->validated('phone_number');
        $user->date_of_birth = $request->validated('date_of_birth');
        $user->diagnosis = $request->validated('diagnosis');
        $user->doctor_id = $request->get('doctor');
        $user->password = Hash::make(123456);
        $isSaved = $user->save();

            Mail::to($user->email)->send(new NewPatientMail($user->email , 123456,route('login'),$user->name));

            return response()->json([
                'message' => $isSaved ? 'Patient Added Successfully' : 'Failed To Add Patient'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $patient = User::findOrFail($id);
        return response()->view('dashboard.patient.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $user = User::findOrFail($id);
        $doctors =Admin::where('type','doctor')->get();

        return response()->view('dashboard.patient.edit',compact('doctors','user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if ($request->has('doctor')) {
            $doctor = Admin::findOrFail($request->get('doctor'));
            if (!$doctor->type == 'doctor') {
                return response()->json([
                    'message' => 'You Must Choose Doctor'
                ], Response::HTTP_BAD_REQUEST);
            }
            $user->doctor_id = $request->get('doctor');
        }


        $user->name = $request->validated('name');
        $user->gender = $request->validated('gender');
        $user->email = $request->validated('email');
        $user->section = $request->validated('section');
        $user->degrees_of_severity = $request->validated('degrees_of_severity');
        $user->age = $request->validated('age');
        $user->phone_number = $request->validated('phone_number');
        $user->date_of_birth = $request->validated('date_of_birth');
        $user->diagnosis = $request->validated('diagnosis');
        if(auth()->user()->type != 'doctor'){
        $user->doctor_id = $request->get('doctor');

        }else{
        $user->doctor_id = auth()->user()->id;

        }
        // Handle the main_patient_file update if provided
        if ($request->hasFile('main_patient_file')) {
            $file = $request->file('main_patient_file');
            $main_patient_fileName = time() . '_' . $user->id . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $main_patient_file = $file->move('files/patients', $main_patient_fileName, ['disk' => 'public']);
            $user->main_patient_file = $main_patient_file;
        }

        // Save the updated user record
        $isSaved = $user->save();

        return response()->json([
            'message' => $isSaved ? 'Patient Updated Successfully' : 'Failed To Update Patient'
        ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $patient = User::findOrFail($id);
        $deleted = $patient->delete();
        return $deleted ? parent::successResponse() : parent::errorResponse();

    }
}
