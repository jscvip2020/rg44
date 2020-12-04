<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        $statement = Noticia::OrderBy('id', 'DESC')->first();
        if ($statement) {
            $ultimoID = $statement->id;
        } else {
            $ultimoID = 0;
        }
        $id = $ultimoID + 1;
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $id . '-' . $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('images/noticias/images/'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/noticias/images/' . $fileName);
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
            $request->file('upload')->move(public_path('images/noticias/images/'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/noticias/images/' . $fileName);
            $msg = 'Imagem enviada com sucesso';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
