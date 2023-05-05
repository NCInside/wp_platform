<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Works') }}
        </h2>
    </x-slot>

    @foreach ($websites as $website)
        <img src="/storage/{{ $website->ss }}" alt="ss">
        <a href="{{ route("websites.show", ['website'=>$website]) }}">Bruh</a>
    @endforeach
    <a class="btn fixed z-90 bottom-10 right-8 bg-blue-600 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-700 hover:drop-shadow-2xl" href="{{ route('websites.create') }}">➕</a>

</x-app-layout>
