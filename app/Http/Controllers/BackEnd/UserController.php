<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $row = User::findOrFail($id);
            $action = $row->delete();
            if ($action){
                return redirect()->route('users.index')->with('success', "Usuário $row->name DELETADO com sucesso!");
            }else{
                return redirect()->route('users.index')->with('error', "Não foi possível DELETAR o Usuário  $row->name!");
            }
        }catch (ModelNotFoundException $e){
            return redirect()->route('medias.index')->with('error', 'Não foi possível encontrar o usuário!');
        }
    }

}
