<template>
  
    <div>       
        <div class="row align-items-center" id="potager">
            <div class="col">
                <img :src="grosseImage" alt="...">
                <img class="thumbnail" v-for="(thumbnail, index) in thumbnails" :key="index" :src="thumbnail" alt="..." @click="grosseImage = thumbnail">
            </div>
            <div class="col-9" id="potagerDescription">
                <div class="gauche">
                    <h6>Potager entretenu avec amour par</h6>
                    <p> {{ prenom }} {{ nom }} <img id="etoile" src="/images/star.png" v-for="item in etoiles" :key="item"> </p>
                    <h6>Description</h6>
                    <p> {{ bio }} </p>
                </div>
                <div class="droite">
                    <router-link tag="div" :to="`/messages/{userid}`" class="h-100 d-flex align-items-center justify-content-center">
                        <button type="button" class="btn btn-secondary" style="background-color: #FFDD00; color: #332E0A;">Contacter  jardinier </button>
                    </router-link>
                    <h6>Étiquettes</h6>
                    <ul>
                        <li v-for="tags_jardinier in tags_jardiniers" :key="tags_jardinier"> {{ tags_jardinier }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col" id="adminTitre">
                <h3>Dans ce potager...</h3>
            </div>
        </div>
        <div class="row contentPotager">
            <div
                class="col"
                style="min-width: 210px;"
                v-for="(plant, index) in plants" :key="index"
            >
                <card-plant :plant="plant"></card-plant>
            </div>
        </div>
    </div>

</template>

<script>
    import CardPlant from './CardPlant';
    export default {
        name: 'UnPotager', 
        data() {
            return {  
                plants: [],
                prenom: '',
                nom: '',
                bio: '',
                rating: '',
                tags_jardiniers: [],
                vote: '',
                cote: '',
                etoiles: '',
                grosseImage: "/images/Potager_placeholders/689870-couple-drummondville.jpg",
                thumbnails:["/images/Potager_placeholders/689870-couple-drummondville.jpg","/images/Potager_placeholders/potager 2.jpg","/images/Potager_placeholders/unnamed.jpg"]
            };
        
        },
        props: {
            userID: {}
        },
        components: {
            CardPlant
        },
        mounted() {
            axios.get('/api/plants-utilisateur/' + this.userID).then(data => {
                this.plants = data.data
            })
            axios.get('/api/profile/' + this.userID).then(data => {
                console.log(data.data)
                this.bio = data.data.bio
                this.prenom = data.data.first_name
                this.nom = data.data.last_name
                this.tags_jardiniers = data.data.tags_jardiniers
                this.cote = data.data.note_moy

                if (this.cote != null) {

                    if (this.cote <= 1) {
                        this.etoiles = 1
                    } else if (this.cote >= 2 && this.cote <= 3) {
                        this.etoiles = 2
                    } else if (this.cote >= 3 && this.cote <= 4) {
                        this.etoiles = 3
                    } else if (this.cote >= 4 && this.cote <= 5) {
                        this.etoiles = 4
                    } else if (this.cote = 5) {
                        this.etoiles = 5
                    }
                }

            })
        },
        methods: {

        },
    }
</script>

<style lang="css">

#potager .etoiles {
    margin-left: 5%;
    display:flex;
    flex-direction: row;
    width: 200px;
    height: 50px;
}

#potager #etoile {
    height: 20px;
    width: 20px;
}

</style>