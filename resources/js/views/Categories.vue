<template>
    <div>

        <entete></entete>

       <!-- Image Entête -->

       <div class="row imgHeader">
            <div class="col">
                <img class="imgEntete" src="/images/imgEntete.png" alt="">
            </div>
       </div>

       <!-- Recherche -->

       <div class="row">
           <div class="col recherche">
                <div class="container" id="search"> <!-- recherche -->
                <div class="row align-items-center">
                    <form class="col" method="post">
                        <div class="form-group form-check-inline">
                            <input class="form-control form-control-lg" type="text" placeholder="Recherche...">
                            <button type="button" class="btn btn-secondary">Chercher</button>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="form-check form-check-inline">
                                    Rechercher par
                                        <input class="form-check-input" name="type" type="radio" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Plants</label>
                                        <input class="form-check-input" name="type" type="radio" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox1">Villes</label>
                                        <input class="form-check-input" name="type" type="radio" id="inlineCheckbox3" value="option3">
                                        <label class="form-check-label" for="inlineCheckbox1">Étiquettes</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           </div>
       </div>

        <!-- Filtre Catégories -->

        <div>

            <p class="titreFiltre">Filtre des catégories</p>

            <div class="row categories">
            <div class="col">
                <p class="noms">Tomates</p>
                <img src="/images/tomates.png" alt="">
            </div>
            <div class="col">
                <p class="noms">Tomates</p>
                <img src="/images/tomates.png" alt="">
            </div>
            <div class="col">
                <p class="noms">Tomates</p>
                <img src="/images/tomates.png" alt="">
            </div>
            <div class="col">
                <p class="noms">Tomates</p>
                <img src="/images/tomates.png" alt="">
            </div>
            <div class="col">
                <p class="noms">Tomates</p>
                <img src="/images/tomates.png" alt="">
            </div>
        </div>
    
            
            <div class="row categories">
                <div class="col">
                    <p class="noms">Concombre</p>
                    <img src="/images/cucumber.png" alt="">
                </div>
                <div class="col">
                    <p class="noms">Concombre</p>
                    <img src="/images/cucumber.png" alt="">
                </div>
                <div class="col">
                    <p class="noms">Concombre</p>
                    <img src="/images/cucumber.png" alt="">
                </div>
                <div class="col">
                    <p class="noms">Concombre</p>
                    <img src="/images/cucumber.png" alt="">
                </div>
                <div class="col">
                    <p class="noms">Concombre</p>
                    <img src="/images/cucumber.png" alt="">
                </div>
            </div>


            <div class="row categories">
                <div class="col">
                    <p class="noms">Framboises</p>
                    <img src="/images/framboise.png" alt="">
                </div>
                <div class="col">
                    <p class="noms">Framboises</p>
                    <img src="/images/framboise.png" alt="">
                </div>
                <div class="col">
                    <p class="noms">Framboises</p>
                    <img src="/images/framboise.png" alt="">
                </div>
                <div class="col">
                    <p class="noms">Framboises</p>
                    <img src="/images/framboise.png" alt="">
                </div>
                <div class="col">
                    <p class="noms">Framboises</p>
                    <img src="/images/framboise.png" alt="">
                </div>
            </div>
        
        </div>
    </div>
    
</template>

<script>
    import Entete from '../components/Entete';
    import Recherche from '../components/Recherche';
    
    export default {
        name: 'Categories',
        data() {
            return {
                //
            };
        },
        props: {
            //
        },
        components: {
             Entete,
             Recherche,
        },
        mounted() {
            //
        },

        methods: {
            //
             
        },
        
        computed: {
            isLogged() {
                return this.$store.state.logged_in
            },
        }
    }
</script>


<style lang="scss">

#app > div > div:nth-child(4) > p {
    margin-left: 165px;
}

.noms {
    position: relative;
    top: 60px;
    left: 20px;
}

.categories {
    margin-left: 150px;
    margin-right: 150px;
    margin-bottom: 20px;
    margin-top: 20px;
}

.categories > .col > img {
    background-color: white;
    border-radius: 16px;
    background: transparent 0% 0% no-repeat padding-box;
    width: 210px;
    height: 210px;
}

</style>