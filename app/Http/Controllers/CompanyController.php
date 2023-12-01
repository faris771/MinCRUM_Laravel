<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public  function index()
    {
        $companies = Company::paginate(10);
        return view('welcome', compact('companies'));


    }
}