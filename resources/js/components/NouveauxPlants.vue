<template>

<div>
    <div class="row mt-5 mb-3">
            <div class="col">
                <h3>Nouveaux plants</h3>
            </div>
        </div>

    <div class="row d-flex flex-wrap">
        <card-plant
            v-for="(plant,index) in plants"
            :key="index"
            :plant="plant"
        ></card-plant>

        <div class="col">
            <div class="card h-100" style="min-width: 210px;">
                <router-link tag="div" :to="`/potagers`" class="h-100 d-flex align-items-center justify-content-center">
                    <span>Plus...</span>
                </router-link>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import CardPlant from '../components/CardPlant'

export default {
    name: 'NouveauxPlants',
    data() {
        return {
            plants: {},
        };
    },
    components: {
        CardPlant,
    },
    mounted() {
        this.fetchPotagers()

        setInterval(() => {
            this.fetchPotagers()
        }, 15000)
    },
    methods: {
        fetchPotagers() {
            axios.get('/api/plants/nouveaux/accueil').then(resp => {
                this.plants = resp.data
            })
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
