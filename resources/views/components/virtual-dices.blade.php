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
        <div class="dice-content flex flex-col justify-center items-center text-xl shadow-lg rounded-lg">
            <div x-on:click="showDice = false" class="text-4xl absolute right-4 top-2 text-blue-500 cursor-pointer"> 
                X
            </div>
            <h1 class="mb-4 mt-10 text-3xl">Dés Virtuels</h1>
            <div class="mb-4 flex flex-wrap items-center justify-center">
            <template x-for="(option, index) in diceOptions" :key="index">
                <div class="w-1/4 m-2"> <!-- Utilisation des classes Bootstrap pour flex -->
                    <label class="image-radio">
                        <img :src="option.image" :alt="'Dé ' + option.value + '-faces'" class="w-20 h-auto" :class="{ 'shadow-effect': selectedDice === option.value }" @click="selectedDice = option.value">
                        <input type="radio" x-model="selectedDice" :value="option.value" class="hidden">
                    </label>
                </div>
            </template>
            </div>
            <div class="flex flex-row items-center">
                <div class="flex flex-col items-center mb-4">
                    <label for="numberOfDice" class="font-volk-cyan block mb-2">Nombre de Dés</label>
                    <input type="number" x-model.number="numberOfDice" id="numberOfDice" class="bg-light-blue text-center text-3xl w-28 block px-4 py-2 rounded border">
                </div>
                <img @click="rollDice" class="btn-roll w-24 h-24 ml-3 p-3 rounded-full" src="/images/icons/rolldices.png" alt="">
            </div>
            
            <div class="mt-4 mb-4">
                <h2 class="font-volk-orange text-4xl" >Résultat: <span class="font-volk-cyan" x-text="totalResult"></span></h2>
            </div>
        </div>
    </div>

    <div class="btn-dice fixed top-24 right-0 flex flex-col items-center p-1 z-10 rounded-tl-full rounded-bl-full" x-on:click="showDice = true">
        <img class="dice-logo w-16" src="/images/dice-icon-menu.png" alt="Dice Logo">
    </div>
</div>
