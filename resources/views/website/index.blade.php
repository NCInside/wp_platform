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
    <a class="btn fixed z-90 bottom-10 right-8 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:drop-shadow-2xl bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-400 hover:to-blue-600 text-white font-bold py-2 px-4 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" href="{{ route('websites.create') }}">➕</a>

    <div class="flex justify-center mt-7 px-3 md:px-2">
        <div class="md:w-full w-auto">
            <table class="table-auto border border-gray-200 divide-y divide-gray-200 mx-auto md:w-3/4 w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-black transition">Student Name</th>
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-black transition">Student Image</th>
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-black transition">Website Image</th>
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-black transition hover:text-green-700">View</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($websites as $website)
                        <tr>
                            <td class="px-10 py-4 whitespace-nowrap">{{ $website->user->name }}</td>
                            <td class="px-10 py-4 whitespace-nowrap hover:transform hover:scale-105 transition duration-300"><img class="h-10 w-10 rounded-full hover:transform hover:scale-110 transition duration-500" src="{{ $website->user->photo}}" alt="{{ $website->user->name }}"></td>
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
    </div>
</x-app-layout>
