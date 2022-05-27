<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   
        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }
        public function showLoginForm()
        {
          return view('auth/login');
        }
        

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ;
    // = RouteServiceProvider::HOME;
      
    public function login(Request $request){
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            
        ]);
        if( !Auth::attempt( $login )) {
            return response([ ' message' => 'Invalid login credentials.']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response([ 'user' => Auth::user(), 'access_token' => $accessToken]);
    }
    // public function redirectTo(){

    //     switch (Auth::user()->role) {
    //         case 1:
    //             $this->redirectTo = '/admin';
    //             return $this->redirectTo;
    //             break;
    //         case 2:
    //             $this->redirectTo = '/medecin' ;
    //             return $this->redirectTo;
    //             break ;

    //         case 3:
    //             $this->redirectTo = '/assistantes' ;
    //             return $this->redirectTo;
    //             break ;  
                
    //         case 4:
    //             $this->redirectTo = '/patients' ;
    //             return $this->redirectTo;
    //             break ;     

    //         default:
    //             $this->redirectTo = '/login' ;
    //             return $this->redirectTo;
                
    //     }
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('home');
    //     }

    //     return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    // public function login(Request $request)
    // {
    //     $this->validateLogin($request);

    //     if ($this->attemptLogin($request)) {
    //         $user = Auth::user();
    //         $success['token'] = $user->createToken('MyApp')->accessToken;
    //         $success['user'] = $user;
    //         return response()->json($success, 200);
    //         echo $user;
    //     }

    //     return $this->sendFailedLoginResponse($request);
    // }
    
    public function logout()
    {
        $user = Auth::user();
        $user->token()->revoke();
        $user->token()->delete();

        return response()->json(null, 204);        
    }

    public function showtoken(String $token): Response
    {
        // check jwt token, return 1 if valid, 0 if not

        
        //  return new Response(
        //      1
        // );
         
    }

    

}