<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class FileUploadController extends Controller
{

    public function index (){
        $files = File::all();

        return FileResource::collection($files);
    }
    public function upload(Request $request)
    {
        $user = Auth::user();
        $file = $request->file('file');

        if ($file->isValid()) {
            $path = Storage::disk('public')->put('files', $file);

            $fileModel = new File([
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'user_id' => $user->id,
            ]);

            $fileModel->save();

            // Alerta de sucesso
            Session::flash('success', 'Arquivo enviado com sucesso!');
        } else {
            // Alerta de erro
            Session::flash('error', 'Erro ao enviar o arquivo. Por favor, tente novamente.');
        }

        return redirect()->back();
    }

    public function download (File $file){

        return Storage::disk(name:'public')
        ->download($file->path);
    }

    public function delete (File $file){
        Storage::disk(name:'public')->delete($file->path);
        $file->delete();

    }
}