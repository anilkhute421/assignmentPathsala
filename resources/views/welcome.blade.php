<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/submit-form">
        @csrf
        <input type="text" name="name" placeholder="Enter your name"/>
        <input type="text" name="mobile" placeholder="Enter your mobile"/>
        <input type="email" name="email" placeholder="Enter your email"/>
        <button type="submit">submit</button>
    </form>
</body>
</html>