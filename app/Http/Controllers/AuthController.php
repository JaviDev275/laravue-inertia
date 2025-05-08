<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request) {
        sleep(1);
        //Validate request
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed','min:8'],
        ], [], [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
        ]);
        
        //Register user
        $user = User::create($fields);

        //Login user
        auth()->login($user);

        //Redirect
        return redirect()->route('home');
    }
    public function login(Request $request){
        $fields = $request -> validate([
            'email' => ['required'],
            'password' => ['required'],
        ],[],[
            'email' => 'correo electrónico',
            'password' => 'contraseña',
        ]);
        if(Auth::attempt($fields, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Las credenciales proporcionadas no son correctas.']);
    
    } 

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}