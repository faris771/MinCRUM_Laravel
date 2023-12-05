<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class EditCompanyController extends Controller
{
    public function index(Company $company)
    {

        return view('admin.editCompany', compact('company'));
    }

    public function update(Request $request, Company $company)
    {

        $isValid = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required',
            'websiteLink' => 'required',
        ]);

        if ($isValid) {

            $company->name = $request->name;
            $company->email = $request->email;
            $company->websiteLink = $request->websiteLink;
            $company->logo = $request->logo;

            if ($request->hasFile('logo')) {

                $file = $request->file('logo');

                $extension = $file->getClientOriginalExtension();
                $fileName = $company->logo . '.' . $extension;
                $file->move('storage/', $fileName);
                $company->logo = $fileName;
            }


            $company->save();
            return redirect()->route('admin.index');
        }
    }

    //
}
