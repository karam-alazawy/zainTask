<?php

namespace App\Http\Controllers;

use App\Utils\FileUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilesController extends Controller
{
    protected $fileUtil;

    public function __construct(FileUtil $fileUtil)
    {
        $this->fileUtil = $fileUtil;
    }

 


    public function file(Request $request)
    {
        if (!empty(request()->json()->all())) {
            $list= request()->json()->all();
        }
        else{
        $validator = Validator::make($request->all(), [
            'file' => 'required|file', 
        ]); // Data validation

        // check validation
        if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ],400);
        }

        $list = file_get_contents(request()->all()['file']); // get file content
        $list = json_decode($list); // decode the json data
        }
        if (!is_array($list))return response()->json(['error' => true,'message' => "please the data must be array of objects"],400); // check the data is valid
        
       
        return response()->json([
            $this->fileUtil->getEmployeeFiles($list)
        ], 200); // return response 

    }
}
