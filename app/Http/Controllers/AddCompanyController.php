<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class AddCompanyController extends Controller{
    public function index()
    {

        return view('admin.addCompany');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies',
            'websiteLink' => 'required',
            'logo' => 'required',

        ]);

        if ($data) {
            $company = new Company();
            $company->name = $request->name;
            $company->email = $request->email;
            $company->websiteLink = $request->websiteLink;
            $company->logo = $request->logo;
            //logo upload
//            if ($request->hasFile('logo')) {
//                $file = $request->file('logo');
//                $extension = $file->getClientOriginalExtension();
//                $filename = time() . '.' . $extension;
//                $file->move(public_path('/storage'), $filename);
//                $company->logo = $filename;
//            } else {
//                return $request;
//                $company->logo = '';
//            }

            $company->save();
            // added success message
            session()->flash('success', 'Company added successfully');
            return redirect()->route('admin.index');
        }
    }
}
