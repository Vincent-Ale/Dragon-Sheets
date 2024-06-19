<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Music;


class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les morceaux de musique depuis la base de données
        $tracks = Music::all();

        return view('musics.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('musics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tag' => 'required',
            'music_file' => 'required|mimes:mp3,mpeg'
        ]);

        // Récupérer le fichier et le stocker dans storage/themes
        $musicFile = $request->file('music_file')->store('public/themes');

        // Générer le chemin relatif à partir du répertoire storage
        $path = str_replace('public/', 'storage/', $musicFile);

        // Créer une nouvelle entrée dans la base de données
        Music::create([
            'name' => $request->name,
            'tag' => $request->tag,
            'music_path' => $path,
            'user_id' => auth()->id() // Assurez-vous que votre modèle Music a une relation correctement configurée pour l'utilisateur
        ]);

        return redirect()->route('musics.index')->with('success', 'Music added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($filename)
    {
        $file_path = public_path('theme') . '/' . $filename;

        if (file_exists($file_path)) {
            unlink($file_path);
            return redirect()->route('musics.index')->with('success', 'Music deleted successfully!');
        }

        return redirect()->route('musics.index')->with('error', 'Music not found!');
    }
}
