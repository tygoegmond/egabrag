<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SavingGoals;
class SavinggoalsController extends Controller
{
    public function getGoals(Request $request){
        $id = $request->user()->id;
        $goals = SavingGoals::where("user",$id)->get();
        return $goals;
        
      
        
    }   
    public function createGoals(Request $request){
        $id = $request->user()->id;
        
        $goal = SavingGoals::create(["user"=>$id, "name"=>$request->name,"saved_amount"=>$request->saved_amount,"total_amount"=>$request->total_amount ]);
        return $goal;
        
       
        
    }   
    public function deleteGoals(Request $request){
        $userid = $request->user()->id;
        $id = $request->id;
        $goal = SavingGoals::find($id);
        if($goal->user == $userid){
        $goal->delete();
        return ["message"=>"record succesfully deleted"];
    }
        else{return ["error"=>"you can't delete other people's stuff"];};
        
        
        
    }   
    public function updateGoals(Request $request){
        $userid = $request->user()->id;
        $id = $request->id;
        $goal = SavingGoals::find($id);
        $array = $request->all();
        if($goal->user == $userid){
            unset($array["id"]);
            foreach($array as $key=>$value){
                $goal->$key=$value;
            };
            $goal->save();
            return $goal;
        }else{return["error"=>"you can't change other people's stuff"];};
        
        
        
    }   
    //
}
