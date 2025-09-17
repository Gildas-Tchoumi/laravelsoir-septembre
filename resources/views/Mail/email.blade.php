<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>{{ $messag }}</p>
    <p>Bienvenue, {{ $utilisateur->firstname }} {{ $utilisateur->lastname }}!</p>
    <p>Merci pour votre inscription.</p>
    <a href="{{ route('verifiyaccount',$utilisateur->id) }}"> Cliquez ici pour valider votre compte</a>
</body>
</html>