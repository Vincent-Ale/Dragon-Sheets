<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;



class CharacterController extends Controller
{
    
//#############################################################################################################
//####################################   CHARACTERS   #########################################################
//#############################################################################################################    
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
            'proficiency' => 'required|integer',
            'class' => 'required|string|max:255',
            'subclass_one' => 'nullable|string|max:255',
            'subclass_two' => 'nullable|string|max:255',
            'alignment' => 'nullable|string|max:255',
            'lore' => 'nullable|string',
            'notepad' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_created' => 'boolean',
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
        $character->proficiency = $request->proficiency;
        $character->class = $request->class;
        $character->subclass_one = $request->subclass_one;
        $character->subclass_two = $request->subclass_two;
        $character->alignment = $request->alignment;
        $character->lore = $request->lore;
        $character->notepad = $request->notepad;
        $character->image_path = $imagePath;
        $character->is_created = $request->is_created;
        $character->save($validated);


        // Création des valeurs par défaut pour les statistiques
        $defaultStats = [
            ['name' => 'Constitution', 'modifier' => 0, 'saving_throw' => 0, 'base' => 0, 'bonus' => 0],
            ['name' => 'Force', 'modifier' => 0, 'saving_throw' => 0, 'base' => 0, 'bonus' => 0],
            ['name' => 'Dextérité', 'modifier' => 0, 'saving_throw' => 0, 'base' => 0, 'bonus' => 0],
            ['name' => 'Intelligence', 'modifier' => 0, 'saving_throw' => 0, 'base' => 0, 'bonus' => 0],
            ['name' => 'Charisme', 'modifier' => 0, 'saving_throw' => 0, 'base' => 0, 'bonus' => 0],
            ['name' => 'Sagesse', 'modifier' => 0, 'saving_throw' => 0, 'base' => 0, 'bonus' => 0]
        ];

        foreach ($defaultStats as $statData) {
            $character->stats()->create($statData);
        }

        // Création des valeurs par défaut pour les compétences
        $defaultSkills = [
                ['name' => 'Acrobaties','value' => 0],
                ['name' => 'Arcanes','value' => 0],
                ['name' => 'Athlétisme','value' => 0],
                ['name' => 'Discrétion','value' => 0],
                ['name' => 'Dressage','value' => 0],
                ['name' => 'Escamotage','value' => 0],
                ['name' => 'Histoire','value' => 0],
                ['name' => 'Intimidation','value' => 0],
                ['name' => 'Investigation','value' => 0],
                ['name' => 'Médecine','value' => 0],
                ['name' => 'Nature','value' => 0],
                ['name' => 'Perception','value' => 0],
                ['name' => 'Perspicacité','value' => 0],
                ['name' => 'Persuasion','value' => 0],
                ['name' => 'Religion','value' => 0],
                ['name' => 'Représentation','value' => 0],
                ['name' => 'Survie','value' => 0],
                ['name' => 'Tromperie','value' => 0]
        ];

        foreach ($defaultSkills as $skillData) {
            $character->skills()->create($skillData);
        }

        $defaultCombats = [
            ['health_point' => 0],
            ['armor_class' => 0],
            ['passive_perception' => 0],
            ['speed' => 0],
            ['initiative' => 0],
            ['spell_save_dc' => 0],
            ['spell_bonus' => 0],
            ['dices_of_life' => 6],
            ['spellcasting_ability' => 'Intelligence'],
        ];

        $character->combats()->create($defaultCombats);



