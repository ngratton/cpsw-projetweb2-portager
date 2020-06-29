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
            <div class="row">
                <div class="col">
                    <div class="conteneur-contenu" style="min-height: 220px;">
                        <div class="d-flex">
                            <img src="/images/arrow-thick-right.svg" alt="J'offre" class="echange-fleches mr-2">
                            <h6>J'offre</h6>
                        </div>

                        <div v-if="offre.length == 0" class="d-flex align-items-center justify-content-center position-absolute echange-bloc-vide">
                            <span class="text-muted"><small>Ajoutez des plants votre offre.</small></span>
                        </div>

                        <plant-liste
                            v-for="(plant, index) in offre"
                            :plant="plant"
                            :key="index"
                            @clicked="retirerMesOffres"
                        ></plant-liste>
                    </div>

                    <h3>Mon potager</h3>
                    <div class="conteneur-contenu" style="min-height: 220px;">
                        <!-- <div class="row type-plants-sepatateur ml-0 mr-0 mb-2 mt-2">
                            <div class="col-10 pl-0 type-nom">
                                <span>Tomates</span>
                            </div>
                            <div class="col-2 d-flex justify-content-end align-items-center">
                                <span>#</span>
                            </div>
                        </div> -->

                        <div v-if="mesPlants.length == 0" class="d-flex align-items-center justify-content-center position-absolute echange-bloc-vide">
                            <span class="text-muted"><small>Wo wo Max !</small></span>
                        </div>

                        <plant-liste
                            v-for="(plant, index) in mesPlants"
                            :plant="plant"
                            :key="index"
                            @clicked="ajoutMesOffres"
                        ></plant-liste>
                    </div>
                </div>
                <div class="col">
                    <div class="conteneur-contenu" style="min-height: 220px;">
                        <div class="d-flex justify-content-end">
                            <h6>Je demande</h6>
                            <img src="/images/arrow-thick-left.svg" alt="Je demande" class="echange-fleches ml-2">
                        </div>

                        <div v-if="demande.length == 0" class="d-flex align-items-center justify-content-center position-absolute echange-bloc-vide">
                            <span class="text-muted"><small>Ajoutez des plants à la demande.</small></span>
                        </div>

                        <plant-liste
                            v-for="(plant, index) in demande"
                            :plant="plant"
                            :key="index"
                            @clicked="retirerMesDemandes"
                        ></plant-liste>
                    </div>

                    <h3>Potager de #user</h3>
                    <div class="conteneur-contenu" style="min-height: 220px;">
                        <!-- <div class="row type-plants-sepatateur ml-0 mr-0 mb-2 mt-2">
                            <div class="col-10 pl-0 type-nom">
                                <span>Tomates</span>
                            </div>
                            <div class="col-2 d-flex justify-content-end align-items-center">
                                <span>#</span>
                            </div>
                        </div> -->

                        <div v-if="userPlants.length == 0" class="d-flex align-items-center justify-content-center position-absolute echange-bloc-vide">
                            <span class="text-muted"><small>Wo wo Max !</small></span>
                        </div>

                        <plant-liste
                            v-for="(plant, index) in userPlants"
                            :plant="plant"
                            :key="index"
                            @clicked="ajoutMesDemandes"
                        ></plant-liste>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="conteneur-contenu">
                        <button class="btn btn-block btn-primary mt-2" :disabled="echangeVide" @click.prevent="envoyerEchange">Proposer l'échange</button>
                        <button class="btn btn-block btn-secondary mt-2" disabled style="cursor: not-allowed;">Sauvegarder pour plus tard</button>
                        <button class="btn btn-block btn-tertiary mt-2" @click.prevent="annulerEchange">Annuler l'échange</button>
                        <p class="text-muted mt-4"><small>Le destinataire de la demande pourra accepter, proposer une contre-offre ou bien refuser l'offre.</small></p>
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
    props: [
        'plant_source'
    ],
    data() {
        return {
            mesPlants: [],
            userPlants: [],
            offre: [],
            demande: [],
            jardinier_id: Math.floor(Math.random() * 9) + 2, // À fixer
        }
    },  //data
    components: {
        entete,
        recherche,
        piedPage,
        plantListe,
    },  // components
    mounted() {
        // console.log(this.plant_source);
        this.fetchMesPlants()
        this.fetchUtilisateurPlants()
        // this.fetchDataUtilisateur() // À fixer
    },  // mounted
    methods: {
        fetchMesPlants() {
            axios.get(`/api/plants-utilisateur/${this.$store.state.user.id}`).then(data => {
                this.mesPlants = data.data
            })
        },
        fetchUtilisateurPlants() {
            axios.get(`/api/plants-utilisateur/${this.jardinier_id}`).then(data => {
                this.userPlants = data.data
            })
        },
        fetchDataUtilisateur() { // Obtenir user_id depuis plant_so
            // axios.get(`/api/user/${this.jardinier_id}`).then(data => { // URL non définie
            //     console.log(data)
            // })
        },
        ajoutMesOffres(id) {
            let plant = this.mesPlants.find(x => x.id === id)
            plant.opt = 'minus'
            this.offre.push(plant)
            let index = this.mesPlants.indexOf(plant);
            if (index !== -1) this.mesPlants.splice(index, 1);
            this.offre.sort((a, b) => (a.nom > b.nom) ? 1 : -1)
        },
        retirerMesOffres(id) {
            let plant = this.offre.find(x => x.id === id)
            this.mesPlants.push(plant)
            plant.opt = 'add'
            let index = this.offre.indexOf(plant)
            if (index !== -1) this.offre.splice(index, 1)
            this.mesPlants.sort((a, b) => (a.nom > b.nom) ? 1 : -1)
        },
        ajoutMesDemandes(id) {
            let plant = this.userPlants.find(x => x.id === id)
            this.demande.push(plant)
            plant.opt = 'minus'
            let index = this.userPlants.indexOf(plant)
            if (index !== -1) this.userPlants.splice(index, 1)
            this.demande.sort((a, b) => (a.nom > b.nom) ? 1 : -1)
        },
        retirerMesDemandes(id) {
            let plant = this.demande.find(x => x.id === id)
            this.userPlants.push(plant)
            plant.opt = 'add'
            let index = this.demande.indexOf(plant)
            if (index !== -1) this.demande.splice(index, 1)
            this.userPlants.sort((a, b) => (a.nom > b.nom) ? 1 : -1)

        },
        envoyerEchange() { // Éléments exactes à définir selon Backend
            axios.put('/api/echange/new', {
                from_id: this.$store.state.user.id,
                to_id: this.jardinier_id
            })
                .then(data => {
                    let echange_id = data.data
                    let liste_items = this.offre.concat(this.demande)
                    liste_items.forEach(ligne => {
                        ligne.plant_id = ligne.id
                    })

                    axios.put('/api/echange/items/new', {
                        echange_id: echange_id,
                        items: liste_items,
                    }).then(resp => {
                        this.$router.push(`echange/${resp.data}`)
                    }).catch(error => {
                        console.log(error)
                    })
                })
                .catch(error => {
                    console.log(error)
                })
        },
        annulerEchange() {
            console.log("Abord, abord !!")
        }
    }, // methods
    computed: {
        echangeVide() {
            if (this.offre.length == 0 || this.demande.length == 0) {
                return true
            } else {
                return false
            }
        },
    }
}
</script>

<style lang="scss" scoped>
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
