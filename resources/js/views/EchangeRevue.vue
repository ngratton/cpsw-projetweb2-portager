<template lang="fr">
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

        <div class="container" id="conteneur-echange">

            <h2>Resumé de l'échange avec #user</h2>
            <p>Status : <strong>{{ echange.status }}</strong></p>

            <div class="row">
                <div class="col">
                    <div class="conteneur-contenu" style="min-height: 220px;">
                        <div class="d-flex">
                            <img src="/images/arrow-thick-right.svg" alt="J'offre" class="echange-fleches mr-2">
                            <h6 v-if="echange.from_id == moi">J'offre</h6>
                            <h6 v-if="echange.to_id == moi">On m'offre</h6>
                        </div>

                        <plant-liste
                            v-for="(plant, index) in offre"
                            :plant="plant"
                            :key="index"
                        ></plant-liste>
                    </div>
                </div>
                <div class="col">
                    <div class="conteneur-contenu" style="min-height: 220px;">
                        <div class="d-flex justify-content-end">
                            <h6 v-if="echange.from_id == moi">Je demande</h6>
                            <h6 v-if="echange.to_id == moi">On me demande</h6>
                            <img src="/images/arrow-thick-left.svg" alt="Je demande" class="echange-fleches ml-2">
                        </div>

                        <plant-liste
                            v-for="(plant, index) in demande"
                            :plant="plant"
                            :key="index"
                        ></plant-liste>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="conteneur-contenu">
                        <button class="btn btn-block btn-primary mt-2" @click.prevent="envoyerEchange">Accepter l'échange</button>
                        <button class="btn btn-block btn-secondary mt-2">Faire une contre-offre</button>
                        <button class="btn btn-block btn-tertiary mt-2" @click.prevent="annulerEchange">Annuler l'échange</button>
                        <p class="text-muted mt-4"><small>Tralala</small></p>
                    </div>
                </div>
            </div>

        </div>

        <pied-page></pied-page>
    </div>
</template>

<script>
import entete from '../components/Entete'
import recherche from '../components/Recherche'
import piedPage from '../components/PiedPage'
import plantListe from './components/Echange/PlantListe'

export default {
    data() {
        return {
            moi: this.$store.state.user.id,
            echange_id: this.$route.params.echange_id,
            offre: [],
            demande: [],
            echange: [],
            jardinier_id: null,
        }
    },  //data
    components: {
        entete,
        recherche,
        piedPage,
        plantListe,
    },  // components
    mounted() {
        this.fetchEchange()
    },  // mounted
    methods: {
        fetchEchange() {
            axios.get(`/api/echange/${this.echange_id}`).then(data => {
                this.echange = data.data
                console.log(data.data.items)
                let items = data.data.items
                items.forEach(item => {
                    if (item.user_id == this.$store.state.user.id) {
                        this.offre.push(item)
                    } else {
                        this.demande.push(item)
                    }
                })
            })
        },
        fetchUtilisateurPlants() {
            axios.get(`/api/plants-utilisateur/${this.jardinier_id}`).then(data => {
                this.userPlants = data.data
            })
        },
    }, // methods
    computed: {
        //
    }
}
</script>

<style lang="scss">
    #conteneur-echange {
        margin: 50px auto;
    }

    .conteneur-contenu {
        background: white;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.3);
        margin: 30px 0;
        position: relative;
    }

    .echange-minus {
        height: 25px;
        width: auto;
        color: #717C89;
    }

    .echange-fleches {
        height: 20px;
        width: auto;
    }

    .echange-bloc-vide {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }

    @media screen and (max-width: 468px) {
        .conteneur-contenu {
            padding: 10px;
        }
    }
</style>
