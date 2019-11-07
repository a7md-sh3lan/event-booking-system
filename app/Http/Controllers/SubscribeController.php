<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Category;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    //
    public function show() {
        $categories = Category::all();
        return view("index", compact('categories'));
    }

    public function subscribe(Request $request) {
        Validator::extend('uniqueTicketTypeBooking', function ($attribute, $value, $parameters, $validator) {
            $count = Subscriber::where('email', $value)
                                        ->where('ticket_type', $parameters[0])
                                        ->count();
        
            return $count === 0;
        });

        // create custom validation messages ------------------
        $messages = array(
            'required' => 'The :attribute is required',
            'name.regex'  => 'The :attribute must be only letters',
            'phone_number.regex'  => 'The :attribute must be egyption mobile number',
            'unique_ticket_type_booking' => 'you can book only one ticket from each type',
        );

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[a-zA-Z ]+$/u', 'max:50'],
            'email' => ['required', 'email', 'uniqueTicketTypeBooking:'.$request->ticket_type],
            'phone_number' => ['required', 'regex:/(01)[0125][0-9]{8}/'],
            'ticket_type' => ['required', 'exists:categories,id'],
        ], $messages);


        if ($validator->fails()) {
            return response()->json(['msg' => 'Something went wrong. Please try again!', 'status' => false, 'errors' => $validator->errors()], 422);
         }

        $category = Category::find($request->ticket_type);
        if($category->isAvilable()) {
            Subscriber::create($request->all());
            $category->bookTicket();
            return response()->json(['msg' => 'BINGO! We will wait you and remember that you will pay '.$category->price.' LE at the Greek Campus gate..', 'status' => true, 'type' => $category->id,'remain' => $category->avilable_tickets], 200);
        }
        return response()->json(['msg' => 'Sorry there are no avilable '.$category->type, 'status' => false], 422);
    }
}
