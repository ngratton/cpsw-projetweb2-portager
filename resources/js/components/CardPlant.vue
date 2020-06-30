<template lang="fr">
    <div class="col">
        <div class="card">
            <img :src="plant.photo_mini" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ plant.nom }}</h5>
                <p class="card-text">{{ plant.city }}</p>
                <p class="card-text" style="text-align: right;">{{ full_name }}</p>
                <p class="card-text" style="text-align: right;">Note: {{ plant.note_jard }}</p>
                <div>
                    <button class="btn btn-block btn-secondary" @click.prevent="voirPlant(plant.id)">Voir le plant</button>
                    <button class="btn btn-block btn-primary" @click.prevent="lancerEchange(plant.id, plant.user_id)">Offrir un échange</button>
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
    methods: {
        voirPlant(id) {
            this.$router.push(`plant/${id}`)
        },
        lancerEchange(plant_id, user_id) {
            if(this.$store.state.logged_in) {
                this.$router.push({ name: 'Echange' })
            } else {
                // this.
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
