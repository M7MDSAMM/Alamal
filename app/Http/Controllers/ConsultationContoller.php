<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\MedicalConsultation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConsultationContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $consultations = MedicalConsultation::where('doctor_id',auth()->user()->id)->paginate();
        return response()->view('dashboard.consultations.index',compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        return response()->json([
            'message' =>  'Medical Consultation Replied Successfully'
        ], Response::HTTP_CREATED );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
