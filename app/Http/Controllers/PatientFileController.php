<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientFileRequest;
use App\Models\PatientFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $patients = User::get();
        return response()->view('dashboard.patient_files.create',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientFileRequest $request)
    {
        //

        $patientFile = new PatientFile($request->validated());
        if ($request->hasFile('patient_file')) {
            $file = $request->file('patient_file');
            $patient_fileName = time() . '_' . $patientFile->id . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $patient_file = $file->move('files/patients', $patient_fileName, ['disk' => 'public']);
            $patientFile->file = $patient_file;
        }
        $isSaved = $patientFile->save();

        return response()->json([
            'message' => $isSaved ? 'Patient File Added Successfully' : 'Failed To Add Patient File'
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientFile $patientFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientFile $patientFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientFile $patientFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientFile $patientFile)
    {
        //
    }
}
