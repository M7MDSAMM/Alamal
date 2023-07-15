<?php

namespace App\Services;

use App\Events\AdminCreated;
use App\Http\Requests\Dashboard\Admin\UpdateAdminRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminService
{

    public function getAdmins(Request $request)
    {
        return Admin::where('type','system-manager')->orderBy('id', 'DESC')->when($request->search, function ($q) use ($request) {
            return $q->where('name', 'LIKE', "%$request->search%")->orWhere('email', 'LIKE', "%$request->search%");
        })->paginate(10);
    }

    public function createAdmin($data): bool
    {
        try {
            $admin = new Admin($data);
            $passwordString = Str::random(8);
            $admin->password = Hash::make($passwordString);
            $isSaved = $admin->save();
            $admin->setAttribute('password_string', $passwordString);

            if ($isSaved) {
                event(new AdminCreated($admin));
            }

            return $isSaved;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function updateAdmin($admin, UpdateAdminRequest $request): bool
    {
        try {
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            if ($request->hasFile('image')) {
                if ($admin->image != null) {
                    Storage::disk('public')->delete('' . $admin->image);
                }
                $file = $request->file('image');
                $imageName = time() . '_' . $admin->id . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
                $image = $file->storePubliclyAs('files/admins', $imageName, ['disk' => 'public']);
                $admin->image = $image;
            }
            $isSaved = $admin->save();
            return $isSaved;
        } catch (Exception $ex) {
            return false;
        }
    }
}
