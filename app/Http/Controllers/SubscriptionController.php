<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions=  Subscription::where('user_id',auth()->user()->id)->get();
        return response($subscriptions, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =[
            "user_id"=> auth()->user()->id,
            "subscribedOn"=>json_encode(request("subscribedOn"))
        ];
        Subscription::create($data);
        return response("user subscribed", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $subs = Subscription::find($id);
        $curSubsn = json_decode($subs->subscribedOn); //currentSubscrionDetail
       
        $newSms = request('subscribedOn')['sms'] ?? null;
        $newEmail= request('subscribedOn')['email'] ?? null;
        $sms = $newSms ?? $curSubsn->sms;   
        $email =$newEmail ?? $curSubsn->email;
         
        $newData = ["subscribedOn"=>["sms"=>$sms,"email"=>$email]]; //new subscription detail
        $subs->update($newData);
        
        return response($subs, 203);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
