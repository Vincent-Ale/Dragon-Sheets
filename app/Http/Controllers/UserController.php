<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les paramètres de l'utilisateur
        $settings = [
            'color_theme' => $user->settings_color_theme,
            'virtual_dices' => $user->settings_virtual_dices,
            'musical_theme' => $user->settings_musical_theme,
        ];

        // Passer les paramètres à la vue
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Valider les données du formulaire
        $request->validate([
            'color_theme' => 'required|in:blue,green,red,yellow,purple',
            'virtual_dices' => 'nullable',
            'musical_theme' => 'nullable',
        ]);

        // Convertir les valeurs "on" en booléens
        $virtualDices = $request->has('virtual_dices') ? true : false;
        $musicalTheme = $request->has('musical_theme') ? true : false;

        // Mettre à jour les paramètres de l'utilisateur
        $user->update([
            'settings_color_theme' => $request->color_theme,
            'settings_virtual_dices' => $virtualDices,
            'settings_musical_theme' => $musicalTheme,
        ]);

        // Rediriger l'utilisateur vers la vue des paramètres avec un message de succès
        return redirect()->route('settings.index');
    }

}
