<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex">


<aside class="w-64 bg-white shadow-lg">
    <div class="p-6 text-2xl font-bold text-blue-600">
        🏠 EasyColoc
    </div>

    <nav class="mt-6 space-y-2">
        <a href="#" class="block px-6 py-3 bg-blue-100 text-blue-600 font-semibold rounded-r-full">
            Dashboard
        </a>
        <a href="{{ route('colocations.index') }}" class="block px-6 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
            Colocations
        </a>
        <a href="#" class="block px-6 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
            Admin
        </a>
        <a href="#" class="block px-6 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
            Profile
        </a>
                <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    </nav>
</aside>

<main class="flex-1 p-10">


    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-700">
            Tableau de bord
        </h1>

        <a href="{{ route('colocations.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-xl shadow-md hover:bg-blue-700 transition">
            + Nouvelle colocation
        </a>
    </div>


    <div class="grid grid-cols-2 gap-6 mb-8">

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <div class="flex items-center gap-4">
                <div class="bg-green-100 p-4 rounded-full text-xl">
                    ⭐
                </div>
                <div>
                    <p class="text-gray-500">Mon score réputation</p>
                    <h2 class="text-2xl font-bold text-gray-700">0</h2>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <div class="flex items-center gap-4">
                <div class="bg-blue-100 p-4 rounded-full text-xl">
                    🛒
                </div>
                <div>
                    <p class="text-gray-500">Dépenses globales (Fév)</p>
                    <h2 class="text-2xl font-bold text-gray-700">0,00 €</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-3 gap-6">


        <div class="col-span-2 bg-white p-6 rounded-2xl shadow">
            <div class="flex justify-between mb-4">
                <h2 class="font-semibold text-gray-700">Dépenses récentes</h2>
                <a href="#" class="text-blue-600 text-sm hover:underline">Voir tout</a>
            </div>

            <div class="text-center text-gray-400 py-10">
                Aucune dépense récente
            </div>
        </div>

        <div class="bg-gradient-to-br from-indigo-500 to-blue-600 text-white p-6 rounded-2xl shadow">
            <h2 class="font-semibold mb-4">Membres de la coloc</h2>

            <div class="bg-white/20 p-4 rounded-lg text-center">
                Aucun membre pour le moment
            </div>
        </div>

    </div>

</main>

</body>
</html>
