<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUrgentRequest;
use App\Models\PatientAppoinment;
use App\Models\PatientFile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class PatientDashboardController extends Controller
{
    //
    public function index()
    {
        return response()->view('users.index');
    }

    public function files()
    {

        $files = PatientFile::where('patient_id', auth()->user()->id)->paginate();
        return response()->view('users.files.index',compact('files'));
    }

    public function appoinments()
    {

        $appoinments = PatientAppoinment::where('patient_id', auth()->user()->id)->where('type','Normal')->paginate();
        return response()->view('users.appoinments.index',compact('appoinments'));
    }

    public function urgents()
    {

        $appoinments = PatientAppoinment::where('patient_id', auth()->user()->id)->where('type','Urgent')->paginate();
        return response()->view('users.urgents.index',compact('appoinments'));
    }

    public function createUrgent(){
        return response()->view('users.urgents.create');
    }

    public function storeUrgent(StoreUrgentRequest $request){

        $urgent = new PatientAppoinment();
        $urgent->patient_id = auth()->user()->id;
        $urgent->doctor_id = auth()->user()->doctor_id;
        $urgent->type = 'Urgent';
        $urgent->reason = $request->validated('reason');
        $urgent->status = 'pending';
        $isSaved = $urgent->save();

        return response()->json([
            'message' => $isSaved ? 'Urgent Appoinment Requested Successfully' : 'Failed To Request Urgent Appoinment'
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }




    public function changeLocale($locale)
    {
        if (!in_array($locale, ['en', 'ar'])) return abort(Response::HTTP_NOT_FOUND);

        Session::put('locale', $locale);
        return redirect()->back();
    }
}
