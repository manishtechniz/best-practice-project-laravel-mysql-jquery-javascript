<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        if (! empty(request()->query('question'))) {
            dump($this->{request()->query('question')}());
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

    /**
     * Find missing number in array
     */
    public static function findMissingNumber()
    {
        $arr = [1, 2, 3, 4, 5, 7, 8, 9, 10];

        $missingNumber = null;

        for ($i = 1; $i <= count($arr); $i++) {
            if (!in_array($i, $arr)) {
                $missingNumber = $i;
                break;
            }
        }

        return [
            'original' => $arr,
            'missing' => $missingNumber,
        ];
    }
}
