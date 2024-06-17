import './bootstrap';

window.CalculProfy = function() {
    let ProficiencyValue;
    let RecoveryLevel = document.getElementById('level').value;

    if (RecoveryLevel <= 4) {
        ProficiencyValue = 2;
    } else if (RecoveryLevel >= 5 && RecoveryLevel <= 8) {
        ProficiencyValue = 3;
    } else if (RecoveryLevel >= 9 && RecoveryLevel <= 12) {
        ProficiencyValue = 4;
    } else if (RecoveryLevel >= 13 && RecoveryLevel <= 16) {
        ProficiencyValue = 5;
    } else if (RecoveryLevel >= 17) {
        ProficiencyValue = 6;
    }

    document.getElementById('proficiency').value = ProficiencyValue;
};



window.CalculMody = function(baseElement, bonusElement, modifierElement, profiboxElement, savingThrowElement, recoveryProfy) {
    let BaseValue = parseInt(baseElement.value, 10);
    let BonusValue = parseInt(bonusElement.value, 10);

    let ModifierValue = Math.floor(((BaseValue + BonusValue) - 10) / 2);

    modifierElement.value = ModifierValue;

    CalculSavy(modifierElement, profiboxElement, savingThrowElement, recoveryProfy);
};

window.CalculSavy = function(modifierElement, profiboxElement, savingThrowElement, recoveryProfy) {
    let ModifierValue = parseInt(modifierElement.value, 10);
    let ProfiBox = profiboxElement.checked;

    let SavingValue;
    if (ProfiBox === true) {
        SavingValue = ModifierValue + recoveryProfy;
    } else {
        SavingValue = ModifierValue;
    }

    savingThrowElement.value = SavingValue;
};

// Pour chaque ensemble de champs d'entrée
document.querySelectorAll('.stat-group').forEach(function(group) {
    let baseElement = group.querySelector('.base');
    let bonusElement = group.querySelector('.bonus');
    let modifierElement = group.querySelector('.modifier');
    let profiboxElement = group.querySelector('.profibox');
    let savingThrowElement = group.querySelector('.saving_throw');
    let recoveryProfy = parseInt(document.getElementById('recovery-profy').value, 10);

    baseElement.addEventListener('input', function() {
        CalculMody(baseElement, bonusElement, modifierElement, profiboxElement, savingThrowElement, recoveryProfy);
    });
    bonusElement.addEventListener('input', function() {
        CalculMody(baseElement, bonusElement, modifierElement, profiboxElement, savingThrowElement, recoveryProfy);
    });
    profiboxElement.addEventListener('change', function() {
        CalculSavy(modifierElement, profiboxElement, savingThrowElement, recoveryProfy);
    });
});


window.previewImage = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

