<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use App\Aliment;
use App\Fiche;

use Auth;

use Illuminate\Support\Facades\DB;

class FicheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Fiche::all(), 200);
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
       $aliment_id = $request->input('aliment_id');
       $user_id = $request->input('user_id');
        $fiche =new Fiche();
        $fiche->aliment_id= $aliment_id;
        $fiche->user_id= $user_id;
        

        
        
         $fiche->save();

       

       
        return response()->json(['message' => 'ajouter'], 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fiche = Fiche::find($id);
        if(is_null($fiche)) {
            return response()->json(['message' => 'fiche Not Found'], 404);
        }
        return response()->json($fiche::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fiche =  Fiche::find($id);

        return response()->json(['message' => 'edited'], 201);     
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
        $fiche = Fiche::find($id);
        $fiche -> aliment_id = $request->input('aliment_id');
        $fiche -> user_id = $request->input('user_id');
        $fiche->update();

        return response($fiche, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fiche = Fiche::find($id);
            $fiche->delete();
      
            return response()->json(['message' => 'supprimer'], 201);
    }
}
