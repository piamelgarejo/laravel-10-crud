<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Logging;

class LoggingController extends Controller
{
    public function index()
    {
        return view('loggings', [
            'logging' => Logging::latest()->paginate(6),
        ]);
    }
}
