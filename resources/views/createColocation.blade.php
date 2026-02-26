<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Colocation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg">
        <div class="p-6 text-2xl font-bold text-blue-600">
            🏠 EasyColoc
        </div>

        <nav class="mt-6">
            <a href="#" class="block px-6 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                Dashboard
            </a>
            <a href="#" class="block px-6 py-3 bg-blue-100 text-blue-600 font-semibold">
                Colocations
            </a>
            <a href="#" class="block px-6 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                Admin
            </a>
            <a href="#" class="block px-6 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                Profile
            </a>
        </nav>
    </aside>

    <!-- Content -->
    <main class="flex-1 flex items-center justify-center">
        <div class="bg-white p-10 rounded-2xl shadow-xl w-[450px]">

            <h1 class="text-2xl font-bold text-gray-700 mb-6">
                Nouvelle Colocation
            </h1>

            <form action="{{ route('colocations.store') }}" method="POST" class="space-y-5">
                 @csrf
                <div>
                    <label class="block text-gray-600 mb-2">
                        Nom de la colocation
                    </label>
                    <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           placeholder="Ex: Coloc 1">
                </div>

                <div class="flex gap-4">
                    <button type="submit"
                        class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                        Créer la colocation
                    </button>

                    <button type="button"
                        class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                        Annuler
                    </button>
                </div>

            </form>

        </div>
    </main>

</body>
</html>
