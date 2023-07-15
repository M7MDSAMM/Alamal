<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceptionRequest;
use App\Mail\AdminCreatedEmail;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $doctors =Admin::where('type','Reception')->orderBy('id', 'DESC')->when($request->search, function ($q) use ($request) {
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
        $doctor = Admin::findOrFail($id);
        if (auth()->user()->id == $doctor->id) return redirect()->route('account.profile');
        return response()->view('dashboard.reception-employees.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $doctor = Admin::findOrFail($id);
        return response()->view('dashboard.reception-employees.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReceptionRequest $request, string $id)
    {
        //
        try {
            $doctor = Admin::findOrFail($id);
                $doctor->name = $request->input('name');
                $doctor->email = $request->input('email');
                $doctor->phone_number = $request->input('phone_number');
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
                    'message' => $isSaved ? 'Doctor Manager Updated Successfully' : 'Failed To Updated Doctor Manager'
                ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } catch (Exception $ex) {
                return false;
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $doctor = Admin::findOrFail($id);
        if ($doctor->id == auth()->user()->id) return abort(Response::HTTP_FORBIDDEN, 'CANT DELETE YOURSELF');
        $deleted = $doctor->delete();
        return $deleted ? parent::successResponse() : parent::errorResponse();
    }
}
