<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
   public function index(){
    $types=Type::all();
    
    return response()->json([
        'success'=>true,
        'results'=>$types
    ]);
   }

   public function show($id){
    $type=Type::where('id', $id)->with('projects.technologies')->first();
    return response()->json([
        'success'=>true,
        'results'=>$type
    ]);
   }
}

