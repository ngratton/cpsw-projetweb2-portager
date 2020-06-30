<template>
    <div>
        <entete></entete>

        <header-accueil></header-accueil>

        <div class="container-fluid">
            <recherche></recherche>
        </div>

        <div class="container" id="content">

            <nouveaux-plants></nouveaux-plants>

            <div class="row mt-3 mb-5">
                <div class="col d-flex justify-content-center">
                    <img class="pubAccueil" src="/images/ad_768-90.png">
                </div>
            </div>

            <potagers-cotes></potagers-cotes>

            <plants-populaires></plants-populaires>

            <produits-boutique></produits-boutique>

        </div>

        <pied-page></pied-page>
    </div>
</template>

<script>
    import Messagerie from '../components/Messagerie'
    import Entete from '../components/Entete'
    import Recherche from '../components/Recherche'
    import PiedPage from '../components/PiedPage'
    import PotagersCotes from '../components/PotagersCotes'
    import NouveauxPlants from '../components/NouveauxPlants'
    import PlantsPopulaires from '../components/PlantsPopulaires'
    import ProduitsBoutique from '../components/ProduitsBoutique'
    import HeaderAccueil from '../components/HeaderAccueil'

    export default {
        name: 'Accueil',
        components: {
            Messagerie,
            Entete,
            Recherche,
            NouveauxPlants,
            PotagersCotes,
            PlantsPopulaires,
            PiedPage,
            ProduitsBoutique,
            HeaderAccueil,
        },
    }
</script>

<style lang="scss">
    .pubAccueil {
        max-width: 728px;
        height: auto;
    }
</style>
