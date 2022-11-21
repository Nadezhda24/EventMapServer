<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EncryptCookies;
use App\Mail\FeedbackMail;
use App\Model\Text;
use App\Models\Address;
use App\Models\Category;
use App\Models\Color;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventsController extends Controller{

    public function getUsers(){
        return response()->json(User::all(), 200);
    }

    public function userLogin($id){
        return response()->json(
            User::where(['id' => $id])
                ->get(), 200);
    }

    public function loginData(Request $request){
        return response()->json(
            User::where(['mail' => $request->mail])
                ->get()[0], 201);
    }

    public function newEvent(Request $request){
       $Event =  Event::create([
           'adress_id' => $request->adress_id,
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'image' => $request->image,
            'user_id' => $request->user_id,
        ]);

       return response()->json($Event, 201);
    }

    public function getPassword(Request $request){
        $user = User::where(['mail' => $request->mail])->get()[0];
        $comment = "Ваш пароль: ".$user->password;
        $toEmail = $user->mail;
        Mail::to($toEmail)->send(new FeedbackMail($comment));
    }

    public function getEvents(){
        $events = Event::all();
        foreach ($events as $event){
            $event['category'] = Category::where(['id'=> $event['category_id']])->get()[0];
            $event['category']['color'] = Color::where(['id'=> $event['category']['color_id']])->get()[0];
            $event['address'] = Address::where(['id'=> $event['adress_id']])->get()[0];
            $event['user'] = User::where(['id'=> $event['user_id']])->get()[0];
        }
        return response()->json($events, 200);
    }

    public function getCategory(){
        return response()->json( Category::all(), 200);
    }

    public function getEventFilter($id){

        if ($id > 0){
            $events = Event::where(['category_id' => $id])
                ->get();
        }else{
            $events = Event::all();
        }


        foreach ($events as $event){
            $event['category'] = Category::where(['id'=> $event['category_id']])->get()[0];
            $event['category']['color'] = Color::where(['id'=> $event['category']['color_id']])->get()[0];
            $event['address'] = Address::where(['id'=> $event['adress_id']])->get()[0];
            $event['user'] = User::where(['id'=> $event['user_id']])->get()[0];
        }

        return response()->json($events, 200);
    }
}
