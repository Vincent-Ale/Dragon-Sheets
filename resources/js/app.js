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

window.rollDice = function () {
    this.result = Math.floor(Math.random() * this.dice) + 1;
}


window.getRandomNumber = function (max) {
    return Math.floor(Math.random() * max) + 1;
}

window.clearResults = function (results) {
    results.splice(0, results.length);
}

window.rollMultipleDice = function (numberOfDice, dice, results) {
    clearResults(results);
    for (let i = 0; i < numberOfDice; i++) {
        results.push(getRandomNumber(dice));
    }
}

document.addEventListener('alpine:init', () => {
    Alpine.data('virtualDice', () => ({
        showDice: false,
        dice: 6,
        numberOfDice: 1,
        results: [],
        rollDice() {
            rollMultipleDice(this.numberOfDice, this.dice, this.results);
        }
    }));
});

window.setupAudioPlayer = function () {
    const audio = document.getElementById('audio');
    const playPauseButton = document.getElementById('playPauseButton');
    const stopButton = document.getElementById('stopButton');
    const playSelectedButton = document.getElementById('playSelectedButton');
    const selectAllButton = document.getElementById('selectAllButton');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const progressBar = document.getElementById('progressBar');
    const currentTrackTitle = document.getElementById('currentTrackTitle');
    const currentTimeElement = document.getElementById('currentTime');
    const totalTimeElement = document.getElementById('totalTime');
    const playlistItems = document.querySelectorAll('.playlist-item');
    let selectedTracks = [];
    let currentTrackIndex = 0;

    // Fonction pour formater le temps en mm:ss
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secondsRemaining = Math.floor(seconds % 60);
        return `${minutes}:${secondsRemaining < 10 ? '0' : ''}${secondsRemaining}`;
    }

    // Fonction pour démarrer la lecture d'un morceau
    function playTrack(src, title) {
        document.getElementById('audioSource').src = src;
        audio.load();
        audio.play();
        playPauseButton.innerHTML = '<i class="fas fa-pause"></i>';
        currentTrackTitle.textContent = title; // Mettre à jour le titre de la piste en cours
    }

    // Fonction pour jouer la prochaine piste dans la liste
    function playNextTrack() {
        if (currentTrackIndex < selectedTracks.length - 1) {
            currentTrackIndex++;
            const nextTrack = selectedTracks[currentTrackIndex];
            playTrack(nextTrack.src, nextTrack.title);
        } else {
            audio.pause();
            playPauseButton.innerHTML = '<i class="fas fa-play"></i>';
        }
    }

    // Fonction pour jouer la piste précédente dans la liste
    function playPrevTrack() {
        if (currentTrackIndex > 0) {
            currentTrackIndex--;
            const prevTrack = selectedTracks[currentTrackIndex];
            playTrack(prevTrack.src, prevTrack.title);
        }
    }

    // Fonction pour mettre à jour l'état du bouton "Play Selected"
    function updatePlaySelectedButton() {
        selectedTracks = Array.from(document.querySelectorAll('.playlist-item input[type="checkbox"]:checked'))
            .map(checkbox => {
                const item = checkbox.closest('.playlist-item');
                return {
                    src: item.getAttribute('data-src'),
                    title: item.getAttribute('data-title')
                };
            });

        playSelectedButton.disabled = selectedTracks.length === 0;
        playPauseButton.disabled = selectedTracks.length === 0;
    }

    // Mettre à jour la barre de progression en fonction de la lecture de l'audio
    audio.addEventListener('timeupdate', () => {
        if (!isNaN(audio.duration)) {
            const value = (audio.currentTime / audio.duration) * 100;
            progressBar.value = value;
            currentTimeElement.textContent = formatTime(audio.currentTime);
            totalTimeElement.textContent = formatTime(audio.duration);
        }
    });

    // Permettre de chercher dans l'audio avec la barre de progression
    progressBar.addEventListener('input', () => {
        if (!isNaN(audio.duration)) {
            const value = progressBar.value;
            audio.currentTime = (value / 100) * audio.duration;
        }
    });

    // Événement click sur le bouton Play/Pause
    playPauseButton.addEventListener('click', () => {
        if (selectedTracks.length > 0) {
            if (audio.paused) {
                if (audio.currentTime === 0) {
                    // Si audio est au début, lire la première piste sélectionnée
                    currentTrackIndex = 0;
                    playTrack(selectedTracks[currentTrackIndex].src, selectedTracks[currentTrackIndex].title);
                } else {
                    audio.play();
                }
                playPauseButton.innerHTML = '<i class="fas fa-pause"></i>';
            } else {
                audio.pause();
                playPauseButton.innerHTML = '<i class="fas fa-play"></i>';
            }
        }
    });

    // Événement click sur le bouton Stop
    stopButton.addEventListener('click', () => {
        audio.pause();
        audio.currentTime = 0;
        playPauseButton.innerHTML = '<i class="fas fa-play"></i>';
        progressBar.value = 0;
        currentTrackTitle.textContent = 'No track playing';
        currentTimeElement.textContent = '00:00';
        totalTimeElement.textContent = '00:00';
    });

    // Événement click sur le bouton Play Selected
    playSelectedButton.addEventListener('click', () => {
        if (selectedTracks.length > 0) {
            currentTrackIndex = 0;
            playTrack(selectedTracks[currentTrackIndex].src, selectedTracks[currentTrackIndex].title);
        }
    });

    // Événement click sur le bouton Select All / Unselect All
    selectAllButton.addEventListener('click', () => {
        const checkboxes = document.querySelectorAll('.playlist-item input[type="checkbox"]');
        const checked = selectAllButton.textContent === 'Select All';

        checkboxes.forEach(checkbox => {
            checkbox.checked = checked;
        });

        updatePlaySelectedButton();
        selectAllButton.textContent = checked ? 'Unselect All' : 'Select All';
    });

    // Événement click sur le bouton Précédent
    prevButton.addEventListener('click', playPrevTrack);

    // Événement click sur le bouton Suivant
    nextButton.addEventListener('click', playNextTrack);

    // Événement de fin de lecture pour jouer la prochaine piste automatiquement
    audio.addEventListener('ended', playNextTrack);

    // Initialisation des événements de la playlist
    playlistItems.forEach(item => {
        const checkbox = item.querySelector('input[type="checkbox"]');
        checkbox.addEventListener('change', () => {
            updatePlaySelectedButton();
            updateSelectAllButton();
        });

        item.addEventListener('click', (e) => {
            if (e.target.tagName !== 'INPUT') { // Ignorer si le clic est sur le checkbox
                const src = item.getAttribute('data-src');
                const title = item.getAttribute('data-title');
                playTrack(src, title);
            }
        });
    });

    // Fonction pour mettre à jour l'état du bouton Select All
    function updateSelectAllButton() {
        const checkboxes = document.querySelectorAll('.playlist-item input[type="checkbox"]');
        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
        selectAllButton.textContent = allChecked ? 'Unselect All' : 'Select All';
    }

    // Mise à jour initiale de l'état du bouton "Play Selected" et "Play"
    updatePlaySelectedButton();
    updateSelectAllButton();
};

// Appel de setupAudioPlayer lorsque le DOM est chargé
document.addEventListener('DOMContentLoaded', () => {
    window.setupAudioPlayer(); // Initialisation du lecteur audio
});


