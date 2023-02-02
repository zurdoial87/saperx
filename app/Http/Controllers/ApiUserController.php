<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiUserController extends Controller
{
    public function index()
    {
        $result = User::all();               
        return    response()->json($result->load("contacs"), 200);
    } 

      
    public function store(Request $request)
    {          
        $this->validate($request,[

            'name' => ['required'],
            'email' => ['required']
            
            ],[
                'name.required' => 'O campo name não pode ser vazio',
                'email.required' => 'O campo e-mail não pode ser vazio'            
        ]);

        $puser =User::create($request->all());       
        return  response()->json(["mensaje"=>"Success", "data"=> $puser], 200);
      
    }

    public function show($id)
    {       
       $puser =User::find($id);
       if(is_null($puser)){

            return response()->json(["mensaje"=>"Registro não encontrado"], 200);

       }
       return response()->json(["mensaje"=>"Success", "data"=> $puser->load("contacs")], 200);
    } 

    public function update(Request $request, $id)
    {
       
       $puser =User::find($id);
       if(is_null($puser)){

            return response()->json(["mensaje"=>"Registro não encontrado"], 200);

       }

       $this->validate($request,[
        'name' => ['required'],
        'email' => ['required']
        
        ],[
            'name.required' => 'O campo name não pode ser vazio',
            'email.required' => 'O campo e-mail não pode ser vazio'            
        ]);
        
        $result = $puser->update($request->all());
        return response(["mensaje"=>"Success", "data"=> $result], 200);

    }

    public function destroy($id)
    {
       $puser =User::find($id);
       if(is_null($puser)){

            return response()->json(["mensaje"=>"Registro não encontrado"], 200);

       }
        $puser->delete();
        return response()->json(["mensaje"=>"Usuário removido com sucesso"], 200);;
    }
}
