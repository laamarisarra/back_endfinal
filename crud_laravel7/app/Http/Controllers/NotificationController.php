<?php
namespace App\Http\Controllers;
use App\Notification;
use Illuminate\Http\Request;
Use DB;

class NotificationController extends Controller
{
    public function index()
    {
            $notification = Notification::latest()->paginate(100);
            return response()->json(Notification::all(), 200);
            
    }

    public function create()
    {    
        
        return response()->json(['message' => 'created'], 201);   
     }

     public function store(Request $request)
    {
        $notification=Notification::create($request->all());
        return response($notification ,201);
    }

       
      
    public function show(Notification $notification,$id)
    {
        $notification = Notification::find($id);
        if(is_null($notification)) {
            return response()->json(['message' => 'users Not Found'], 404);
        }
        return response()->json($notification::find($id), 200);
        
    }

    public function edit(Notification $notification,$id)
    {
        $notification = Notification::find($id);

        return response()->json(['message' => 'edited'], 201);     
     }

     public function update(Request $request, Notification $notification,$id)

    {
        $notification = Notification::find($id);
  
        $notification->update($request->all());
        return response($notification, 200);

    }

    public function destroy(Notification $notification,$id)
    
        {
            $notification = Notification::find($id);
            $notification->delete();
            return response()->json(null, 204);            
        } 
}
