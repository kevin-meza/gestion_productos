<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos.',
                'errors'  => $validator->errors(),
            ], 422);

        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            $mensaje = "Credenciales incorrectas.";
            return redirect()->back()->with('error', $mensaje);
        }

        /** @var User $user */
        $user = Auth::user();

        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json([
        //     'message'      => 'Login exitoso.',
        //     'user'         => $user,
        //     'access_token' => $token,
        //     'token_type'   => 'Bearer',
        // ], 200);
         return view('home.home');
    }

}
