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
    public function editIndex(Request $request)
    {
        $company = Company::find($request->id);
        return view('admin.editCompany.blade.php', compact('company'));
    }

    public function edit(Request $request)
    {
        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->website = $request->website;
        $company->save();
        return redirect()->route('companies');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('admin.index');
    }

    public function addCompanyIndex()
    {

        return view('admin.addCompany');
    }


}
