<template>
    <div>
        <div class="row mt-5 mb-3">
            <div class="col-lg">
                <h3>Montrez fièrement votre sens du partage !</h3>
            </div>
        </div>

        <div class="row">
            <merch-boutique
                v-for="produit in produits"
                :key="produit.id"
                :produit="produit"
            ></merch-boutique>
        </div>
    </div>
</template>

<script>
import MerchBoutique from '../components/MerchBoutique'

export default {
    name: 'ProduitsBoutique',
    data() {
        return {
            produits: {},
        }
    },
    components: {
        MerchBoutique,
    },
    mounted() {
        this.fetchProducts()
    },
    methods: {
        fetchProducts() {
            // const CK = 'ck_a123f80c7cf4b09b2f5cebe6a74ee31791cf8596'
            // const CS = 'cs_89e2ab9b0dd81ac1899be433ffb63021053bf8b6'

            // https://boutique.portager.app/wp-json/wc/v3/products?consumer_key=ck_a123f80c7cf4b09b2f5cebe6a74ee31791cf8596&consumer_secret=cs_89e2ab9b0dd81ac1899be433ffb63021053bf8b6

            // fetch(`https://boutique.portager.app/wp-json/wc/v3/products?consumer_key=${CK}&consumer_secret=${CS}`).then(resp => {
            //     console.log(resp)
            // })

            axios.get('js/produits_boutique.json').then(resp => {
                let liste_produits = resp.data
                let randomized = liste_produits.sort(() => 0.5 - Math.random())
                this.produits = randomized.slice(0, 5)
            })
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
