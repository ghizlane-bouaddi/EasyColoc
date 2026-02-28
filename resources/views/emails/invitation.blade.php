<!DOCTYPE html>
<html>
<head>
    <title>Invitation à rejoindre la colocation</title>
</head>
<body>
    <p>Salut !</p>
    <p>Vous avez été invité(e) à rejoindre la colocation <strong>{{ $invitation->colocation->name }}</strong>.</p>
    <p>Cliquez sur le lien pour accepter l'invitation :</p>
    <a href="{{ route('invitations.accept', $invitation->token) }}">
        Accepter l'invitation
    </a>
</body>
</html>
