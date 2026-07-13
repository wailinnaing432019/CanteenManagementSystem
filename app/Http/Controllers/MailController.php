<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\Setting;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class MailController extends Controller
{
    public function index(ContactRequest $request){
        $request->validated();
        $mailData=[
            'title'=>$request->input('title'),
            'email'=>$request->input('email'),
            'message'=>$request->input('message'),
            'name'=>$request->input('name'),
        ];
        $setting=Setting::first();
        Mail::to($setting->email)->send(new ContactUs($mailData));
        return redirect('/')->with('message',"Message Sent Success");
    }
}