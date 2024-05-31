<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;



class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();

        return view('characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'level' => 'required|integer|min:1',
            'class' => 'required|string|max:255',
            'subclass_one' => 'nullable|string|max:255',
            'subclass_two' => 'nullable|string|max:255',
            'alignment' => 'nullable|string|max:255',
            'lore' => 'nullable|string',
            'notepad' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user_id = auth()->id();

        // Gérer le téléversement de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = str_replace('public', 'storage', $imagePath);
        }

        // Création du personnage
        $character = new Character();
        $character->user_id = $user_id;
        $character->name = $request->name;
        $character->race = $request->race;
        $character->level = $request->level;
        $character->class = $request->class;
        $character->subclass_one = $request->subclass_one;
        $character->subclass_two = $request->subclass_two;
        $character->alignment = $request->alignment;
        $character->lore = $request->lore;
        $character->notepad = $request->notepad;
        $character->image_path = $imagePath;
        $character->save();

        // Redirection vers la vue détaillée du personnage
        return redirect()->route('characters.show', $character);
    }

    /**
     * Display the specified resource.
     */
    public function show(character $character)
    {
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(character $character)
    {
        return view('characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'level' => 'required|integer|min:1',
            'class' => 'required|string|max:255',
            'subclass_one' => 'nullable|string|max:255',
            'subclass_two' => 'nullable|string|max:255',
            'alignment' => 'nullable|string|max:255',
            'lore' => 'nullable|string',
            'notepad' => 'nullable|string',
        ]);

        // Mise à jour du personnage
        $character->update($validated);

        // Redirection avec message de succès
        return redirect()->route('characters.show', $character)->with('success', 'Character updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(character $character)
    {
        $character->delete();
        return redirect()->route('characters.index');
    }



    public function IndexSkill(Character $character)
    {
        return view('skills.index', compact('character'));
    }

    public function EditSkill(character $character)
    {
        return view('skills.edit', compact('character'));
    }


    public function UpdateSkill(Request $request, Character $character)
    {
        // Définir les règles de validation
        $rules = [
            'skills' => 'required|array',
            
        ];

        // Valider les données
        $validated = $request->validate($rules);

        // Mettre à jour chaque compétence
        foreach ($validated['skills'] as $skillId => $skillData) {
            $skill = $character->skills()->find($skillId);
            if ($skill) {
                

                $skill->update([
                    'name' => $skillData['name'],
                    'value' => $skillData['value'],
                    'proficiency' => isset($skillData['proficiency']) ?1:0,
                    'expertise' => isset($skillData['expertise']) ?1:0,
                ]);
            }
        }
        

        return redirect()->route('characters.show', $character)->with('success', 'Skills updated successfully.');
    }

}
