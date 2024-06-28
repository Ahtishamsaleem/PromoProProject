<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = UserLog::with('user')->get();
        return view('logs.index', compact('logs'));
    }
}
