<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Models\FileUpload;

class FileUploadController extends Controller
{
 public function upload(FileRequest $request)
 {
    $input = $request->validated();
    $file = $input['file'];
    $name = $file->getClientOriginalName();
    $path = $file->store('files', 'public');

    FileUpload::query()->create([
        'name' => $name,
        'path' => $path,
    ]);
}

public function download (File $file){

    return Storage::disk(name:'public')
    ->download($file->path);
}
};

