<template>
    <div>

        <entete></entete>

        <div class="container-fluid" id="bannerPlant">
            <div class="container">
                <div class="row"> <!--banner-->
                </div>
            </div>
        </div>
        <div class="container-fluid">

        <recherche></recherche>

        </div>
        <div class="container">

            <div class="row">
                <div class="col-md" style="max-width: 420px;">
                    <img :src="plant.photo" alt="Plant" id="photo-plant" />
                </div>
                <div class="col-md ml-md-4">
                    <div class="row conteneur-contenu">
                        <div class="col">
                            <h2>{{ plant.nom }}</h2>

                            <h5 class="mt-4">Jardinier</h5>
                            <span>
                                <router-link :to="`/profil/${plant.user_id}`">
                                    {{ full_name }}
                                </router-link>
                            </span>

                         <span class="ml-4">{{ plant.note_user }}</span>

                            <div v-if="plant.description">
                                <h5 class="mt-4">Description</h5>
                                <p>{{ plant.description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex flex-column">
                            <button
                                class="btn btn-primary mb-2"
                                :disabled="plant.user_id === my_id"
                                @click.prevent="lancerEchange(plant.id, plant.user_id)
                            ">
                                Offrir un echange
                            </button>
                            <button class="btn btn-secondary mb-2" @click.prevent="navigateTo(plant.potager_id)">Voir tout le potager</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div v-if="autre_plants.length != 0">
                    <h3 class="mt-5 mb-3">Aussi dans le potager de {{ plant.first_name }}</h3>
                    <div class="row">

                        <card-plant
                            v-for="plant in autre_plants"
                            :plant="plant"
                            :key="plant.id"
                        ></card-plant>

                    </div>
                </div>
            </div>

            <div class="container-fluid mt-3 mb-3">
                <div id="trucs-jardinage" class="row">
                    <div class="col-md-8 col-lg-9">
                        <h4 class="mb-5">Trucs de jardinage</h4>
                        <table>
                            <thead>
                                <th>CM entre les plants</th>
                                <th>CM entre les rangs</th>
                                <th>Jours de maturation</th>
                                <th>Remarques</th>
                            </thead>
                            <tbody>
                                <td>{{ plant.cm_entre_plants }}</td>
                                <td>{{ plant.cm_entre_rangs }}</td>
                                <td>{{ plant.jours_maturation }}</td>
                                <td>{{ plant.remarques }}</td>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-lg-3" style="min-width: 250px;">
                        <img src="/images/ad_250x250.png" alt="Publicité" />
                    </div>
                </div>
            </div>

        </div>

        <pied-page></pied-page>

    </div>
</template>

<script>
import CardPlant from '../components/CardPlant'
import Entete from '../components/Entete'
import Recherche from '../components/Recherche'
import PiedPage from '../components/PiedPage'


export default {
    name: 'Plant',
    components: {
        CardPlant,
        Entete,
        Recherche,
        PiedPage,
    },
    data() {
        return {
            plant: {},
            plant_id: null,
            autre_plants: {},
            my_id: null,
        }
    },
    mounted() {
        this.$store.state.user ? this.my_id = this.$store.state.user.id : this.my_id = 0
        this.plant_id = this.$route.params.plant_id
        this.fetchPlant(this.plant_id)
    },
    methods: {
        fetchPlant(id) {
            axios.get(`/api/plant/${id}`).then(resp => {
                this.plant = resp.data
                this.fetchPotager(this.plant.user_id)
            })
        },
        fetchPotager(id) {
            axios.get(`/api/plants-utilisateur/${id}`).then(resp => {
                let plant_potager = resp.data
                let randomized = plant_potager.sort(() => 0.5 - Math.random())
                this.autre_plants = randomized.slice(0, 5)
            })
        },
        navigateTo(id) {
            this.$router.push(`/potager/${id}`)
        },
        lancerEchange(plant_id, user_id) {
            if(user_id === this.my_id) {
                alert('Vous ne pouvez pas échanger avec vous même !')
                return
            }
            if(this.$store.state.logged_in) {
                this.$router.push({path: '/echange', query: {plant: plant_id, jardinier: user_id}})
            } else {
                this.$router.push({ name: 'Connexion', query: { whereto: `/echange?plant=${plant_id}&jardinier=${user_id}` }})
            }
        },
    },
    computed: {
        full_name() {
            return `${this.plant.first_name} ${this.plant.last_name}`
        }
    },
    watch: {
        '$route.params'() {
            this.plant_id = this.$route.params.id
            this.fetchPlant(this.$route.params.id)
        }
    },
}
</script>

<style lang="scss" scoped>
    #bannerPlant {
        color: white;
        z-index: -5;
        width: 100%;
        height: 260px;
        background-position: 0% 50%;
        background-size: cover;
        background-image: url('/images/hero/harvest_basket.0.jpg');
    }

    #trucs-jardinage {
        background-color: #DFFFCC;
        border-radius: 16px;
        padding: 30px;

        thead {
            border-bottom: 2px solid #9FCC3B;
        }
    }

    #photo-plant {
        margin: 30px 0;
        border-radius: 16px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.3);
        width: 100%;
        max-width: 420px;
        height: auto;
        align-self: center;
    }
</style>
