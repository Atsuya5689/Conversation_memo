<?php

namespace App\Http\Controllers;

use App\Talk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TalkController extends Controller
{
    
    public function index(Talk $talk, User $user, Request $request)
    {
        $myId = Auth::user();
        // dd($myId);
        
        // $talks = $talk->where('from_user_id', $user->id)
        //             ->where('to_user_id', $myId->id)
        //               ->orwhere(function($query) use ($user, $myId){
        //                   $query->where('from_user_id', $myId->id)
        //               ->where('to_user_id', $user->id);
        //               })
        //             ->get();
                    //二つの配列をくっつけると、分離して並んでしまうと思ったが、ｇｅｔをする前に、whereでくっつけると、getしたときに同じものとして扱える。
        // $talks1 = $talk->where('from_user_id', $user->id)
        //     ->orWhere('to_user_id', $myId)->get();
        // $talks2 = $talk->where('from_user_id', $myId)
        //     ->orWhere('to_user_id', $user->id)->get();
        // $collection = $talks1;
        // $concatenated = $collection->concat($talks2);
        // $concatenated->all();
        // $talks = $concatenated;
        $keyword = $request->input('keyword');
        $date = $request->input('date');
        // dd($keyword);
      
        // // $query = Talk::query();
        // $query = $user->talks();
        // // dd($user);
        // $a = $query->get();
        // // $a = $user->getByUser();
        // dd($a);
        // dd($query);
        // dd($request->input('date'));
        // dd($date);
   
        if(!empty($keyword))
        {   
            // $talks = $talk->where('body', 'LIKE', "%{$keyword}%")
            //             ->where(function($query) use ($user, $myId){
            //             $query->where('from_user_id', $user->id)
            //             ->where('to_user_id', $myId->id)
            //             ->orWhere('to_user_id', $user->id);
            //         });
            
            // $talks = $talk->where('body', 'LIKE', "%{$keyword}%")
            //             ->where(function($query) use ($user, $myId){
            //                 $query->where('from_user_id', $user->id)
            //                 ->where('to_user_id', $myId->id)
                            
            //                 ->orWhere(function($query) use ($user, $myId){
            //                      $query->where('to_user_id', $user->id)
            //                     ->where('from_user_id', $myId->id);
            //                 });
            //             });
            
             $talks = $talk->where('body', 'LIKE', "%{$keyword}%")
                        ->where(function($query) use ($user, $myId){
                            
                            $query->where('from_user_id', $user->id)
                            ->where('to_user_id', $myId->id)
                            
                            ->orWhere(function($query) use ($user, $myId){
                                 $query->where('to_user_id', $user->id)
                                ->where('from_user_id', $myId->id);
                            });
                            
                        });
            
        }
        else{
            $talks = $talk
                    ->where(function($query) use($user, $myId){
                    $query->where('from_user_id', $user->id)
                    ->where('to_user_id', $myId->id)
                    
                        ->orWhere(function($query) use ($user, $myId){
                        $query->where('from_user_id', $myId->id)
                        ->where('to_user_id', $user->id);
                        });
                    
                    });
                    
                    
                        // dd($talks->get());
        }
        // dd($talks->get());
        
        if(!empty($date)){
            // dd($talks->get());
            $talksDate = $talks->where('id', '>=', $date);
                            // ->where(function($query) use ($user){
                            //     $query->('from_user_id', '!=', $user->id);
                            // });
                            // dd($talksDate->get());
        }else{
            $talksDate = $talks->where('id', '>=', 0);
        }
        // dd($talksDate);
        $searchedTalks = $talksDate->get();
        // $searchedTalks = $talksDate->paginate(4);
    //   dd($searchedTalks);
        return view('talk/index', compact('searchedTalks', 'keyword'))->with(['user' => $user, 'users' => $user->get(), 'talks' => $talks, 'myId' => $myId]);
        // ->with(['user' => $user, 'users' => $user->get(),
        //     'talks1' => $talk->where('from_user_id', $user->id)
        //     ->orWhere('to_user_id', $myId)->get(), 
        //     'talks2' => $talk->where('from_user_id', $myId)
        //     ->orWhere('to_user_id', $user->id)->get(),
        //     'talks' => $talks]);
    }
    
    //テキストの入力に関して↓
    public function store(Request $request, Talk $talk, User $user)
    {   
        $input = $request['talk'];
        $myId = Auth::user();
        // $a = $input['from_user_id'];
        // dd($a);
        // dd($user->id);
        //ここを直す！！！！！！！！！
        if($user->id == $input['from_user_id']){
            // $input->to_user_id = Auth::user();
            // $input = array_merge($input,array('to_user_id' => Auth::id()));
            $input['to_user_id'] = $myId->id;
            //↑の学びはでかい！!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            // array_push($input, Auth::user());
            // $input['to_user_id'] = $myId->id;
            // dd($a);
        }else{
            // $input->to_user_id = $user->id
            // $input = array_merge($input,array('to_user_id' => $user->id));
            $input['to_user_id'] = $user->id;
        }
        
        // dd($input);
        
        $talk->fill($input)->save();
        return redirect('/talks/' . $user->id);
    }
}
