<?php

namespace Piyush\LaravelLayouts\Http\Controllers\Admin;

use Piyush\LaravelLayouts\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $token = $request->session()->get('token');
        return view('admin.index', [
            'token' => $token
        ]);
    }

}
