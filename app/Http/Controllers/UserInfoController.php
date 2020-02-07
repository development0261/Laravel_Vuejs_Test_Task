<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userinforamtion;
use App\Userimage;


class UserInfoController extends Controller
{
    public function  addinfo(Request $request)
    {
		$request->validate(Userinforamtion::$createRules);

    	$add_data = new Userinforamtion;
    	$add_data->name = $request->get('name');
    	$add_data->email = $request->get('email');
    	$add_data->phone_number = $request->get('phone_number');
    	$add_data->zip_code = $request->get('zip_code');
    	$add_data->address = $request->get('address');
    	$add_data->save();
		
		if($add_data->save())	
		{
	    	foreach ($request->all('photo') as $key => $value) 
	        {
	            
	            if(isset($value))
	                foreach ($value as $k => $val) 
	                {
	                    $insert[$k] = $val;
	                    if (isset($val) && $val != NULL) 
	                    {
	                            $image = $val;

	                            $name = $k.date("Ymd").time().'.'.$image->getClientOriginalExtension();
	                           
	                            $destinationPath = public_path('/images');
	                            $image->move($destinationPath, $name);
	                            $image_data[$k]['image'] = $name;
	                            $image_data[$k]['user_id'] = $add_data->id;
	                    }
	                }
	        }
	        $add_image = Userimage::insert($image_data);
	    }
    }
}
