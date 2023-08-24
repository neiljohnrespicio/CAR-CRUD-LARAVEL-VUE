<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class traincontroller extends Controller
{
    
    public function formSubmit(Request $request){
        if($request->id != 0){
            $new_name = Car::find($request->id);
        }else{
            $new_name = new Car;
        }

        $new_name->brand = $request->brand;
        $new_name->model = $request->model;
        $new_name->datepur = $request->datepur;
        $new_name->prevowner = $request->prevowner;
        $new_name->cpn = $request->cpn;
        $new_name->status = $request->status;
        $new_name->owner = $request->owner;
        $res = $new_name->save();
        return $res;

    }
//-----------------------Delete---------------    

    public function deletefunc(Request $request){
        return Car::where('id', $request->id)->delete();
    }

    public function sell(Request $request){
        return Car::where('id', $request->id)->update(['state'=>'Sold']);
    }
//--------------------Display----------------------    

   // public function getNames(){
   //     $items = Student::all();
   //     return view('table',compact('items'));
   // }
   public function getNames(){
        return Car::all();
    }

//---------------------Edit---------------------
    public function form($id=0){
        $data = [
            'id' => 0,
            'brand' =>'',
            'model' => '',
            'datepur' => '',
            'prevowner' => '',
            'cpn' => '',
            'status' => '',
            'owner' => '',
            
        ];

        if($id != 0){
            $student = Car::find($id);
            $data['id'] = $id;
            $data['brand'] = $student->brand;
            $data['model'] = $student->model;
            $data['datepur'] = $student->datepur;
            $data['prevowner'] = $student->prevowner;
            $data['cpn'] = $student->cpn;
            $data['status'] = $student->status;
            $data['owner'] = $student->owner;

        return compact('data');

    }

    }

    public function sellItems(){
        return Car::where('state','Sell')->get();
    }

    public function soldItems(){
        return Car::where('state','Sold')->get();
    }

}