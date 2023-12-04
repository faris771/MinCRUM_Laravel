<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class EditCompanyController extends Controller
{
    public function index(Company $company)
    {
        $id = request()->segment(3);
        $company = Company::find($id);
        return view('admin.editCompany', compact('company'));

    }

    public function update(Request $request)
    {
//        dd($request->all());
        //
        $isValid = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required',
            'websiteLink' => 'required',
        ]);
//        dd($isValid);
        $isValid = true;
        $id = request()->segment(3);
        var_dump($id);
        if ($isValid) {

            $company = Company::find($id);
            $company->name = $request->name;
            $company->email = $request->email;
            $company->logo = $request->logo;
            $company->websiteLink = $request->websiteLink;
            $company->save();
            return redirect()->route('admin.index');
        }
    }

    //
}
