<template>
    <div>
    
     <div class="row header">
            <div class="col-4">
                <img class="logo" src="/images/logo.svg" alt="">
            </div>
            <div class="col-3 menuPrincipal">   
                    <a href="#">Plants</a>
                    <a href="#">Carte potagers</a>
                    <a href="#">Boutique</a> 
            </div>
            <div class="col-5 userConnecter">
                <p>Bonjour Utilisateurs !</p>
                <img class="notifs" src="/images/notifs.svg" alt="">
                <img class="user" src="/images/user.svg" alt=""> 
            </div>
       </div>

       <!-- Image Entête -->

       <div class="row imgHeader">
            <div class="col">
                <img class="imgEntete" src="/images/imgEntete.png" alt="">
            </div>
       </div>

       <!-- Recherche -->

       <div class="row">
           <div class="col">
                <div class="recherche">

                </div>
           </div>
       </div>

       <!-- Résultats Recherche -->

       <div class="row">
           <div class="col-4 resultatRecherche">
               <p>''#'' Résultats de recherche pour ''Terme''</p>
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
                    <p class="nomPlant">Nom du plant</p>
                    <p class="ville">Ville</p>
                    <div class="jardinier">
                        <p>Nom jardinier</p>
                        <p>Note</p>
                    </div>
                    <div class="liens">
                        <a class="voirPlant" href="#">Voir le plant</a> </br>
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
    
    export default {
        name: 'Recherche',
        data() {
            return {
                //
            };
        },
        props: {
            //
        },
        components: {
           //
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

.menuPrincipal{
    margin-top: 75px;
    display: flex;
}

.menuPrincipal > a {
    padding-right: 24px;
}

.menuPrincipal > a:nth-child(1) {
    padding-left: 50px;
}

.userConnecter {
    position: relative;
    top: 80px;
    display: flex;
    justify-content: center;
}

.userConnecter > img {
    margin-left: 10px;
    width: 30px;
    height: 30px;
}

.imgEntete {
    margin-top: 60px;
    width: 100%;
    height: 315px;
}

.recherche {
    position: relative;
    top: -80px;
    left: 250px;
    width: 1000px;
    height: 134px;
    background: #9FCC3B 0% 0% no-repeat padding-box;
    box-shadow: 0px 5px 10px #00000029;
    border-radius: 16px;
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