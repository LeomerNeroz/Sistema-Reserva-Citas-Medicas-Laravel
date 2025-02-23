<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SecurityQuestion;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'security_question_1_id' => ['required', 'exists:security_questions,id'],
            'security_answer_1' => ['required', 'string'],
            'security_question_2_id' => ['required', 'exists:security_questions,id', 'different:security_question_1_id'],
            'security_answer_2' => ['required', 'string'],
            'security_question_3_id' => ['required', 'exists:security_questions,id', 'different:security_question_1_id', 'different:security_question_2_id'],
            'security_answer_3' => ['required', 'string'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'security_question_1_id' => $data['security_question_1_id'],
            'security_answer_1' => Hash::make($data['security_answer_1']),
            'security_question_2_id' => $data['security_question_2_id'],
            'security_answer_2' => Hash::make($data['security_answer_2']),
            'security_question_3_id' => $data['security_question_3_id'],
            'security_answer_3' => Hash::make($data['security_answer_3']),
        ]);
    }

    public function showRegistrationForm()
    {
        $securityQuestions = SecurityQuestion::all();
        return view('auth.register', compact('securityQuestions'));
    }
}