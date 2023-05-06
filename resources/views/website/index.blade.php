<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Works') }}
            </h2>
    </x-slot>

    <!-- @foreach ($websites as $website)
        <img src="/storage/{{ $website->ss }}" alt="ss">
        <a href="{{ route("websites.show", ['website'=>$website]) }}">Bruh</a>
    @endforeach -->
    @auth
    <a
    data-te-toggle="tooltip"
    title="Upload Work"
    class="btn fixed z-50 bottom-10 right-8 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-4xl hover:drop-shadow-2xl bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-400 hover:to-blue-600 text-white font-bold py-2 px-4 shadow-md transition duration-100 ease-in-out transform hover:-translate-y-1 hover:scale-110"
    href="{{ route('websites.create') }}">➕</a>
    @endauth

    {{-- <div class="flex justify-center mt-7 px-3 md:px-2">
        <div class="md:w-full w-auto">
            <table class="table-auto border border-gray-200 divide-y divide-gray-200 mx-auto md:w-3/4 w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-black transition">Student Name</th>
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-black transition">Student Image</th>
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-black transition">Website Image</th>
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider transition hover:text-green-700">View</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($websites as $website)
                        <tr>
                            <td class="px-10 py-4 whitespace-nowrap">{{ $website->user->name }}</td>
                            <td class="px-10 py-4 whitespace-nowrap hover:transform hover:scale-105 transition duration-300"><img class="h-10 w-10 rounded-full hover:transform hover:scale-110 transition duration-500" src="/storage/{{ $website->user->photo}}" alt="{{ $website->user->name }}"></td>
                            <td class="px-10 py-4 whitespace-nowrap hover:transform hover:scale-105 transition duration-300"><img class="h-10 w-10 rounded-full hover:transform hover:scale-110 transition duration-500" src="/storage/{{ $website->ss }}" alt="ss"></td>
                            <td class="px-10 py-4 whitespace-nowrap hover:transform hover:scale-105 transition duration-300 hover:text-green-700"><a href="{{ route("websites.show", ['website'=>$website]) }}">Show</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="md:w-3/4 mx-auto mt-2">
                {{ $websites->links() }}
            </div>
        </div>
    </div> --}}

    <div class="justify-center mt-7 px-3 md:px-2">

        <div class="flex justify-end mb-10 mr-4">
            <form action="{{ route('websites.index') }}" method="GET">
                <div class="flex gap-x-2">
                    <p class="text-blue-700 font-semibold text-xl pr-1">Filter:</p>
                    <button class="px-3 shadow-md rounded-md hover:transform hover:scale-110 transition duration-500 bg-blue-700 text-white font-semibold text-lg" type="submit" name="type" value="all">All</button>
                    <button class="px-3 shadow-md rounded-md hover:transform hover:scale-110 transition duration-500 bg-blue-700 text-white font-semibold text-lg" type="submit" name="type" value="afl2">AFL2</button>
                    <button class="px-3 shadow-md rounded-md hover:transform hover:scale-110 transition duration-500 bg-blue-700 text-white font-semibold text-lg" type="submit" name="type" value="animal">Animal Drawing</button>    
                </div>
            </form>
        </div>

        <ul class="grid gap-y-16 gap-x-8 min-[500px]:grid-cols-2 min-[930px]:grid-cols-3 grid-cols-1">
            @foreach ($websites as $website)
                <li class="flex flex-col rounded-md shadow-md bg-white relative mr-3">
                    <div class="m-6">
                        <a href="{{ route("websites.show", ['website'=>$website]) }}">
                            <img src="/storage/{{ $website->ss}}" class="h-48 w-full hover:transform hover:scale-110 transition duration-500">
                        </a>
                        <img src="/storage/{{ $website->user->photo}}" alt="Profile" class="absolute bottom-20 -right-4 h-28 w-28 rounded-full border-4 hidden sm:block hover:transform hover:scale-105 transition duration-500">
                        <div class="pt-6">
                            <div class="whitespace-pre-wrap font-semibold text-blue-700 text-lg">By: {{ $website->user->name }}</div>
                            <h3 class="font-semibold text-blue-700 text-lg">{{ $website->user->nim }}</h3>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="mt-10 mb-3">
            {{ $websites->links() }}
        </div>
    </div>

    <script>
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-te-toggle="tooltip"]'));
        tooltipTriggerList.map((tooltipTriggerEl) => new te.Tooltip(tooltipTriggerEl));
    </script>

</x-app-layout>
