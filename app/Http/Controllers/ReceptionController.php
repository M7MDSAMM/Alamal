<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceptionRequest;
use App\Mail\AdminCreatedEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $doctors =Admin::where('type','doctors-manager')->orderBy('id', 'DESC')->when($request->search, function ($q) use ($request) {
            return $q->where('name', 'LIKE', "%$request->search%")->orWhere('email', 'LIKE', "%$request->search%");
        })->paginate(10);

        return response()->view('dashboard.reception-employees.index',compact('doctors'));
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
    public function store(ReceptionRequest $request)
    {
        //
        $doctorPassword = Str::random(8);

        $doctor = new Admin($request->validated());
        $doctor->phone_number = $request->validated('phone_number');
        $doctor->password = Hash::make($doctorPassword);
        $doctor->type = 'Reception';
        // $doctor->specialty = $request->validated('specialty');
        $isSaved = $doctor->save();
        Mail::to($doctor->email)->send(new AdminCreatedEmail($doctor->name, $doctorPassword));

        return response()->json([
            'message' => $isSaved ? 'Reception Employee Add Successfully' : 'Failed To Add Reception Employee'
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
