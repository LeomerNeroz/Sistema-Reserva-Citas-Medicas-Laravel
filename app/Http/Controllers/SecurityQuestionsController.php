<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecurityQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class SecurityQuestionsController extends Controller
{
    public function showSecurityQuestionsForm()
    {
        
        $securityQuestions = SecurityQuestion::all();
        return view('auth.passwords.security_questions_form', compact('securityQuestions'));
    }
    
    public function setSecurityQuestions(Request $request)
    {
       
        $request->validate([
            'security_question_1_id' => 'required|exists:security_questions,id',
            'security_answer_1' => 'required|string',
            'security_question_2_id' => 'required|exists:security_questions,id|different:security_question_1_id',
            'security_answer_2' => 'required|string',
            'security_question_3_id' => 'required|exists:security_questions,id|different:security_question_1_id|different:security_question_2_id',
            'security_answer_3' => 'required|string',
        ], [
            'security_question_2_id.different' => 'La segunda pregunta no puede ser la misma que la primera.',
            'security_question_3_id.different' => 'La tercera pregunta no puede ser la misma que la primera o la segunda.'
        ]);

       /** @var \App\Models\User $user */
        $user = Auth::user();

       
        $user->security_question_1_id = $request->security_question_1_id;
        $user->security_answer_1 = Hash::make($request->security_answer_1); 
        $user->security_question_2_id = $request->security_question_2_id;
        $user->security_answer_2 = Hash::make($request->security_answer_2);
        $user->security_question_3_id = $request->security_question_3_id;
        $user->security_answer_3 = Hash::make($request->security_answer_3); 
        $user->save();

        return redirect()->route('admin.index')->with('success', 'Preguntas de seguridad guardadas correctamente.');
    }
}
