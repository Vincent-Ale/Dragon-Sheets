<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Stats for {{ $character->name }}
        </h2>

        <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('stats.update', $character) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Stats</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        @foreach ($character->stats as $stat)
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Stat Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="stats[{{ $stat->id }}][name]" value="{{ $stat->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Modifier</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="stats[{{ $stat->id }}][modifier]" value="{{ $stat->modifier }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Saving Throw</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="stats[{{ $stat->id }}][saving_throw]" value="{{ $stat->saving_throw }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Base</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="stats[{{ $stat->id }}][base]" value="{{ $stat->base }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Bonus</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="stats[{{ $stat->id }}][bonus]" value="{{ $stat->bonus }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Proficiency</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="checkbox" name="stats[{{ $stat->id }}][proficiency]" {{ $stat->proficiency ? 'checked' : '' }} class="mt-1 block">
                                </dd>
                            </div>
                            
                        @endforeach
                    </dl>
                </div>

                <div class="mt-4 flex space-x-2">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                        Save Stats
                    </button>
                    <a href="{{ route('characters.show', $character) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                        Back to Character
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
