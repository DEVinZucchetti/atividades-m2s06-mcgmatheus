<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoasController extends Controller
{
    public function all(){
        try{
            $pessoas = Pessoa::all();
            $message = $pessoas->count()." ".($pessoas->count() === 1 ? "pessoa encontrada" : "pessoas encontradas");
            return $this->response($message, $pessoas);
        }catch(\Exception $exception){
            return $this->response($exception->getMessage(),null, false, 500);
        }
    }

    public function store(Request $request){
       //recebe dados da requisição
       try{
        $request->validate([
            'name' => 'required | min: 3 | max: 150',
            'cpf' => 'min: 11 | max: 20',
            'contact' => 'max: 20',
        ]);
        $pessoa = Pessoa::create($request->all());
       } catch(\Exception $exception){
            return $this->response($exception->getMessage(),null, false, 500);
        }
    }

    public function update($id, Request $request){
        //recebe dados da requisição
        try{
         $request->validate([
             'name' => 'required | min: 3 | max: 150',
             'cpf' => 'min: 11 | max: 20',
             'contact' => 'max: 20',
         ]);
         $pessoa = Pessoa::find($id); //procura valor por um id

         if(empty($pessoa)){
            return $this->response('Pessoa não encontrada', null, false, 404);
         }

         $pessoa->update($request->all()); //depois de encontrado atualiza as informações passadas
         $message = "Informações atualizadas com sucesso";
         return $this->response($message, $pessoa);
        } catch(\Exception $exception){
             return $this->response($exception->getMessage(),null, false, 500);
         }
     }
}