@if (session('success'))
    <div style="color: white; background-color: green;padding: 4px">
        {{ session('success') }}
    </div>
@endif

<h1> Update permissions </h1>

All Permissions <input type="checkbox" id="all-permissions"> <br> <br>
<form action="{{ route('permission') }}" method="POST">
    @csrf
    @method('PUT')
    @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20] as $value)
        <label for="permission-{{ $value }}" style="cursor: pointer"> Laravel Question: </label>
        {{ $value }} <input type="checkbox" class="permission" id="permission-{{ $value }}"
            name="permission[]" value="php:{{ $value }}"
            {{ auth()->user()->can('php:' . $value)? 'checked': '' }}>
    @endforeach
    <br><br>

    <input type="submit" value="Update">
</form>

<h1>Question Lists

    @if (!empty(request()->query('question')))
        <a style="color: green" href="{{ route('question') }}">
            <button>All Answer</button>
        </a>
    @endif
</h1>

<p style="color: green;background-color:brown;color:white;padding:4px">Click on the question to view the answer.</p>

<details open>
    <summary
        style="font-weight:bold;font-size:19px; background-color: green;color:white; padding: 10px; cursor: pointer;opacity:0.8">
        Laravel Questions</summary>
    @php
        $laravelQuestions = [
            [
                'sort' => '1',
                'question' => 'reverseString',
                'label' => 'Reverse String',
            ],
            [
                'sort' => '2',
                'question' => null,
                'label' => 'Create a Laravel middleware that logs every incoming request URL and method',
                'closure' => function () {
                    return '
                    <p>Please check incoming request <code>logs/laravel.log</code> file </p>
                ';
                },
            ],
            [
                'sort' => '3',
                'question' => 'findMissingNumber',
                'label' => 'Find missing number from nth array',
            ],
            [
                'sort' => '4',
                'question' => null,
                'label' => ' Fetch all products with their category name only',
                'closure' => function () {
                    return '<p>
                    <code>
                        Product::with(category:name)->get();
                    </code>

                    <br>

                    This prevent <code>n+1</code> query problem. It is called eger loading.
                </p>';
                },
            ],
            [
                'sort' => '5',
                'question' => 'findNotRepeatedCharacter',
                'label' => 'Find not repeated character from string.',
            ],
            [
                'sort' => '6',
                'question' => 'checkAnagrams',
                'label' => 'Check strings are anagrams or not ',
            ],
            [
                'sort' => '7',
                'question' => 'checkPrimeNumber',
                'label' => 'Check number is prime or not',
            ],
            [
                'sort' => '8',
                'question' => null,
                'label' => 'Get selected columns from table',
                'closure' => function () {
                    return '<p>
                    <code>
                        Table::select(col1, col2,....)->get();
                    </code>
                </p>';
                },
            ],
            [
                'sort' => '9',
                'question' => null,
                'label' => 'Write a Job to insert thousands of records in a table using batch',
                'closure' => function () {
                    return '<a href="' . route('user_batch') . '"> Create Batch Job for user table</a>';
                },
            ],
            [
                'sort' => '10',
                'question' => 'findSubArray',
                'label' => 'Find sub array with id',
            ],
            [
                'sort' => '11',
                'question' => 'findFactorial',
                'label' => 'Find factoral with using recursion',
            ],
            [
                'sort' => '12',
                'question' => 'reverseInteger',
                'label' => 'Reverse integer number with converting to string',
            ],
            [
                'sort' => '13',
                'question' => 'findSecondLargest',
                'label' => 'Find second largest number from array',
            ],
            [
                'sort' => '14',
                'question' => 'getKeyWhereNameX',
                'label' => 'Get the key where name = x in a multidimensional array without using a loop',
            ],
            [
                'sort' => '15',
                'question' => null,
                'label' => 'Implement a Basic Rate Limiter',
                'closure' => function () {
                    return '<p>
                    I set rate limit 1 request per second. If you want check please press <code> f5 </code> very fast and rapidly.
                </p>';
                },
            ],
            [
                'sort' => '16',
                'question' => 'reverseWordsInSentence',
                'label' => 'Reverse Words in a Sentence Without Using explode',
            ],
            [
                'sort' => '17',
                'question' => 'findLongestCommonPrefix',
                'label' => 'Find the Longest Common Prefix in an Array of Strings',
            ],
            [
                'sort' => '18',
                'question' => 'stringCompressionAlgorithm',
                'label' => 'Implement a Basic String Compression Algorithm',
            ],
            [
                'sort' => '19',
                'question' => null,
                'label' => 'Create a middleware to check the user role and permission',
                'closure' => function () {
                    return '<p>
                    Add permission to the user (user login automatic) then access and deny laravel questions.
                </p>
                
                <p> Please update permission for apply this functionality </p>
                ';
                },
            ],
            [
                'sort' => '20',
                'question' => null,
                'label' => 'Schedule a task to send email every hour',
                'closure' => function () {
                    return '<p>Set envirment variables</p>

                <code> MAIL_MAILER= </code> <br>
                <code> MAIL_HOST= </code> <br>
                <code> MAIL_PORT= </code> <br>
                <code> MAIL_USERNAME= </code> <br>
                <code> MAIL_PASSWORD= </code> <br>
                <code> MAIL_ENCRYPTION= </code> <br>

                <code>QUEUE_CONNECTION=database</code>

                <p>then run commands</p>

                <code>php artisan queue:work</code> <br>
                <code>php artisan schedule:work</code>';
                },
            ],
        ];
    @endphp

    <ul>
        @foreach ($laravelQuestions as $list)
            @if (!auth()->user()->can('php:' . $list['sort']))
                @continue
            @endif

            <li>
                @if (empty($list['question']))
                    <b>{{ $list['sort'] }}. {{ $list['label'] }} </b>

                    {!! $list['closure']() !!}
                @else
                    <a style="font-weight:bold"
                        href="{{ route('question', ['question' => $list['question'], 'permission' => 'php:' . $list['sort']]) }}">
                        {{ $list['sort'] }}. {{ $list['label'] }}
                    </a>

                    @if (!empty($allQuestions))
                        @dump($allQuestions[$list['question']])
                    @endif
                @endif
            </li>
        @endforeach
    </ul>
</details>
