<?php

namespace App\Http\Controllers\Message;

use Exception;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TwilioMessageController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function index()
    // {

    //     $message="I'm villain";
    //         // $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
    //                 // $client = new \Nexmo\Client($basic);
    //                 $basic  = new \Vonage\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
    //     $client = new \Vonage\Client($basic);
    //                 $response = $client->sms()->send(
    //         new \Vonage\SMS\Message\SMS("959967684225", "Wai LIN NAING", $message)
    //     );

    //     // $message = $response->current();
    //     dd($client);
    //     if ($message->getStatus() == 0) {
    //         if($client){
    //             dd($client);
    //             dd("message sent successfully");
    //         }
    //         else{
    //             dd("SOMETHING WRONG");
    //         }
    //     } else {
    //         echo "The message failed with status: " . $message->getStatus() . "\n";
    //     }
    // }

    public function index() {
    }
}