<template lang="fr">
    <transition name="fade">
        <div class="row mb-2 mt-2">
            <div class="col-10 d-flex align-items-center">
                <img :src="plant.photo_mini" class="plant-img-thumb">
                <span class="plant-nom">{{ plant.nom }}</span>
            </div>
            <div class="col-2 d-flex justify-content-end align-items-center">
                <img src="/images/add-solid.svg" class="echange-plus" @click="ajoutPlantEchange">
            </div>
        </div>
    </transition>
</template>


<script>
export default {
    props: [
        'plant',
        'index',
    ],
    mounted() {
        //
    },
    methods: {
        ajoutPlantEchange() {
            this.$emit('clicked', this.plant.id)
        }
    }
}
</script>


<style lang="scss">
    .type-plants-sepatateur {
        border-bottom: 2px solid #9FCC3B;

        .type-nom {
            font-weight: bold;
            color: #717C89;
        }
    }

    .plant-img-thumb {
        height: 60px;
        width: 60px;
        border-radius: 50%;
    }

    .plant-nom {
        margin-left: 10px;
    }

    .echange-plus {
        height: 25px;
        width: auto;
        color: #717C89;
        cursor: pointer;
    }

    @media screen and (max-width: 992px) {
        .plant-nom {
            font-size: 12px;
        }

        .plant-img-thumb {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
