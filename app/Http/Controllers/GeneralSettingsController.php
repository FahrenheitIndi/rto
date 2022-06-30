<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class GeneralSettingsController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Settings/Index', []);
    }
}
