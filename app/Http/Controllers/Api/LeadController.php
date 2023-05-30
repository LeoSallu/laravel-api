<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class LeadController extends Controller
{
    public function store(Request $request){
        $data=$request->validate([
            'author'=>'nullable|string',
            'message'=>'string',
            'project_id'=>'integer|exists:project,id'
        ]);
        $lead=new Lead();
        $lead->author=$data['author'];
        $lead->message=$data['message'];
        $lead->project_id=$data['project_id'];
        $lead->save();


        return $lead;
    }
}
