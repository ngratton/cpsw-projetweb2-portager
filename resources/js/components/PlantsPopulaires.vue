<template>

<div>
    <div class="row mt-5 mb-3"> <!-- Plants Populaire -->
        <div class="col">
            <h3>Plants les plus populaires</h3>
        </div>
    </div>

    <div class="row">
        <card-plant
            v-for="(plant,index) in plants"
            :key="index"
            :plant="plant"
        ></card-plant>

        <div class="col">
            <div class="card h-100">
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
    name: 'PlantPopulaire',
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
    },
    methods: {
        fetchPotagers() {
            axios.get('/api/plants/populaires/accueil').then(resp => {
                this.plants = resp.data
            })
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
