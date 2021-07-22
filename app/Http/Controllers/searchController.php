<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\data;

class searchController extends Controller
{  
public function search(Request $request){
 // //flag for succesful request count
 $status="failure";
 //rules for validator
 $rules= [
    'user_id'=> 'required',
    'start_datetime'=> 'required',
    'end_datetime'=> 'required',
];
 //validation for missing values in the request
$validator = Validator::make($request->all(),$rules);

 if($validator->fails()){
     return  $validator->errors();
 } 
 $y=data::where('user_id', request('user_id'))
 ->where('added_on','>=', request('start_datetime'))
 ->where('added_on','<=', request('end_datetime'))
 ->get();
 $dataCount=count($y);
 if($dataCount>0){
 //response when data found
 $status="success";
 //initialize an empty array for fixed size
 $payload=array($dataCount);
 for($i=0;$i<$dataCount;$i++){
 $payload[$i]=[
     'timestamp'=>$y[$i]->added_on,
     'input_values'=>$y[$i]->num_array,
 ];

 }
 $response=['status'=>$status,
 'user_id'=> request('user_id'),
 'payload'=>$payload,
  ];
 }
 else{
     //response when no data found
 $response=['status'=>'success',
 'payload'=>"no data found",
     ];  
 }

 //$myJSON = json_encode($tmp1);
 return response()->json($response, 200);
    }
   
}
