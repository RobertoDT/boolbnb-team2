<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//importo controller di base
use App\Http\Controllers\Controller;
//autenticazione
use Illuminate\Support\Facades\Auth;
// BRAINTREE
use Braintree;
//models
use App\Sponsor;
use App\Property;
//carbon
use Carbon\Carbon;
//Facades DB
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $sponsors = Sponsor::all();

        $user_id = Auth::id();
        $properties = Property::where("user_id", $user_id)->get();

        $token = $gateway->ClientToken()->generate();
        return view("admin.properties.sponsors", compact('token', 'sponsors', 'properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
          "sponsor_id" => "required",
          "property_id" => "required"
        ]);

        $now = Carbon::now();

        $id_sponsored = DB::table('property_sponsor')
        ->where('end_sponsor', '>=', $now)
        ->where('property_id', '=', $request->property_id)
        ->first();

        if($id_sponsored != null){
            $end_sponsor = $id_sponsored->end_sponsor;
            return back()->with('sponsor_active_message', 'La tua sponsorizzazione è ancora valida fino al '.$end_sponsor.' termina questa per effettuarne una nuova. Grazie il Team BoolB&B');
        }

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        $property = Property::find($request->property_id);
        $sponsor = Sponsor::find($request->sponsor_id);
        $property = $request->property_id;

        $end = $now->addHours($sponsor->duration)->format('Y-m-d H:i:s');
        $created_at = Carbon::now();

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            // inserire store sponsors
            $sponsor->properties()->attach(
              $property,
              ['created_at' => $created_at, 'end_sponsor' => $end]
            );
            // return back()->with('success_message', 'Payment went through, Thak you Mate!');
            return redirect()->route('admin.properties.show', $property)->with('success_message', 'Payment went true, Thak you Mate!');

        } else {
            $errorString = "";

            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            return back()->withErrors('Payment didn\'t go through');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
