<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Past Works') }}
        </h2>
    </x-slot>

    <!-- @foreach ($websites as $website)
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
    @endforeach -->

    @auth
    <a
    data-te-toggle="tooltip"
    title="Upload Work"
    class="btn fixed z-50 bottom-10 right-8 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-4xl hover:drop-shadow-2xl bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-400 hover:to-blue-600 text-white font-bold py-2 px-4 shadow-md transition duration-100 ease-in-out transform hover:-translate-y-1 hover:scale-110"
    href="{{ route('websites.create') }}">➕</a>
    @endauth

    <div class="flex justify-center mt-7 px-3 md:px-2">
        <div class="md:w-full w-auto">
            <table class="table-auto border border-gray-200 divide-y divide-gray-200 mx-auto md:w-3/4 w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-center text-s font-medium text-gray-500 uppercase tracking-wider hover:text-black transition">Image</th>
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-green-700 transition">View</th>
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-green-700 transition">Edit</th>
                        <th class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider hover:text-red-800 transition">Delete</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($websites as $website)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap hover:transform hover:scale-105 transition duration-500"><img class="ml-32 w-80 hover:transform hover:scale-105 transition duration-500" src="/storage/{{ $website->ss }}" alt="ss"></td>
                            <td class="px-6 py-4 whitespace-nowrap hover:transform hover:scale-105 transition duration-500 hover:text-green-700">
                                <a href="{{ route("websites.show", ['website'=>$website]) }}">Show</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap hover:transform hover:scale-105 transition duration-500 hover:text-green-700">
                                <a href="{{ route("websites.edit", ['website'=>$website]) }}">Edit</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap hover:transform hover:scale-105 transition duration-500 hover:text-red-700">
                                <form action="{{route("websites.destroy", ['website'=>$website]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="md:w-3/4 mx-auto mt-2">
                {{-- {{ $websites->links() }} --}}
            </div>
        </div>
    </div>

</x-app-layout>