<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{

    public function index()
    {
        return response()->view('dashboard.index');
    }

    public function changeLocale($locale)
    {
        if (!in_array($locale, ['en', 'ar'])) return abort(Response::HTTP_NOT_FOUND);

        Session::put('locale', $locale);
        return redirect()->back();
    }
}
