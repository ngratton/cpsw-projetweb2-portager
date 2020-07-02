<template lang="fr">
    <div class="col-sm">
        <div class="card" style="min-width: 210px;">
            <img :src="plant.photo_mini" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ plant.nom }}</h5>
                <p class="card-text">{{ plant.city }}</p>
                <p v-if="plant.first_name" class="card-text" style="text-align: right;">{{ full_name }}</p>
                <p v-if="plant.note_jard" class="card-text" style="text-align: right;">Note: {{ plant.note_jard }}</p>
                <div>
                    <button class="btn btn-block btn-secondary" @click.prevent="voirPlant(plant.id)">Voir le plant</button>
                    <button class="btn btn-block btn-primary" :disabled="plant.user_id === my_id" @click.prevent="lancerEchange(plant.id, plant.user_id)">Offrir un échange</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'plant',
    ],
    data() {
        return {
            my_id: 0,
        }
    },
    mounted() {
        this.$store.state.user ? this.my_id = this.$store.state.user.id : this.my_id = 0
    },
    methods: {
        voirPlant(id) {
            this.$router.push(`/plant/${id}`)
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
        }
    },
    computed: {
        full_name() {
            return `${this.plant.first_name} ${this.plant.last_name}`
        }
    }
}
</script>

<style lang="scss" scoped>
    // .card:hover {
    //     button {
    //         display: block;
    //     }
    // }

    // button {
    //     display: none;
    // }

</style>
