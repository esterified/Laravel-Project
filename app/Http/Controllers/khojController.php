<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\data;
use Illuminate\Support\Facades\Auth;

class khojController extends Controller
{
    //

public function search(Request $request) {
  //validate the form data
  //rules for validator
  $rules= [
    'input'=> 'required|regex:/^(\d+,\s?)+\d+$/',
    'value'=> 'required',
  ];
  //validation for missing values in the request
  $validator = Validator::make($request->all(),$rules);
  if ($validator->fails()) {
  $request->session()->forget('flag');
  return redirect()->route('dashboard')
            ->withErrors($validator)
            ->withInput();
  }


  $str=$request->input('input');//input values
  $val=$request->input('value');//search item 
  $flag=1;//1 for false and 2 for true
  //split string 
  $arr=explode(',',$str);
  for($x=0;$x<count($arr);$x++)
  {
  $arr[$x]=trim($arr[$x]," ");
  }
  //convert string array to integer array
  $integerIDs=array_map('intval', $arr);
  //reverse sort in desc
  rsort($integerIDs);
  //search for values matching the value parameter
  for($x=0;$x<count($integerIDs);$x++)
  {
    if($val==$integerIDs[$x]){
      $flag=2;
    }
  //echo $integerIDs[$x];
  //echo '<br/>';
  }
  $data=new data;
  $data->num_array=implode(", ",$integerIDs);
  $data->user_id=Auth::user()->id;
  $data->save();
  return redirect()->route('dashboard')->with('flag',$flag)->withInput();
  return view('dashboard',['flag' => $flag]);

  
}


}
