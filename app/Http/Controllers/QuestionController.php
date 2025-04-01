<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        if (request()->query('question') == 'reverseString') {
            dump($this->reverseString());
        }

        return view('question.list');
    }

    /**
     * Reverse a string
     */
    public static function reverseString()
    {
        $string = "This is test message";

        for ($i = 0; $i < strlen($string); $i++) {
            $reversedString[$i] = $string[strlen($string) - $i - 1];
        }
        
        return [
            'original' => $string,
            'reversed' => implode('', $reversedString),
        ];
    }
}
