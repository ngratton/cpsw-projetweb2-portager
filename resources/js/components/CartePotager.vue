<template lang="fr">
    <div class="col" style="min-width: 210px;">
            <div class="card h-100">
                <router-link tag="div" :to="`/potager/${potager.user_id}`">
                    <img :src="potager.photos_path" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ full_name }}</h5>
                        <p class="card-text">{{ potager.city }}</p>
                        <p class="card-text" style="text-align: right;">{{ potager.note_moy }}</p>
                        <p v-if="!potager.not_moy" class="card-text" style="text-align: right;">
                            <img src="images/star.png" class="rating-stars" />
                            <img src="images/star.png" class="rating-stars" />
                            <img src="images/star.png" class="rating-stars" />
                            <img src="images/star.png" class="rating-stars" />
                        </p>
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
