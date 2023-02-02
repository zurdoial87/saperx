<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use DB;

class AgendaController extends Controller
{
    public function index()
    {
        return view('contatos');
    } 

        
    public function store(Request $request)
    {  
        
        $this->validate($request,[
            'nome' => ['required'],
            'numero' => ['required']
            
        ],[
            'nome.required' => 'O campo nome não pode ser vazio',
            'numero.required' => 'O campo numero não pode ser vazio'            
        ]);                

        Contact::create($request->all());

        return  "success";

    }

    public function show(Contact $contato)
    {       
       return $contato;
    } 

    public function update(Request $request)
    {
                
        $student = Contact::find($request->id)->update($request->all());
        return "success";

    }

    public function destroy($id)
    {
        $student = Contact::find($id)->delete();
        return "success";
    }
}