        // Redirection vers la vue détaillée du personnage
        return redirect()->route('stats.edit', $character);
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
            'proficiency' => 'required|integer',
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
        if (!$character->is_created) {
            return redirect()->route('stats.edit', $character);
        } else {
            return redirect()->route('characters.show', $character);
        }
    }


    public function updateLore(Request $request, Character $character)
    {
        // Validation des données
        $request->validate([
            'lore' => 'required|string|max:65000',
        ]);

        // Mise à jour du lore
        $character->update([
            'lore' => $request->input('lore'),
        ]);

        // Redirection avec un message de succès
        return redirect()->route('characters.show', $character)->with('success', 'Lore mis à jour avec succès');
    }

    // Méthode pour mettre à jour le notepad
    public function updateNotepad(Request $request, Character $character)
    {
        // Validation des données
        $request->validate([
            'notepad' => 'required|string|max:65000',
        ]);

        // Mise à jour du notepad
        $character->update([
            'notepad' => $request->input('notepad'),
        ]);

        // Redirection avec un message de succès
        return redirect()->route('characters.show', $character)->with('success', 'Notepad mis à jour avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(character $character)
    {
        foreach ($character->stats as $stat) {
            $stat->delete();
        }
        foreach ($character->skills as $skill) {
            $skill->delete();
        }
        foreach ($character->combats as $combat) {
            $combat->delete();
        }
        $character->delete();
        return redirect()->route('characters.index');
    }
//#############################################################################################################
//####################################   CHARACTERS END  ######################################################
//############################################################################################################# 





//#############################################################################################################
//####################################   STATS   ##############################################################
//#############################################################################################################
    public function IndexStat(Character $character)
    {
        return view('stats.index', compact('character'));
    }

    
    public function EditStat(character $character)
    {
        return view('stats.edit', compact('character'));
    }

    
    public function UpdateStat(Request $request, Character $character)
    {
        // Définir les règles de validation
        $rules = [
            'stats' => 'required|array',
        ];

        // Valider les données
        $validated = $request->validate($rules);

        // Mettre à jour chaque compétence
        foreach ($validated['stats'] as $statId => $statData) {
            $stat = $character->stats()->find($statId);
            if ($stat) {
                

                $stat->update([
                    'name' => $statData['name'],
                    'modifier' => $statData['modifier'],
                    'saving_throw' => $statData['saving_throw'],
                    'base' => $statData['base'],
                    'bonus' => $statData['bonus'],
                    'proficiency' => isset($statData['proficiency']) ?1:0,
                ]);
            }
        }
        

        if ($character->is_created == false) {
            return redirect()->route('combats.edit', $character);
        } else {
            return redirect()->route('stats.index', $character);
        }
        
    }
//#############################################################################################################
//####################################   STATS END   ##########################################################
//#############################################################################################################





//#############################################################################################################
//########################################   SKILLS   #########################################################
//############################################################################################################# 
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
                    'proficiency' => $skillData['proficiency'] ? 1 : 0,
                    'expertise' => $skillData['expertise'] ? 1 : 0,
                ]);
            }
        }
        

        if (!$character->is_created) {
            $character->is_created = true;
            $character->save();
            return redirect()->route('characters.show', $character);
        } else {
            return redirect()->route('skills.index', $character);
        }
    }
//#############################################################################################################
//########################################   SKILLS END  ######################################################
//############################################################################################################# 





//#############################################################################################################
//########################################   COMBAT   #########################################################
//############################################################################################################# 

    public function IndexCombat(Character $character)
    {
        return view('combats.index', compact('character'));
    }

    

    public function EditCombat(character $character)
    {
        return view('combats.edit', compact('character'));
    }

   
    public function UpdateCombat(Request $request, Character $character)
    {
        // Définir les règles de validation
        $rules = [
            'combats' => 'required|array',
            
        ];

        // Valider les données
        $validated = $request->validate($rules);

        // Mettre à jour chaque compétence
        foreach ($validated['combats'] as $combatId => $combatData) {
            $combat = $character->combats()->find($combatId);
            if ($combat) {
                

                $combat->update([
                    'health_point' => $combatData['health_point'],
                    'armor_class' => $combatData['armor_class'],
                    'passive_perception' => $combatData['passive_perception'],
                    'speed' => $combatData['speed'],
                    'initiative' => $combatData['initiative'],
                    'spell_save_dc' => $combatData['spell_save_dc'],
                    'spell_bonus' => $combatData['spell_bonus'],
                    'dices_of_life' => $combatData['dices_of_life'],
                    'spellcasting_ability' => $combatData['spellcasting_ability'],
                    'proficiency' => isset($combatData['proficiency']) ?1:0,
                ]);
            }
        }
        

        if ($character->is_created == false) {
            return redirect()->route('skills.edit', $character);
        } else {
            return redirect()->route('combats.index', $character);
        }
    }
}
//#############################################################################################################
//#######################################   COMBAT END  #######################################################
//############################################################################################################# 