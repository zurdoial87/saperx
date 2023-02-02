<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;



class UserController extends Controller
{
    
    public function index()
    {
        return view('users');
        
    }   
     
    
    public function getAll()
    {
        $result = User::all();
        return $result;

        
    }

    
    public function getContacts($id)
    {
        $result = User::find($id)->contacs;
        return $result;

       
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required']
            
        ],[
            'name.required' => 'O campo nome não pode ser vazio',
            'email.required' => 'O campo e-mail não pode ser vazio'            
        ]);
                

        User::create($request->all());

        return  "success";
    }

    
    public function show(User $user)
    {       
       return $user;
    }   
   
  
    public function update(Request $request)
    {
                
        $student = User::find($request->id)->update($request->except("id"));
        
        return "success";

    }

    
    public function destroy($id)
    {
        $student = User::find($id)->delete();

        return "success";
    }
}
