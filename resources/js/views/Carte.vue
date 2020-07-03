<template>
    <div>

        <!-- Entete -->

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

       <!-- Map -->

        <h1 class="cartePotager">Carte des potagers</h1>

        <div id="mapid" style="width: 1100px; height: 480px; margin-left: 200px;"></div>
    
        </div>
</template>

<script>
    import Entete from '../components/Entete';
    import Recherche from '../components/Recherche';
    
    export default {
        name: 'Carte',
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
            this.maCarte()
        },

        methods: {

            maCarte() {

                window.onload = function() {
    
                console.log('Page Chargée!')
    
                var mymap = L.map('mapid').setView([52.476089, -71.825867], 6);
    
                var tileStreets = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1IjoibWlsYW5taWxhbm92aWMxNyIsImEiOiJja2I5dzFhajIwOXc2Mnlxa2s2cXJtZjJqIn0.WVAb9fHvVqoqxWogsnk4Ng'
                });
                
                tileStreets.addTo(mymap);
    
                var marker = L.marker([52.476089, -71.825867]).addTo(mymap);
                marker.bindPopup("Je suis un popUp");
                var marker = L.marker([55.476089, -71.825867]).addTo(mymap);
                marker.bindPopup("Je suis un popUp");
                var marker = L.marker([52.476089, -65.825867]).addTo(mymap);
                marker.bindPopup("Je suis un popUp");
                var marker = L.marker([46.2634, -74.7687]).addTo(mymap);
                marker.bindPopup("Je suis un autre popUp");
            }
            

            }
        },
        
        computed: {
           //
        }
    }
</script>


<style lang="scss">

.cartePotager {
    margin-left: 200px;
}

.imgEntete {
    width: 100%;
    height: 315px;
}

.recherche {
   margin-bottom: 50px;
}


</style>