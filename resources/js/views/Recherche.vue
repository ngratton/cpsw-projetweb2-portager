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

       <!-- Résultats Recherche -->

       <div class="row">
           <div class="col-4 resultatRecherche">
               <p>{{ nbResultats }} Résultats de recherche pour {{ termeRecherche }}</p>
           </div>
           <div class="col-8 resultatsParPage">
                <p>Résultats par page</p>
                <select  id="resultatsPage">
                    <option selected="selected">20</option>
                    <option>40</option>
                    <option>60</option>
                </select>
           </div>
       </div>

       <!-- Articles Recherchées -->

       <div class="row">
           <div class="col-2 lesRecherches">
                <div class="plantRechercher">
                    <img src="/images/imgEntete.png" alt="">
                    <p class="nomPlant">{{ nomPlant }}</p>
                    <p class="ville">{{ ville }}</p>
                    <div class="jardinier">
                        <p> {{ nomJardinier }} </p>
                        <p>{{ note }}</p>
                    </div>
                    <div class="liens">
                        <a class="voirPlant" href="#">Voir le plant</a>
                        <a class="offreEchange" href="#">Offrir un échange</a>
                    </div>
                </div>
           </div>

           <div class="col-2">
               <div class="plantRechercher">
                   
               </div>
           </div>

           <div class="col-2">
            <div class="plantRechercher">
                
            </div>
        </div>

        <div class="col-2">
            <div class="plantRechercher">
                
            </div>
        </div>
       </div>
    
        </div>
</template>

<script>
    import Entete from '../components/Entete';
    import Recherche from '../components/Recherche';
    
    export default {
        name: 'Recherche',
        data() {
            return {
                nbResultats: '0',
                termeRecherche: 'Terme',
                nomPlant: 'Nom du plant',
                ville: 'Villes',
                nomJardinier: 'Nom jardinier',
                note: 'Note',
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
body {
    background: #F7FDFF 0% 0% no-repeat padding-box;
    font-family: 'Inter', sans-serif;
    color: #707070;
}

.logo {
    position: relative;
    top: 52px;
    left: 300px;
}

.imgEntete {
    width: 100%;
    height: 315px;
}

.recherche {
   margin-bottom: 50px;
}

.resultatRecherche {
    position: relative;
    left: 295px;
}

.resultatsParPage {
    display: flex;
    justify-content: center;
    align-content: center;
}

#resultatsPage {
    margin-left: 5px;
    height: 25px;
}

.lesRecherches {
    margin-left: 250px;
}

.plantRechercher {
    width: 210px;
    height: 412px;
    background-color:#FFFFFF;
    box-shadow: 0px 10px 15px #00000029;
    border-radius: 16px;
}

.plantRechercher img {
    width: 210px;
    height: 210px;
    border-radius: 15px 15px 0px 0px;
}

.nomPlant {
    margin-top: 10px;
    margin-left: 20px;
}

.ville {
    margin-left: 20px;
}

.jardinier {
    display: flex;
    justify-content: space-around;
}

.liens {
    text-align: center;
}

.voirPlant {
    color: white;
    font: Regular 12px/15px Inter;
    padding-top: 3px;
    padding-bottom: 3px;
    padding-left: 50px;
    padding-right: 50px;
    border-radius: 6px;
    background-color: #9FCC3B;
}

.offreEchange {
    color: #332E0A;
    font: Bold 12px/15px Inter;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 45px;
    padding-right: 45px;
    border-radius: 6px;
    background-color: #FFDD00;
}

</style>