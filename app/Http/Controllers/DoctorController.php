<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Admin\UpdateAdminRequest;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Mail\AdminCreatedEmail;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $doctors =Admin::where('type','doctor')->orderBy('id', 'DESC')->when($request->search, function ($q) use ($request) {
            return $q->where('name', 'LIKE', "%$request->search%")->orWhere('email', 'LIKE', "%$request->search%");
        })->paginate(10);

        return response()->view('dashboard.doctors.index',compact('doctors'));
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
    public function store(StoreDoctorRequest $request)
    {
        //
        $doctorPassword = Str::random(8);

        $doctor = new Admin($request->validated());
        $doctor->phone_number = $request->validated('phone_number');
        $doctor->password = Hash::make($doctorPassword);
        $doctor->type = 'doctor';
        $doctor->specialty = $request->validated('specialty');
        $isSaved = $doctor->save();
        Mail::to($doctor->email)->send(new AdminCreatedEmail($doctor->name, $doctorPassword));

        return response()->json([
            'message' => $isSaved ? 'Doctor Add Successfully' : 'Failed To Add Doctor'
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);

    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $doctor)
    {
        //

        if (auth()->user()->id == $doctor->id) return redirect()->route('account.profile');
        return response()->view('dashboard.doctors.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $doctor)
    {
        //
        return response()->view('dashboard.doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Admin $doctor)
    {
        //

        try {
            $doctor->name = $request->input('name');
            $doctor->email = $request->input('email');
            $doctor->phone_number = $request->input('phone_number');
            $doctor->specialty = $request->input('specialty');
            if ($request->hasFile('image')) {
                if ($doctor->image != null) {
                    Storage::disk('public')->delete('' . $doctor->image);
                }
                $file = $request->file('image');
                $imageName = time() . '_' . $doctor->id . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
                $image = $file->storePubliclyAs('files/admins', $imageName, ['disk' => 'public']);
                $doctor->image = $image;
            }
            $isSaved = $doctor->save();
            return response()->json([
                'message' => $isSaved ? 'Doctor Updated Successfully' : 'Failed To Updated Doctor'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $doctor)
    {
        //
        if ($doctor->id == auth()->user()->id) return abort(Response::HTTP_FORBIDDEN, 'CANT DELETE YOURSELF');
        $deleted = $doctor->delete();
        return $deleted ? parent::successResponse() : parent::errorResponse();

    }
}
