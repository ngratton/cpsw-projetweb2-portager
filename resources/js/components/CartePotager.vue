<template>
  
    <div>
       
                <div class="card" id="cardPotager">
                    <img src="/images/Plants_placeholders/GRAFTED-VEG.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nom du plant</h5>
                        <button type="button" class="btn btn-primary" style="background-color: #9FCC3B;">Voir le plant</button>
                        <button type="button" class="btn btn-secondary" style="background-color: #FFDD00; color: #332E0A;">Offrir un échange</button>
                    </div>
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