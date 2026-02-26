

<h1>Inviter un membre à </h1>

<form action="" method="POST">
    @csrf
    <label for="user_id">Choisir un utilisateur:</label>
    <select name="user_id" id="user_id" required>
        
    </select>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-2 hover:bg-blue-700">
        Envoyer l'invitation
    </button>
</form>
