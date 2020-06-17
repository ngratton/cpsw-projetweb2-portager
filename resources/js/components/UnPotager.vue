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
    </div>

</template>

<script>
    export default {
        name: 'UnPotager', 
        data() {
            return {  
                data: 0,
            };
        
        },
        props: {

        },
        components: {

        },
        mounted() {

        },
        methods: {

        },
    }
</script>