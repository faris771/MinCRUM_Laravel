<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        $companies = Company::paginate(10);

        return view('admin.admin',compact('companies'));
    }

    public function addCompany(){

        return view('admin.addCompany');
    }
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required',
            'websiteLink' => 'required',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->websiteLink = $request->website;
        $company->save();
        return redirect()->route('companies');
    }

    public  function destroy(Request $request)
    {
        dd($request->all());
        $company = Company::find($request->id);
        $company->delete();
        return redirect()->route('admin.index');
    }

    public function edit(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required',
            'websiteLink' => 'required',
        ]);
        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->websiteLink = $request->websiteLink;
        $company->save();
    }
}
