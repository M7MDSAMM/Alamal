<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppoinmentRequest;
use App\Models\PatientAppoinment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientAppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $currentDate = Carbon::today()->toDateString();

        $appoinments = PatientAppoinment::where('type','Normal')->orWhere('status','accepted')->orderBy('appointment_date', 'desc')
        ->orderBy('appointment_time', 'desc')
        ->paginate(10);

        return response()->view('dashboard.patient_appoinments.index',compact('appoinments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


        $patients = User::get();
        return response()->view('dashboard.patient_appoinments.create',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppoinmentRequest $request)
    {
        //
        $patient = User::findOrFail($request->validated('patient_id'));

        $appointmentDate = $request->input('appoinment_date');
        $appointmentTime = $request->input('appoinment_time');
        $existingAppointment = PatientAppoinment::where('appointment_date', $appointmentDate)
        ->where('appointment_time', $appointmentTime)->where('doctor_id', $patient->doctor_id)
        ->first();

        if ($existingAppointment) {
            return response()->json(['message' => 'An appointment already exists for this date and time.'], Response::HTTP_BAD_REQUEST);
        }
        $appointment = new PatientAppoinment();
        $appointment->appointment_date =$appointmentDate;
        $appointment->appointment_time =$appointmentTime;
        $appointment->reason = $request->validated('reason');
        $appointment->patient_id = $request->validated('patient_id');
        $appointment->doctor_id = $patient->doctor_id;
        $isSaved = $appointment->save();

        return response()->json([
            'message' => $isSaved ? 'Patient Appoinment Added Successfully' : 'Failed To Add Patient Appoinment'
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientAppoinment $patientAppoinment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientAppoinment $patientAppoinment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientAppoinment $patientAppoinment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $patientAppoinment = PatientAppoinment::findOrFail($id);
        $deleted = $patientAppoinment->delete();
        return $deleted ? parent::successResponse() : parent::errorResponse();
    }
}
