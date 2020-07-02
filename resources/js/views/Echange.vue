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

                    <div class="d-flex align-items-center">
                        <img :src="profile_info.photo_mini" class="thumb-profil" />
                        <h3 class="mb-0">Mon potager</h3>
                    </div>
                    <div class="conteneur-contenu" style="min-height: 220px;">
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

                    <div class="d-flex align-items-center">
                        <img :src="jardinier_info.photo_mini" class="thumb-profil" />
                        <h3 class="mb-0">Potager de {{ jardinier_info.first_name }}</h3>
                    </div>
                    <div class="conteneur-contenu" style="min-height: 220px;">
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
        'plant',
        'jardinier',
    ],
    data() {
        return {
            mesPlants: [],
            userPlants: [],
            offre: [],
            demande: [],
            jardinier_info: {},
            profile_info: {},
        }
    },  //data
    components: {
        entete,
        recherche,
        piedPage,
        plantListe,
    },  // components
    mounted() {
        this.$root.hitVisits(window.location)
        this.fetchMesPlants()
        this.fetchUtilisateurPlants()
        this.fetchDataUtilisateur()
    },  // mounted
    methods: {
        fetchMesPlants() {
            axios.get(`/api/plants-utilisateur/${this.$store.state.user.id}`).then(data => {
                this.mesPlants = data.data
            })
        },
        fetchUtilisateurPlants() {
            axios.get(`/api/plants-utilisateur/${this.jardinier}`).then(resp => {
                this.userPlants = resp.data
                this.autoAjoutPlant()
            })
        },
        fetchDataUtilisateur() {
            axios.get(`/api/profile/${this.jardinier}`).then(resp => {
                this.jardinier_info = resp.data
            })
            axios.get(`/api/profile/${this.$store.state.user.id}`).then(resp => {
                this.profile_info = resp.data
            })
        },
        autoAjoutPlant() {
            if(this.plant) {
                this.ajoutMesDemandes(this.plant)
            }
        },
        ajoutMesOffres(id) {
            this.bougerItems(id, this.mesPlants, this.offre, 'minus')
        },
        retirerMesOffres(id) {
            this.bougerItems(id, this.offre, this.mesPlants, 'add')
        },
        ajoutMesDemandes(id) {
            this.bougerItems(id, this.userPlants, this.demande, 'minus')
        },
        retirerMesDemandes(id) {
            this.bougerItems(id, this.demande, this.userPlants, 'add')
        },
        bougerItems(id, liste_entree, liste_sortie, icone) {
            let plant = liste_entree.find(x => x.id === id)
            liste_sortie.push(plant)
            plant.opt = icone
            let index = liste_entree.indexOf(plant)
            if (index !== -1) liste_entree.splice(index, 1)
            liste_sortie.sort((a, b) => (a.nom > b.nom) ? 1 : -1)
        },
        envoyerEchange() {
            axios.put('/api/echange/new', {
                from_id: this.$store.state.user.id,
                to_id: this.jardinier_info.user_id
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
        jardinier_fullname() {
            if(Object.entries(this.jardinier_info).length > 0) {
                return `${this.jardinier_info.first_name} ${this.jardinier_info.last_name}`
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    #conteneur-echange {
        margin: 50px auto;
    }

    .thumb-profil {
        width: 40px;
        height: 40px;
        border: 1px solid green;
        border-radius: 50%;
        margin-right: 20px;
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
