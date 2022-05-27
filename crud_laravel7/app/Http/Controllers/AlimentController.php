<?php

namespace App\Http\Controllers;
use App\Aliments;
use Illuminate\Http\Request;

class AlimentsController extends Controller
{
    public function index()
    {
            $notification = Aliments::latest()->paginate(100);
            return response()->json(Aliments::all(), 200);
            
    }

    public function create()
    {    
        
        return response()->json(['message' => 'created'], 201);   
     }

     public function store(Request $request)
    {
        $notification=Aliments::create($request->all());
        return response($notification ,201);
    }

       
      
    public function show(Aliments $notification,$id)
    {
        $notification = Aliments::find($id);
        if(is_null($notification)) {
            return response()->json(['message' => 'users Not Found'], 404);
        }
        return response()->json($notification::find($id), 200);
        
    }

    public function edit(Aliments $notification,$id)
    {
        $notification = Aliments::find($id);

        return response()->json(['message' => 'edited'], 201);     
     }

     public function update(Request $request, Aliments $notification,$id)

    {
        $notification = Aliments::find($id);
  
        $notification->update($request->all());
        return response($notification, 200);

    }

    public function destroy(Aliments $notification,$id)
    
        {
            $notification = Aliments::find($id);
            $notification->delete();
            return response()->json(null, 204);            
        } 
}
