

<template>
    <div>
     <entete></entete>
    <div class="container-fluid" id="bannerPotager">
        <div class="container">
            <div class="row"> <!--banner-->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <recherche></recherche>
    </div>
    <div class="container">
            <un-potager></un-potager>
        <div class="row">
            <div class="col" id="adminTitre">
                <h3>Dans ce potager...</h3>
            </div>
        </div>
        <div class="row contentPotager">
            <div
                class="col"
                style="min-width: 210px;"
                v-for="plant in plants"
            >
                <div id="cardPotager" class="card">
                    <img :src="plant.photo_mini" alt="..." class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Nom du plant</h5>
                        <button type="button" class="btn btn-secondary">
                            Voir le plant
                            </button>
                        <button type="button" class="btn btn-primary">Offrir un échange</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <pied-page></pied-page>
    </div>
</template>

<script>
    import Entete from '../components/Entete';
    import Recherche from '../components/Recherche';
    import UnPotager from '../components/UnPotager';
    import CartePotager from '../components/CartePotager';
    import PiedPage from '../components/PiedPage';
    export default {
        name: 'Potager',
        data() {
            return {
                plants: [],
            };

        },
        props: {

        },
        components: {
            Entete,
            Recherche,
            UnPotager,
            CartePotager,
            PiedPage,
        },
        mounted() {
            this.fetchPlants()
        },
        methods: {
            fetchPlants() {
                axios.get('/api/mes-plants').then(data => {
                    this.plants = data.data
                })
            }
        },
    }
</script>
