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

            <h2>Resumé de l'échange</h2>
            <p v-if="echange.from_id == moi">Proposition envoyée à : <router-link :to="`/profile/${echange.to_id}`">#user</router-link>
            <p v-if="echange.to_id == moi">Proposition envoyée par : <router-link :to="`/profile/${echange.from_id}`">#user</router-link>

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
                        <p>Status : <strong>{{ echange.status }}</strong></p>
                        <p>Date de l'offre : <strong>{{ date_creation }}</strong></p>
                        <p v-if="echange.status != 'Offre initiale'">Offre acceptée : {{ data_modification }}</p>
                        <div v-if="echange.status != 'Confirmée' && echange.status != 'Terminée'">
                            <button
                                class="btn btn-block btn-primary mt-2"
                                :disabled="echange.from_id == moi"
                                @click.prevent="accepterEchange"
                            >Accepter</button>

                            <button
                                class="btn btn-block btn-secondary mt-2"
                                v-if="echange.from_id == moi"
                            >Modifier</button>

                            <button
                                class="btn btn-block btn-secondary mt-2"
                                v-if="echange.to_id == moi"
                            >Faire une contre-offre</button>

                            <button
                                class="btn btn-block btn-tertiary mt-2"
                                @click.prevent="annulerEchange"
                                >Annuler</button>
                        </div>
                        <p class="mt-3 text-muted">Code unique : <strong>{{ echange.id }}</strong></p>
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
        accepterEchange() {
            axios.post(`/api/echange/complete/${this.echange_id}`).then(resp => {
                this.$router.go()
            })
        },
        annulerEchange() {
            axios.post(`/api/echange/cancel/${this.echange_id}`).then(resp => {
                this.$router.go()
            })
        },
        formatDate(dateToFormat) {
            let date = new Date(dateToFormat)
            let jour = date.getDate()
            let mois = date.getMonth() + 1
            let annee = date.getFullYear()
            let heure = date.getHours()
            let min = date.getMinutes()

            if(min < 10) {
                min = `0${min}`
             }

            return `${jour}/${mois}/${annee} à ${heure}h${min}`
        },
    }, // methods
    computed: {
        date_creation() {
            return this.formatDate(this.echange.created_at)
        },
        data_modification() {
            return this.formatDate(this.echange.updated_at)
        },
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
