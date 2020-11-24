<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//autenticazione
use Illuminate\Support\Facades\Auth;
//importo controller di base
use App\Http\Controllers\Controller;
//importo i Model
use App\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $properties = Property::where("user_id", $user_id)->get();
        return view("admin.properties.index", compact("properties"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.properties.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //validation
        $request->validate([
          "title" => "",
          "description" => "",
          "rooms_number" => "",
          "beds_number" => "",
          "bathrooms_number" => "",
          "square_meters" => "",
          "latitude" => "",
          "longitude" => "",
          
        ]);

        // !!!!!flat_image!!!!

        //creo nuovo oggetto di tipo Proprietà
        $newProperty = new Property;

        //salvataggio
        $newProperty->save();

        //redirect verso nuova pagina (show)
        return redirect()->route("admin.properties.show", $newProperty);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        return view("admin.properties.show", compact("property"));
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
