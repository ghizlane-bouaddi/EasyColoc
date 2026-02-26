
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes colocations</title>
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
            <a href="#" class="block px-6 py-3 bg-blue-100 text-blue-600 font-semibold rounded-r-full">
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

    <!-- Main Content -->
    {{-- <main class="flex-1 p-10">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-700">
                Mes colocations
            </h1>

            <a href="{{ route('colocations.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-xl shadow-md hover:bg-blue-700 transition duration-300">
                + Nouvelle colocation
            </a>
        </div>

        <!-- Empty State Card -->
        <div class="bg-white rounded-2xl shadow-lg p-16 flex flex-col items-center justify-center text-center">

            <!-- Icon -->
            <div class="bg-blue-100 p-6 rounded-full mb-6">
                👥
            </div>

            <h2 class="text-xl font-semibold text-gray-700 mb-2">
                Aucune colocation
            </h2>

            <p class="text-gray-500 mb-6">
                Commencez par créer une nouvelle colocation.
            </p>

            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 shadow">
                Créer maintenant
            </button>

        </div>

    </main> --}}


    <!-- Main Content -->
<main class="flex-1 p-10">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-700">
            Mes colocations
        </h1>

        <a href="{{ route('colocations.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-xl shadow-md hover:bg-blue-700 transition duration-300">
            + Nouvelle colocation
        </a>
    </div>

    @if($colocation->count() > 0)
        <!-- List of Colocations -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($colocation as $colocatio)
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">{{ $colocatio->name }}</h2>
                    <p class="text-gray-500 mb-4">Status: {{ $colocatio->status }}</p>
                     <p>Owner: {{ $colocatio->owner->name }}</p>
                    <a href="{{ route('colocations.show', $colocatio->id) }}" class="text-blue-600 hover:underline">Voir détails</a>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State Card -->
        <div class="bg-white rounded-2xl shadow-lg p-16 flex flex-col items-center justify-center text-center">
            <div class="bg-blue-100 p-6 rounded-full mb-6">
                👥
            </div>

            <h2 class="text-xl font-semibold text-gray-700 mb-2">
                Aucune colocation
            </h2>

            <p class="text-gray-500 mb-6">
                Commencez par créer une nouvelle colocation.
            </p>

            <a href="{{ route('colocations.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 shadow">
                Créer maintenant
            </a>
        </div>
    @endif

</main>

</body>
</html>
