<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SecurityQuestion;
use Illuminate\Support\Facades\Hash;

class PasswordRecoveryController extends Controller
{
    
    public function showEmailForm()
    {
        return view('auth.passwords.recovery_password_step1');
    }

    
    public function showSecurityQuestions(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        $securityQuestions = SecurityQuestion::whereIn('id', [
            $user->security_question_1_id,
            $user->security_question_2_id,
            $user->security_question_3_id,
        ])->get()->keyBy('id');

        return view('auth.passwords.recovery_password_step2', compact('user', 'securityQuestions'));
    }

    
    public function verifySecurityAnswers(Request $request)
    {
       
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'security_answer_1' => 'required|string',
            'security_answer_2' => 'required|string',
            'security_answer_3' => 'required|string',
        ]);

       
        $user = User::findOrFail($request->user_id);

        
        if (
            Hash::check($request->security_answer_1, $user->security_answer_1) &&
            Hash::check($request->security_answer_2, $user->security_answer_2) &&
            Hash::check($request->security_answer_3, $user->security_answer_3)
        ) {
            
            return view('auth.passwords.recovery_password_reset', compact('user'));
        } else {
            
            return redirect()->route('recovery.password.incorrect');
        }
    }

   
    public function resetPassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::findOrFail($request->user_id);

        
        $user->password = Hash::make($request->password);
        $user->save(); 

        
        return redirect()->route('login')->with('success', 'Contraseña actualizada correctamente');
    }
}