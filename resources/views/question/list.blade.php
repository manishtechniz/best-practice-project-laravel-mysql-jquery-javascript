<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Lists</title>
</head>
<body>
    <h1>Question Lists

        @if (! empty(request()->query('question')))

         <a style="color: green" href="{{ route('question') }}">
            <button>All Answer</button>
        </a>

        @endif
    </h1>

    <p style="color: green;background-color:brown;color:white;padding:4px">Click on the question to view the answer.</p>

    <details open>
        <summary style="font-weight:bold;font-size:19px; background-color: green;color:white; padding: 10px; cursor: pointer;opacity:0.8">Laravel Questions</summary>

        <ul>
            <li>
                <a href="{{ route('question', ['question' => 'reverseString']) }}" >
                    1. Reverse String 
                </a>

                @if(! empty($allQuestions)) @dump($allQuestions['reverseString']) @endif
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'findMissingNumber']) }}" > 
                    3. Find missing number from nth array 
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['findMissingNumber']) @endif
            </li>

            <li>
                4. Fetch all products with their category name only
                <p>
                    <code>
                        Product::with('category:name')->get();
                    </code>

                    <br>

                    This prevent <code>n+1</code> query problem. It is called eger loading.
                </p>
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'findNotRepeatedCharacter']) }}" > 
                    5. Find not repeated character from string.
                </a>

                @if(! empty($allQuestions)) @dump($allQuestions['findNotRepeatedCharacter']) @endif
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'checkAnagrams']) }}" > 
                    6. Check strings are anagrams or not 
                </a>

                @if(! empty($allQuestions)) @dump($allQuestions['checkAnagrams']) @endif
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'checkPrimeNumber']) }}" > 
                    7. Check number is prime or not
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['checkPrimeNumber']) @endif
            </li>

            <li>
                8. Get selected columns from table
                <p>
                    <code>
                        Table::select(col1, col2,....)->get();
                    </code>
                </p>
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'findSubArray']) }}" > 
                    10. Find sub array with id
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['findSubArray']) @endif
            </li>
            
            <li>
                <a href="{{ route('question', ['question' => 'findFactorial']) }}" > 
                    11. Find factoral with using recursion
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['findFactorial']) @endif
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'reverseInteger']) }}" > 
                    12. Reverse integer number with converting to string
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['reverseInteger']) @endif
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'findSecondLargest']) }}" > 
                    13. Find second largest number from array
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['findSecondLargest']) @endif
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'getKeyWhereNameX']) }}" > 
                    14. Get the key where name = 'x' in a multidimensional array without using a loop
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['getKeyWhereNameX']) @endif
            </li>

            <li>
                15. Implement a Basic Rate Limiter
                <p>
                    I set rate limit 1 request per second. If you want check please press <code> f5 </code> very fast and rapidly.
                </p>
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'reverseWordsInSentence']) }}" > 
                    16. Reverse Words in a Sentence Without Using explode
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['reverseWordsInSentence']) @endif
            </li>
            
            <li>
                <a href="{{ route('question', ['question' => 'findLongestCommonPrefix']) }}" > 
                    17. Find the Longest Common Prefix in an Array of Strings
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['findLongestCommonPrefix']) @endif
            </li>

            <li>
                <a href="{{ route('question', ['question' => 'stringCompressionAlgorithm']) }}" > 
                    18. Implement a Basic String Compression Algorithm
                </a>
                @if(! empty($allQuestions)) @dump($allQuestions['stringCompressionAlgorithm']) @endif
            </li>

            <li>
                20. Schedule a task to send email every hour

                <p>Set envirment variables</p>

                    <code> MAIL_MAILER= </code> <br>
                    <code> MAIL_HOST= </code> <br>
                    <code> MAIL_PORT= </code> <br>
                    <code> MAIL_USERNAME= </code> <br>
                    <code> MAIL_PASSWORD= </code> <br>
                    <code> MAIL_ENCRYPTION= </code> <br>

                <code>
                    QUEUE_CONNECTION=database
                </code>

                <p>then run commands</p>

                <code>php artisan queue:work</code> <br>
                <code>php artisan schedule:work</code>

            </li>
        </ul>
    </details>
</body>
</html>