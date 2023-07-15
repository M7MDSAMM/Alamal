<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\StoreAdminRequest;
use App\Http\Requests\Dashboard\Admin\UpdateAdminRequest;
use App\Mail\AdminCreatedEmail;
use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

    public function __construct(protected AdminService $service)
    {
    }

    public function index(Request $request)
    {
        $admins = $this->service->getAdmins($request);
        return response()->view('dashboard.admins.index', compact('admins'));
    }

    public function store(StoreAdminRequest $request)
    {
        $created = $this->service->createAdmin($request->validated());
        return $created ? parent::successResponse() : parent::errorResponse();
    }

    public function show(Admin $admin)
    {
        if (auth()->user()->id == $admin->id) return redirect()->route('account.profile');
        return response()->view('dashboard.admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        if (auth()->user()->id == $admin->id) return redirect()->route('account.settings');
        return response()->view('dashboard.admins.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $updated = $this->service->updateAdmin($admin, $request);
        return $updated ? parent::successResponse() : parent::errorResponse();
    }

    public function destroy(Admin $admin, Request $request)
    {
        if ($admin->id == auth()->user()->id) return abort(Response::HTTP_FORBIDDEN, 'CANT DELETE YOURSELF');
        $deleted = $admin->delete();
        return $deleted ? parent::successResponse() : parent::errorResponse();
    }
}
