<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    function index(Request $request){

        //$users = User::all();
		$users = DB::table('users')->get(); 
        
        if($request->session()->has('name')){
    		   	return view('student.index')->with('users', $users);
    	}else{
    		return redirect()->route('login.index');
    	}
    }

    function details($id){
        $user = DB::table('users')->where('userId', $id)
					->get(); 
                
            return view('student.details')->with('users', $user);
    }


    function edit($id){
        $user = DB::table('users')->where('userId', $id)
        ->get(); 
    
        return view('student.edit')->with('users', $user);
    }
	
	function update(Request $req, $id){

    	$user = users::find($id);
        $user->username = $req->username;
        $user->password = $req->password;
        $user->type =$req->type;
        $user->save();

    	return redirect()->route('student.index');
    }
    function delete($id){
        $user = DB::table('users')->where('userId', $id)
        ->get(); 
    
        return view('student.delete')->with('users', $user);
    }

    function destroy($id){
    	users::destroy($id);
    	return redirect()->route('student.index');
    }

    function add(){

        return view('student.adduser');
    }

    function insert(Request $req){

        $user = new users();
        $user->username = $req->username;
        $user->password = $req->password;
        $user->type = $req->type;
        $user->name = "";
        $user->dept = "";
        $user->cgpa = "";
    
        if($user->save()){
            return redirect()->route('student.index');
        }else{
            return redirect()->route('student.add');
        }
    }
}
