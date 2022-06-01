<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'header' => 'Forsiden Her i Norge',
            'title' => 'Forsiden',
            // 'companies' => Company::whereIn('org_form', ['ENK', 'AS'])->orderBy('hits', 'desc')->limit(12)->get(),
            'place' => (object) array('title' => 'Norge', 'lat' => 59.56, 'lon' => 9.24),
        ]);
    }
}
