<x-menu />
<x-app-layout>
    <div class="audio-player text-center mt-24">
        <audio id="audio" class="hidden">
            <source id="audioSource" src="" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <div>
            <div>
                <button id="prevButton" class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 text-white font-bold py-2 px-4 rounded m-2">
                    <i class="fas fa-backward"></i>
                </button>
                <button id="playPauseButton" class="bg-green-500 hover:bg-green-600 active:bg-green-700 text-white font-bold py-2 px-4 rounded m-2">
                    <i class="fas fa-play"></i>
                </button>
                <button id="stopButton" class="bg-red-500 hover:bg-red-600 active:bg-red-700 text-white font-bold py-2 px-4 rounded m-2">
                    <i class="fas fa-stop"></i>
                </button>
                <button id="nextButton" class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 text-white font-bold py-2 px-4 rounded m-2">
                    <i class="fas fa-forward"></i>
                </button>
            </div>
            <div>
                <button id="playSelectedButton" class="bg-purple-500 hover:bg-purple-600 active:bg-purple-700 text-white font-bold py-2 px-4 rounded m-2 inline-block" disabled>
                    Play Selected
                </button>
                <button id="selectAllButton" class="bg-gray-500 hover:bg-gray-600 active:bg-gray-700 text-white font-bold py-2 px-4 rounded m-2 inline-block">
                    Select All
                </button>
            </div>
        </div>
        <div class="progress-bar-container">
            <input type="range" id="progressBar" value="0" step="0.1" class="w-full mt-4">
        </div>
        <div id="trackInfo" class="mt-2 text-white">
            <span id="currentTrackTitle">No track playing</span>
            <span id="currentTime">00:00</span> / <span id="totalTime">00:00</span>
        </div>
        <div class="playlist flex justify-center">
            <table class="table-auto text-white mt-6">
                <thead>
                    <tr class="bg-green-500 border">
                        <th class="px-2 py-2">Name</th>
                        <th class="px-2 py-2">Tag</th>
                        <th class="px-2 py-2">Sélectionnés</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tracks as $track)
                        <tr class="playlist-item odd:bg-gray-700 even:bg-gray-600 hover:bg-gray-500" data-src="{{ asset($track->music_path) }}" data-title="{{ $track->name }}">
                            <td class="border px-2 py-2">{{ $track->name }}</td>
                            <td class="border px-2 py-2">{{ $track->tag }}</td>
                            <td class="border px-2 py-2 text-center">
                                <input type="checkbox" class="transform scale-125">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="m-6 text-center">
        <a href="{{ route('musics.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
            Add Music
        </a>
    </div>
</x-app-layout>
