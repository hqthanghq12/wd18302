<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="{{ route('test') }}" method="post">
    @csrf
    <input type="text" name="name" id="name">
    <input type="text" name="email" id="email">
    <input type="submit" value="submit">

</form>
</body>
</html>