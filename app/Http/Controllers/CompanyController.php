<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Company $company)
    {
        return view('company/index')->with(['companies' => $company->get()]);
    }//これ↑の最後をget()でいいのかわからない。
    
    public function create(Company $company)
    {
        return view('company/create')->with(['companies' => $company->get()]);
    }
    
    
    public function show(Company $company, User $user)
    {
        return view('company/show')->with(['company' => $company])->with(['users' => $company->getByCompany()]);
        //return view('company/show')->with(['company' => $company]);
        
    }
    
    
    public function store(Request $request, Company $company)
    {   
       
        $input_company = $request['company'];
        $company->fill($input_company)->save();
        return redirect('/companies/' . $company->id);
    }
    
    public function delete(Company $company)
    {
        $company->delete();
        return redirect('/');
    }
}
