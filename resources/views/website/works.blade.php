<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Past Works') }}
        </h2>
    </x-slot>

    @foreach ($websites as $website)
    <img src="/storage/{{ $website->ss }}" alt="ss">
    <a href="{{ route("websites.show", ['website'=>$website]) }}">Show</a>
    <a href="{{ route("websites.edit", ['website'=>$website]) }}">Edit</a>
    <form action="{{route("websites.destroy", ['website'=>$website]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="">
            Delete
        </button>
    </form>
    @endforeach

</x-app-layout>