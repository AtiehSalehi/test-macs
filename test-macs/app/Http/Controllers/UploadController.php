<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Page;

class UploadController extends Controller
{
    public function upload(Request $request)
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
