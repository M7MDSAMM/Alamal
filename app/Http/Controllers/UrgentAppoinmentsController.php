<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcceptUrgentRequests;
use App\Models\PatientAppoinment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UrgentAppoinmentsController extends Controller
{
    //
    public function index(){
        $appoinments = PatientAppoinment::where('type','Urgent')->where('status','pending')->paginate(10);

        return response()->view('dashboard.patient_appoinments.urgent-appoinments.index',compact('appoinments'));
    }

    public function refuse($id){
        $appoinment = PatientAppoinment::findOrFail($id);
        $appoinment->status = 'rejected';
        $isSaved = $appoinment->save();

        return response()->json([
            'message' => $isSaved ? 'Patient Appoinment Refused Successfully' : 'Failed To Refuse Patient Appoinment'
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    public function accept($id,AcceptUrgentRequests $request){
        $appoinment = PatientAppoinment::findOrFail($id);
        $appoinment->status = 'accepted';
        $appoinment->appointment_date = $request->validated('date');
        $isSaved = $appoinment->save();

        return response()->json([
            'message' => $isSaved ? 'Patient Appoinment Accepted Successfully' : 'Failed To Accepted Patient Appoinment'
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }
}
