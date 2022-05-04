<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Talk;

class UserController extends Controller
{
    public function index(User $user, Talk $talk){
        return view('talk/index')->with(['users' => $user])->with(['talks' => $talk->get()]);//何の情報化わかりにくいので、user.indexなどに変える
    }
    
    public function create(Company $company, User $user){
        // dd($user->get());
        return view('employee/create')->with(['user' => $user, 'companies' => $company->get(), 'company2' => $company]);//このままだとほかのcreateと区別がつかないので、userディレクトリを作って、その中にbladeファイルと入れる。
    }
    
    public function store(Request $request, User $user){
        $input = $request['user'];
        $user->fill($input)->save();
        return redirect('/users/' . $user->id);
    }
    
    public function show(User $user, Company $company)
    {   
        return view('employee/show')->with(['user' => $user])->with(['company' => $company]);
    }
    
    public function edit(User $user, Company $company){
        return view('employee/edit')->with(['user' => $user, 'companies' => $company->get()]);
    }
    
    public function update(Request $request, User $user){
        $input_user = $request['user'];
        $user->fill($input_user)->save();
        
        return redirect('/users/' . $user->id);
    }
    
    public function delete(User $user){
        $user->delete();
        return redirect('/users');
    }
    
}
