<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Skills for {{ $character->name }}
        </h2>

        <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Skills</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    @foreach ($character->skills as $skill)
                        <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Skill Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $skill->name }}</dd>
                        </div>
                        <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Value</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $skill->value }}</dd>
                        </div>
                        <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Proficiency</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $skill->proficiency ? 'Yes' : 'No' }}</dd>
                        </div>
                        <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Expertise</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $skill->expertise ? 'Yes' : 'No' }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>

        <div class="mt-4 flex space-x-2">
            <a href="{{ route('characters.show', $character) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                Back to Characters
            </a>
            <a href="{{ route('skills.edit', $character) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                Edit Skills
            </a>
        </div>
    </div>
</x-app-layout>