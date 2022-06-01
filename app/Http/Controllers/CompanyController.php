<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index', [
            'seoTitle' => 'Bedrifter i Norge',
            'title' => 'Bedrifter i Norge',
            'companies' => Company::latest()->whereIn('org_form', ['ENK', 'AS'])->cursorPaginate(25),

        ]);
    }

    public function show(Place $place, Company $company)
    {
        $company->slug = Str::of($company->title)->slug('-');
        $company->hits += 1;
        if(isNull($company->created_at)){
            $company->created_at = now();
        }
        $company->timestamps = false;
        $company->save();

        return view('companies.show', [
            'seoTitle' => $company->title,
            'title' => $company->title,
            'company' => $company,
        ]);
    }
}
