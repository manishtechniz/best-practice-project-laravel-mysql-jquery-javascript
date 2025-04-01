<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Lists</title>
</head>
<body>
    <h1>Question Lists</h1>
    <p>Click on the question to view the answer.</p>
    <ul>
        <li><a href="{{ route('question', ['question' => 'reverseString']) }}" > 1. Reverse String </a></li>
        <li><a href="{{ route('question', ['question' => 'findMissingNumber']) }}" > 3. Find missing number from nth array </a></li>
    </ul>
</body>
</html>