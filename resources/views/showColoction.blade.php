<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Colocation Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 min-h-screen flex">


    <aside class="w-64 bg-white shadow-lg">
        <div class="p-6 text-2xl font-bold text-blue-600">
            🏠 EasyColoc
        </div>
        <nav class="mt-6">
            <a href="{{ route('colocations.index') }}" class="block px-6 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                Colocations
            </a>
            <a href="#" class="block px-6 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                Dashboard
            </a>
            <a href="#" class="block px-6 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                Profile
            </a>
        </nav>
    </aside>


    <main class="flex-1 p-10">
        <h1 class="text-3xl font-bold text-gray-700 mb-4">{{ $colocation->name }}</h1>
        <p class="mb-2">Status: <span class="font-semibold">{{($colocation->status) }}</span></p>
        <p class="mb-6">Owner: <span class="font-semibold">{{ $colocation->owner->name }}</span></p>


        <section class="mb-8">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-xl font-semibold">Members</h2>
                {{-- @if(auth()->id() === $colocation->owner_id) --}}
                @if(auth()->user()->id === $colocation->owner_id || auth()->user()->role_id == 2)
            <form action="{{ route('colocations.send-invite', $colocation->id) }}" method="POST" class="flex gap-2">
                @csrf
                <input type="email" name="email" placeholder="Email du membre" required
                       class="border rounded px-2 py-1">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">
                    Envoyer Invitation
                </button>
            </form>
        @endif
                {{-- @endif --}}
            </div>
            <ul class="list-disc pl-6">
                @foreach($colocation->members as $member)
                    <li>{{ $member->name }} ({{ $member->pivot->role }})</li>
                @endforeach
            </ul>
        </section>


        <section class="mb-8">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-xl font-semibold">Categories</h2>
                <a href=""
                   class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Create Category
                </a>
            </div>
            <ul class="list-disc pl-6">
                @foreach($colocation->categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </section>

       
        <section>
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-xl font-semibold">Expenses</h2>
                <a href=""
                   class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                    Create Expense
                </a>
            </div>
            <ul class="list-disc pl-6">
                @foreach($colocation->expenses as $expense)
                    <li>
                        {{-- {{ $expense->name }} - {{ $expense->amount }} € - Paid by: {{ $expense->payer->name }} --}}
                    </li>
                @endforeach
            </ul>
        </section>
    </main>

</body>
</html>


