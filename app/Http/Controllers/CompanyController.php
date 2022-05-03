<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyController extends Controller
{
    public function index(Company $company, Request $request)
    {   
        $keyword = $request->input('keyword');
        
        $query = Company::query();
        // dd($query);
        if(!empty($keyword)) 
        {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        
        $searchedCompany = $query->get();
        // dd($searchedCompany);
        return view('company/index', compact('searchedCompany', 'keyword'))->with(['companies' => $company->get()]);
    }//これ↑の最後をget()でいいのかわからない。
    
    public function create(Company $company)
    {
        return view('company/create')->with(['companies' => $company->get()]);
    }
    
    
    public function show(Company $company, User $user, Request $request)
    {
        // $user = Company::whereHas('id', function($query){
        //     $query->where('name', 'keyword');
        // })->get();
        
        $keyword = $request->input('keyword');
      
        $query = $company->users();
        // dd($query);
        if(!empty($keyword))
        {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        $searchedUsers = $query->get();
    //   dd($searchedUsers);
        return view('company/show', compact('searchedUsers', 'keyword'))->with(['company' => $company])->with(['users' => $company->getByCompany()]);
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
