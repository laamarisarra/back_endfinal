<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaladieController extends Controller
{
    public function index()
    {
            $notification = Maladie::latest()->paginate(100);
            return response()->json(Maladie::all(), 200);
            
    }

    public function create()
    {    
        
        return response()->json(['message' => 'created'], 201);   
     }

     public function store(Request $request)
    {
        $notification=Maladie::create($request->all());
        return response($notification ,201);
    }

       
      
    public function show(Maladie $notification,$id)
    {
        $notification = Maladie::find($id);
        if(is_null($notification)) {
            return response()->json(['message' => 'users Not Found'], 404);
        }
        return response()->json($notification::find($id), 200);
        
    }

    public function edit(Maladie $notification,$id)
    {
        $notification = Maladie::find($id);

        return response()->json(['message' => 'edited'], 201);     
     }

     public function update(Request $request, Maladie $notification,$id)

    {
        $notification = Maladie::find($id);
  
        $notification->update($request->all());
        return response($notification, 200);

    }

    public function destroy(Maladie $notification,$id)
    
        {
            $notification = Maladie::find($id);
            $notification->delete();
            return response()->json(null, 204);            
        } 

}


