<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use File;

class ConfigController extends Controller
{
    public function index()
    {
        return view('admin.configs.index');
    }
    public static function config(Request $request)
    {
        $path = base_path('.env');

        foreach($request->all() as $key=>$value){
            if (is_bool(env($key))) {
                $old = env($key) ? 'true' : 'false';
            } elseif (env($key) === null) {
                $old = 'null';
            } elseif (is_string(env($key))) {
                $old = '"'.env($key).'"';
                $value = '"'.$value.'"';
            } else {
                $old = env($key);
            }
            file_put_contents($path, str_replace("$key=" . $old, "$key=" . $value, file_get_contents($path)));
        }

        return Redirect::to('admin/configs');
    }

    public function logobranco(Request $request)
    {
        $path = base_path('.env');
        $validator = Validator::make($request->all(), [
            'logobranco' => 'required|mimes:png',
         ]);

        if ($validator->fails()) {
            return redirect()->route('configs.index')
                ->withErrors($validator)
                ->withInput();
        }else {

            $file_path = public_path("images/" . env($request->key) );
            $imagem = $request->logobranco->getClientOriginalName();

            $imagem = str_ireplace(" ","",$imagem);

            $old = '"'.env($request->key).'"';
            $value = '"'.$imagem.'"';

            if(file_exists($file_path)){
                File::delete($file_path);
            };
            $request->logobranco->move(public_path('images'), $imagem);
            $replace = str_replace("$request->key = ".$old, "$request->key = " .$value, file_get_contents($path));
            file_put_contents($path, $replace);

            return Redirect::to('admin/configs')->with('success', 'LOGO BRANCO alterado com sucesso!');
        }
    }

    public function logopreto(Request $request)
    {
        $path = base_path('.env');

        $validator = Validator::make($request->all(), [
            'logopreto' => 'required|mimes:png',
         ]);

        if ($validator->fails()) {
            return redirect()->route('configs.index')
                ->withErrors($validator)
                ->withInput();
        }else {

            $file_path = public_path("images/" . env($request->key) );
            $imagem = $request->logopreto->getClientOriginalName();

            $imagem = str_ireplace(" ","",$imagem);


            $old = '"'.env($request->key).'"';
            $value = '"'.$imagem.'"';

            if(file_exists($file_path)){
                File::delete($file_path);
            };
            $request->logopreto->move(public_path('images'), $imagem);
            $replace = str_replace("$request->key = ".$old, "$request->key = " .$value, file_get_contents($path));
            file_put_contents($path, $replace);

            return Redirect::to('admin/configs')->with('success', 'LOGO PRETO alterado com sucesso!');
        }
    }

    public function fotoperfil(Request $request)
    {
        $path = base_path('.env');
        $validator = Validator::make($request->all(), [
            'fotoperfil' => 'required|mimes:png',
         ]);

        if ($validator->fails()) {
            return redirect()->route('configs.index')
                ->withErrors($validator)
                ->withInput();
        }else {

            $file_path = public_path("images/" . env($request->key) );
            $imagem = $request->fotoperfil->getClientOriginalName();

            $imagem = str_ireplace(" ","",$imagem);


            $old = '"'.env($request->key).'"';
            $value = '"'.$imagem.'"';

            if(file_exists($file_path)){
                File::delete($file_path);
            };
            $request->fotoperfil->move(public_path('images'), $imagem);
            $replace = str_replace("$request->key = ".$old, "$request->key = " .$value, file_get_contents($path));
            file_put_contents($path, $replace);

            return Redirect::to('admin/configs')->with('success', 'FOTO PERFIL alterado com sucesso!');
        }
    }

    public function textoperfil(Request $request)
    {
        $path = base_path('.env');
        $validator = Validator::make($request->all(), [
            'textoperfil' => 'required|mimes:png',
         ]);

        if ($validator->fails()) {
            return redirect()->route('configs.index')
                ->withErrors($validator)
                ->withInput();
        }else {

            $file_path = public_path("images/" . env($request->key) );
            $imagem = $request->textoperfil->getClientOriginalName();

            $imagem = str_ireplace(" ","",$imagem);


            $old = '"'.env($request->key).'"';
            $value = '"'.$imagem.'"';

            if(file_exists($file_path)){
                File::delete($file_path);
            };
            $request->textoperfil->move(public_path('images'), $imagem);
            $replace = str_replace("$request->key = ".$old, "$request->key = " .$value, file_get_contents($path));
            file_put_contents($path, $replace);

            return Redirect::to('admin/configs')->with('success', 'LOGO BRANCO alterado com sucesso!');
        }
    }

    public function video(Request $request)
    {
        $path = base_path('.env');
        $validator = Validator::make($request->all(), [
            'video' => 'required|mimetypes:video/mp4',
         ]);

        if ($validator->fails()) {
            return redirect()->route('configs.index')
                ->withErrors($validator)
                ->withInput();
        }else {
            $file_path = public_path("videos/" . env($request->key) );
            $imagem = $request->video->getClientOriginalName();

            $imagem = str_ireplace(" ","",$imagem);


            $old = '"'.env($request->key).'"';
            $value = '"'.$imagem.'"';

            if(file_exists($file_path)){
                File::delete($file_path);
            };
            $request->video->move(public_path('videos'), $imagem);
            $replace = str_replace("$request->key = ".$old, "$request->key = " .$value, file_get_contents($path));
            file_put_contents($path, $replace);

            return Redirect::to('admin/configs')->with('success', 'LOGO BRANCO alterado com sucesso!');
        }
    }
}
