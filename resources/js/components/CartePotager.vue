<template lang="fr">
    <div class="col" style="min-width: 210px;">
            <div class="card h-100">
                <router-link tag="div" :to="`/potager/${potager.user_id}`">
                    <img :src="potager.photos_path" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ full_name }}</h5>
                        <p class="card-text">{{ potager.city }}</p>
                        <p class="card-text" style="text-align: right;">{{ potager.note_moy }}</p>
                        <p class="card-text" style="text-align: right;">
                            <img v-for="n in potager.note_moy" src="images/star.png" class="rating-stars" />
                        </p>
                        <button class="btn btn-secondary btn-block" @click.prevent="navigateTo(potager.user_id)">
                            Visiter le potager
                        </button>
                    </div>
                </router-link>
            </div>
    </div>
</template>

<script>
    export default {
        name: 'CartePotager',
        data() {
            return {
                data: 0,
            };

        },
        props: [
            'potager',
        ],
        methods: {
            navigateTo(id) {
                this.$router.push(`/potager/${id}`)
            }
        },
        computed: {
            full_name() {
                return `${this.potager.first_name} ${this.potager.last_name}`
            }
        }
    }
</script>

<style lang="scss" scoped>
    .rating-stars {
        height: 15px;
        width: auto;
    }
</style>
