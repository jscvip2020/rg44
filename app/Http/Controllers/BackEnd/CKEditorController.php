<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Itempagina;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
         $statement = DB::select(DB::raw("select auto_increment from information_schema.tables where table_name = 'noticias' "));

        if ($statement) {
            $ultimoID = $statement[0]->auto_increment;
        } else {
            $ultimoID = 0;
        }
        $id = $ultimoID;
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $id . '-' . $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move('images/noticias/images/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/noticias/images/' . $fileName);
            $msg = 'Imagem enviada com sucesso';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
    public function itemupload(Request $request)
    {
        $statement = DB::select(DB::raw("select auto_increment from information_schema.tables where table_name = 'itempaginas' "));

        if ($statement) {
            $ultimoID = $statement[0]->auto_increment;
        } else {
            $ultimoID = 0;
        }
        $id = $ultimoID;
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $id . '-' . $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move('images/pags/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/pags/' . $fileName);
            $msg = 'Imagem enviada com sucesso';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function uploadEdit(Request $request, $id)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = str_replace(' ', '', pathinfo($originName, PATHINFO_FILENAME));
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $id . '-' . $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move('images/noticias/images/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/noticias/images/' . $fileName);
            $msg = 'Imagem enviada com sucesso';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
    public function itemuploadEdit(Request $request, $id)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = str_replace(' ', '', pathinfo($originName, PATHINFO_FILENAME));
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $id . '-' . $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move('images/pags/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/pags/' . $fileName);
            $msg = 'Imagem enviada com sucesso';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
