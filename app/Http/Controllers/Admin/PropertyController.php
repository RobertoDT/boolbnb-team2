<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//autenticazione
use Illuminate\Support\Facades\Auth;
//importo controller di base
use App\Http\Controllers\Controller;
//includo lo storage
use Illuminate\Support\Facades\Storage;
//importo i Model
use App\Property;
use App\Extra;
use App\Message;

class PropertyController extends Controller
{
  public function readMessages()
  {
    $user_id = Auth::id();
    $properties = Property::where("user_id", $user_id)->get();

    // foreach ($properties as $property) {
    //
    //   if(isset($property->messages)){
    //     $property_messages = $property->messages;
    //
    //     $array_property["property"] = $property;
    //   }
    // }

    return view("admin.properties.index_messages", compact("properties"));
  }


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
        $extras = Extra::all();
        return view("admin.properties.create", compact("extras"));
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
        // dd(empty($data));
        //validation
        $request->validate([
          "title" => "required|max:255",
          "description" => "max:400",
          "rooms_number" => "required|integer",
          "beds_number" => "required|integer",
          "bathrooms_number" => "required|integer",
          "flat_image" => "required|image",
          "square_meters" => "required|integer",
          "latitude" => "required|between:-90,90",
          "longitude" => "required|between:-180,180",
          "active" => "boolean"
        ]);

        //indirizzo di salvataggio dell'immagine e creo cartella "images" dove salvo le immagini uploadate
        $path = Storage::disk("public")->put("images", $data["flat_image"]);

        //creo nuovo oggetto di tipo Proprietà
        $newProperty = new Property;

        $newProperty->user_id = Auth::id();
        $newProperty->title = $data["title"];
        $newProperty->description = $data["description"];
        $newProperty->rooms_number = $data["rooms_number"];
        $newProperty->beds_number = $data["beds_number"];
        $newProperty->bathrooms_number = $data["bathrooms_number"];
        $newProperty->flat_image = $path;
        $newProperty->square_meters = $data["square_meters"];
        $newProperty->latitude = $data["latitude"];
        $newProperty->longitude = $data["longitude"];
        if(isset($data["active"])){
          $newProperty->active = $data["active"];
        };

        //salvataggio
        $newProperty->save();

        if (isset($data["extras"])) {
          $newProperty->extras()->sync($data["extras"]);
        }

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
        $property = Property::find($id);
        $extras = Extra::all();
        return view("admin.properties.edit", compact("property", "extras"));
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
        $data = $request->all();

        //validazione
        $request->validate([
          "title" => "required|max:255",
          "description" => "max:400",
          "rooms_number" => "required|integer",
          "beds_number" => "required|integer",
          "bathrooms_number" => "required|integer",
          "flat_image" => "image",
          "square_meters" => "required|integer",
          "latitude" => "required|between:-90,90",
          "longitude" => "required|between:-180,180",
          "active" => "boolean"
        ]);


        //vado a prendere quella proprietà da modificare tramite id
        $property = Property::find($id);

        //cancelliamo path immagine precedente
        $path = Storage::disk("public")->delete("images", $data["flat_image"]);

        //modifico i dati
        $property->title = $data["title"];
        $property->description = $data["description"];
        $property->rooms_number = $data["rooms_number"];
        $property->beds_number = $data["beds_number"];
        $property->bathrooms_number = $data["bathrooms_number"];
        $path = Storage::disk("public")->put("images", $data["flat_image"]);
        $property->flat_image = $path;
        $property->square_meters = $data["square_meters"];
        $property->latitude = $data["latitude"];
        $property->longitude = $data["longitude"];
        if(isset($data["active"])){
          $property->active = $data["active"];
        } else {
          $property->active = 0;
        }
        // dd($request->flat_image);

        //faccio l'update dei Dati
        $property->update();


        if(isset($data["extras"])){
          $property->extras()->sync($data["extras"]);
        } else {
          $property->extras()->detach();
        }

        //redirect verso la pagina show della proprietà appena modificata
        return redirect()->route("admin.properties.show", $property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();
        return redirect()->route("admin.properties.index", $property);
    }
}
