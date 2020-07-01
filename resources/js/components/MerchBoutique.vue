<template lang="fr">
    <div class="col">
        <div class="card">
            <img :src="produit.images[0].src" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ produit.name }}</h5>
                <p class="card-text" style="text-align: right;">{{ prix }}</p>
                <button type="button" class="btn btn-block btn-tertiary" @click.prevent="navigateTo(produit.permalink)">Acheter</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'produit',
    ],
    methods: {
        obtenirPrix(prix) {
            const formatter = new Intl.NumberFormat('fr-CA', {
                style: 'currency',
                currency: 'CAD',
                minimumFractionDigits: 2
            })

            return formatter.format(prix)
        },
        navigateTo(lien) {
            window.open(lien, '_blank')
        }

    },
    computed: {
        prix() {
            return this.obtenirPrix(this.produit.price)
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
