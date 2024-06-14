<div x-data="{
    showDice: false,
    diceOptions: [
        { value: 4, image: '/images/MdiDiceD4Outline.png' },
        { value: 6, image: '/images/MdiDiceD6Outline.png' },
        { value: 8, image: '/images/MdiDiceD8Outline.png' },
        { value: 10, image: '/images/MdiDiceD10Outline.png' },
        { value: 12, image: '/images/MdiDiceD12Outline.png' },
        { value: 20, image: '/images/MdiDiceD20Outline.png' },
        { value: 100, image: '/images/MdiDiceD100Outline.png' }
    ],
    selectedDice: 6, // Dé 6-faces par défaut
    numberOfDice: 1,
    results: [],
    totalResult: 0,
    rollDice() {
        this.results = [];
        let total = 0;
        for (let i = 0; i < this.numberOfDice; i++) {
            let result = Math.floor(Math.random() * this.selectedDice) + 1;
            this.results.push(result);
            total += result;
        }
        this.totalResult = total;
    }
}">
    <!-- Composant Virtual Dice -->
    <div class="virtual-dice fixed top-0 right-0 z-20"
         x-show="showDice"
         x-on:click.away="showDice = false"
         x-cloak
         x-transition:enter="transition transform ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition transform ease-in duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
    >
        <div class="dice-content flex flex-col justify-center items-center text-xl bg-white p-4 shadow-lg rounded-lg">
            
            <h1 class="mb-4">Virtual Dice Roller</h1>
            <label class="mb-2">Choisissez le dé:</label>
            <div class="mb-4 flex">
                <template x-for="(option, index) in diceOptions" :key="index">
                    <div class=""> <!-- Utilisation des classes Bootstrap pour flex -->
                        <img :src="option.image" :alt="'Dé ' + option.value + '-faces'" class="w-15 h-auto">
                        <input type="radio" x-model="selectedDice" :value="option.value" class="ml-2">
                    </div>
                </template>
            </div>
            <div class="mb-4">
                <label for="numberOfDice" class="block mb-2">Quantité:</label>
                <input type="number" x-model.number="numberOfDice" id="numberOfDice" class="block px-4 py-2 rounded border">
            </div>
            <button @click="rollDice" class="px-4 py-2 bg-blue-500 text-white rounded">Roll</button>
            <template x-if="results.length > 0">
                <div class="mt-4">
                    <h2>Total: <span x-text="totalResult"></span></h2>
                </div>
            </template>
            <div x-on:click="showDice = false" class="mt-4 text-blue-500 cursor-pointer">
                Close
            </div>
        </div>
    </div>

    <div class="btn-dice fixed top-24 right-0 flex flex-col items-center p-1 z-10" x-on:click="showDice = true">
        <img class="dice-logo w-16" src="/images/dice-icon-menu.png" alt="Dice Logo">
    </div>
</div>
