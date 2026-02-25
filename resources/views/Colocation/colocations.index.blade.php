@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <h1 class="text-2xl font-bold mb-4">Mes Colocations</h1>

    @if($colocations->isEmpty())
        <p>Vous n'avez aucune colocation active.</p>
    @else
        <ul class="space-y-3">
            @foreach($colocations as $colocation)
                <li class="p-4 bg-white shadow rounded">
                    <a href="{{ route('colocations.show', $colocation) }}"
                       class="text-blue-600 font-semibold">
                        {{ $colocation->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

</div>
@endsection
