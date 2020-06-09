

<template>
    <div>
     <entete></entete>
    <div class="container-fluid" id="bannerPotager">
        <div class="container">
            <div class="row"> <!--banner-->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <recherche></recherche>
    </div>
    <div class="container">
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
                    <h6>Potager entretenu avec amour par</h6>
                    <p> Utilisateur  note </p>
                    <h6>Description</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit officiis ratione expedita quam neque laborum suscipit, et fuga at ducimus, sunt, doloremque quis adipisci. Obcaecati exercitationem maxime corporis earum. Nihil.</p>
                    <p style="font-weight: bold;">Le potager contient  #  plants de légumes,  #  plants de fruits et  #  plants de fines herbes.</p>
                </div>
                <div class="droite">
                    <button type="button" class="btn btn-secondary" style="background-color: #FFDD00; color: #332E0A;">Contacter  jardinier </button>
                    <h6>Étiquettes</h6>
                    <ul>
                        <li>Biologique</li>
                        <li>Culture en serre</li>
                        <li>Biologique</li>
                        <li>Biologique</li>
                        <li>Biologique</li>
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
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col-6" id="carte">
                <img class="img-responsive img-center" src="/images/carte.png">
            </div>
            <div class="w-100"></div>
        </div>
        <div class="row contentPotager">
            <div class="col">
               <carte-potager></carte-potager>
            </div>
            <div class="col">
               <carte-potager></carte-potager>
            </div>
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col">
               <carte-potager></carte-potager>
            </div>
            <div class="w-100"></div>
        </div>
    </div>
    <PiedPage></PiedPage>
    </div>
</template>

<script>
    import Entete from '../components/Entete';
    import Recherche from '../components/Recherche';
    import CartePotager from '../components/CartePotager';
    import PiedPage from '../components/PiedPage';
    export default {
        name: 'Potager', 
        data() {
            return {  
                data: 0,
            };
        
        },
        props: {

        },
        components: {
            Entete,
            Recherche,
            CartePotager,
            PiedPage,
        },
        mounted() {

        },
        methods: {

        },
    }
</script>
