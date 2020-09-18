<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __invoke(Request $request)
    {
      $file = $request->file('file');
      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $status = Storage::disk('local')->putFileAs('files/', $file, $fileName);
  
      if($status){
        return response()->json([
          'status' => 'success',
          'data' => env('APP_URL').'/api/file/'.$fileName,
          'error' => null,
        ],200);
      }
    }
}