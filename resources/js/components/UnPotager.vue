<template>
  
    <div>       
        <div class="row align-items-center" id="potager">
            <div class="col">
                <img src="/images/Potager_placeholders/689870-couple-drummondville.jpg" alt="...">
                <img class="thumbnail" src="/images/Potager_placeholders/689870-couple-drummondville.jpg" alt="...">
                <img class="thumbnail" src="/images/Potager_placeholders/2017-09-11-11.49.39-660x495.jpg" alt="...">
                <img class="thumbnail" src="/images/Potager_placeholders/potager 2.jpg" alt="...">
                <img class="thumbnail" src="/images/Potager_placeholders/unnamed.jpg" alt="...">
            </div>
            <div class="col-9" id="potagerDescription">
                <div class="gauche">
                    <h6>Potager entretenu avec amour par {{ prenom }} {{ nom }}</h6>
                    <p> Utilisateur  note </p>
                    <h6>Description</h6>
                    <p> {{ bio }} </p>
                    <p style="font-weight: bold;">Le potager contient  #  plants de légumes,  #  plants de fruits et  #  plants de fines herbes.</p>
                </div>
                <div class="droite">
                    <button type="button" class="btn btn-secondary" style="background-color: #FFDD00; color: #332E0A;">Contacter  jardinier </button>
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
                <div id="cardPotager" class="card">
                    <img :src="plant.photo_mini" alt="..." class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Nom du plant</h5>
                        <button type="button" class="btn btn-secondary">
                            Voir le plant
                            </button>
                        <button type="button" class="btn btn-primary">Offrir un échange</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'UnPotager', 
        props: {
            // userid: Number,
        },
        data() {
            return {  
                userid: this.$store.state.user.id,
                plants: [],
                prenom: '',
                nom: '',
                bio: '',
                rating: '',
                tags_jardiniers: [],
            };
        
        },
        props: {

        },
        components: {
            
        },
        mounted() {
            axios.get('/api/plants-utilisateur/' + this.userid).then(data => {
                this.plants = data.data
                console.log(data.data)
            })

            axios.get('/api/profile/' + this.userid).then(data => {
                console.log(data.data)
                this.bio = data.data.bio
                this.prenom = data.data.first_name
                this.nom = data.data.last_name
                this.tags_jardiniers = data.data.tags_jardiniers

            })

            // axios.get('api/evaluation/potagers' + this.userid).then(data => {
            //     console.log(data.data)
            // })

        },
        methods: {

        },
    }
</script>