<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator as Validator;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function getOffers()
    {
     return Offer::get();
    }
   /* public function storeData()
    {
        Offer::create([
        'name'=>'first bundle',
        'price'=>'200$',
        'details'=>'economic bundle',
    ]);
    echo'Data has been inserted ';

    }*/
public function create()
{
    return view('offer.create');
}

public function store(Request $request)
{
    // validate data before insert to database
    $errorMessages = $this->getMessages();
    $rules = $this->getRules();
    $validator = Validator::make($request->all(),$rules,$errorMessages);

    if($validator->fails())
    {
        return redirect()->back()->withErrors($validator)->withInput($request->all());
        //return json_encode($validator->errors(),JSON_UNESCAPED_UNICODE);
    }

    //insert
    Offer::create([
        'name'=>$request->name,
        'price'=>$request->price,
        'details'=>$request->details,
]);
return redirect()->back()->with(['success'=>'تمت اضافة العرض']);
}



 protected function getMessages()
     {
       return $error_message =
[
    'name.required'=>__('messages.offer name required'),
    'name.unique'=>__('messages.the name is already taken'),
    'price.required'=>__('messages.the price field shouldnt be empty'),
    'details.required'=>__('messages.the details field shouldnt be empty'),
];
     }

 protected function getRules()
     {
       return    $rules = [
        'name'=>'required|max:100|unique:offers,name',
        'price'=>'required',
        'details'=>'required',
    ];
     }
}
