<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
</head>
<body>
    <h3>Автор: {{ $details['name'] }}</h3>
    <p>Почта:{{ $details['email'] }}</p>
    <p>Сообщение: {{ $details['message'] }}</p>
</body>
</html>