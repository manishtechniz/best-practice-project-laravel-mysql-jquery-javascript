<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        if (! empty(request()->query('question'))) {
            if (auth()->user()->can(request()->query('permission'))) {
                dump($this->{request()->query('question')}());

                return view('question.list');   
            }

            abort(403, 'Unauthorized action.');
        }

        $allQuestions = [
            'reverseString' => $this->reverseString(),
            'findMissingNumber' => $this->findMissingNumber(),
            'findNotRepeatedCharacter' => $this->findNotRepeatedCharacter(),
            'checkAnagrams' => $this->checkAnagrams(),
            'checkPrimeNumber' => $this->checkPrimeNumber(),
            'findSubArray' => $this->findSubArray(),
            'findFactorial' => $this->findFactorial(),
            'reverseInteger' => $this->reverseInteger(),
            'findSecondLargest' => $this->findSecondLargest(),
            'getKeyWhereNameX' => $this->getKeyWhereNameX(),
            'reverseWordsInSentence' => $this->reverseWordsInSentence(),
            'findLongestCommonPrefix' => $this->findLongestCommonPrefix(),
            'stringCompressionAlgorithm' => $this->stringCompressionAlgorithm(),
        ];

        return view('question.list', [
            'allQuestions' => $allQuestions,
        ]);
    }

    /**
     * Reverse a string
     */
    public function reverseString()
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
    public function findMissingNumber()
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

    /**
     * Find not repeated character in string    
     */
    public function findNotRepeatedCharacter()
    {
        $string = "aabbccccdeee";

        for ($i = 0; $i < strlen($string); $i++) {
            if (substr_count($string, $string[$i]) == 1) {
                return [
                    'original' => $string,
                    'not_repeated' => $string[$i],
                ];
            }
        }

        return [
            'original' => $string,
            'not_repeated' => null,
            'message' => 'All characters are repeated',
        ];
    }

    /**
     * Check strings are anagrams or not
     */
    public function checkAnagrams()
    {
        $string1 = "listen";
        $string2 = "silent";

        $string1 = strtolower(str_replace(' ', '', $string1));
        $string2 = strtolower(str_replace(' ', '', $string2));

        $response = [
            'string1' => $string1,
            'string2' => $string2,
            'anagrams' => false,
        ];

        if (strlen($string1) != strlen($string2)) {
            return $response;
        }

        $anagram = true;

        for ($i = 0; $i < strlen($string1); $i++) {
            if (substr_count($string1, $string1[$i]) != substr_count($string2, $string1[$i])) {
                $anagram = false;

                break;
            }
        }

        if ($anagram) {
            return array_merge($response, [
                'anagrams' => true,
            ]);
        }

        return $response;
    }

    /**
     * Check number is prime or not
     */
    public function checkPrimeNumber()
    {
        $number = 11;

        if ($number <= 1) {
            return [
                'number' => $number,
                'prime' => false,
            ];
        }

        for ($i = 3; $i <= sqrt($number); $i+=2) {
            if ($number % $i == 0) {
                return [
                    'number' => $number,
                    'prime' => false,
                ];
            }
        }

        return [
            'number' => $number,
            'prime' => true,
        ];
    }

    /**
     * Find sub array which specific id
     */
    public function findSubArray()
    {
        $array = [
            ['id' => 1, 'name' => 'Test1'],
            ['id' => 2, 'name' => 'Test2'],
            ['id' => 3, 'name' => 'Test3'],
            ['id' => 4, 'name' => 'Test4'],
            ['id' => 5, 'name' => 'Test5'],
            ['id' => 10, 'name' => 'Test10-1'],
            ['id' => 10, 'name' => 'Test10-2'],
        ];

        $arrayWith11Id = array_values(array_filter($array, function ($item) {
            return $item['id'] == 11;
        }));

        if (empty($arrayWith11Id)) {
            return [
                'original' => $array,
                'array_with_id' => [],
                'message' => 'No array found',
            ];
        }

        return [
            'original' => $array,
            'array_with_id' => $arrayWith11Id,
        ];
    }

    /**
     * Find factoral number using recursion
     */
    public function findFactorial()
    {
        $number = 5;

        return [
            'number' => $number,
            'factorial' => $this->factorialRecursion($number),
        ];
    }

    public function factorialRecursion($number)
    {
        if ($number == 0 || $number == 1) {
            return 1;
        }

        return $number * $this->factorialRecursion($number - 1);
    }

    /**
     * Reverse integer number with converting to string
     */
    public function reverseInteger()
    {
        $number = 123456;

        $originalNumber = $number;

        $reversedNumber = 0;

        while ($number > 0) {
            $reversedNumber = $reversedNumber * 10 + $number % 10;

            $number = (int) ($number / 10);
        }

        return [
            'original' => $originalNumber,
            'reversed' => $reversedNumber,
        ];
    }

    /**
     *  Find the Second Largest Element in an Array
     */
    public function findSecondLargest()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        $originalArray = $array;

        rsort($array);

        if (count($array) < 2) {
            return [
                'original' => $array,
                'second_largest' => null,
                'message' => 'Array should have at least two elements',
            ];
        }

        return [
            'original' => $originalArray,
            'second_largest' => $array[1],
        ];
    }

    /**
     * Get the key where name = 'x' in a multidimensional array without using a loop
     */
    public function getKeyWhereNameX()
    {
        $array = [
            ['id' => 1, 'name' => 'Test1'],
            ['id' => 2, 'name' => 'Test2'],
            ['id' => 3, 'name' => 'Test3'],
            ['id' => 4, 'name' => 'Test4'],
            ['id' => 5, 'name' => 'Test5'],
            ['id' => 10, 'name' => 'x'],
            ['id' => 11, 'name' => 'x'],
        ];

        $arrayWithNameX = array_values(array_filter($array, function ($item) {
            return $item['name'] == 'x';
        }));

        if (empty($arrayWithNameX)) {
            return [
                'original' => $array,
                'key_with_name_x' => [],
                'message' => "No key found with name x",
            ];
        }

        return [
            'original' => $array,
            'key_with_name_x' => array_column($arrayWithNameX, 'id'),
        ];
    }

    /**
     * Reverse Words in a Sentence Without Using explode
     */
    public function reverseWordsInSentence()
    {
        $sentence = "This is a test sentence";

        $reversedSentence = '';

        $word = '';

        for ($i = strlen($sentence) - 1; $i >= 0; $i--) {
            if ($sentence[$i] == ' ') {
                $reversedSentence .= strrev($word) . ' ';

                $word = '';
            } else {
                $word .= $sentence[$i];
            }
        }

        $reversedSentence .= strrev($word);

        return [
            'original' => $sentence,
            'reversed' => trim($reversedSentence),
        ];
    }

    /**
     * Find the Longest Common Prefix in an Array of Strings
     */
    public function findLongestCommonPrefix()
    {
        $array = ['test', 'tgest', 'tmest', 'tbest'];

        if (empty($array)) {
            return [
                'original' => $array,
                'longest_common_prefix' => '',
                'message' => 'Array is empty',
            ];
        }

        $prefix = $array[0];

        for ($i = 1; $i < count($array); $i++) {
            while(substr($array[$i], 0, strlen($prefix)) != $prefix) {
                $prefix = substr($prefix, 0, -1);

                if (empty($prefix)) {
                    return [
                        'original' => $array,
                        'longest_common_prefix' => '',
                        'message' => 'No common prefix found',
                    ];
                }
            }
        }

        return [
            'original' => $array,
            'longest_common_prefix' => $prefix,
        ];
    }

    /**
     * Implement a Basic String Compression Algorithm
     */
    public function stringCompressionAlgorithm()
    {
        $string = "aaabbbcccck";

        $compressedString = '';

        $totalRepeatedCharInString = 1;

        for($i=0;$i<strlen($string)-1;$i++) {
            $totalRepeatedCharInString++;

            if ($string[$i] != $string[$i+1]) {
                $compressedString = $compressedString . $string[$i] . ($totalRepeatedCharInString-1);
                $totalRepeatedCharInString = 1;
            }
        }

        $compressedString = $compressedString . $string[$i] . $totalRepeatedCharInString;

        return [
            'original' => $string,
            'compressed' => $compressedString,
        ];
    }
}
