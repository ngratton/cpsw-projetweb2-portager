<template>
<form action="/api/potager/new/" @submit.prevent="envoiPotager" enctype="multipart/form-data">
<div>
    <div class="container-fluid" id="colHeaderProfil">
            <div class="col-2">
                <img id="logo" src="/images/portager_noir.svg">
            </div>
            <div class="col-6 offset-3">
                <img id="barreProgression" src="/images/BarreProfilPotager.PNG">
            </div>
    </div>
    <div class="container-fluid" id="profilPotager">
        <div class="container-fluid" id="profilTitre">
            <div class="row align-items-center" id="profilPotagerTitre">
                <div class="col-3">
                    <h3>Créer votre potager</h3>
                </div>
                <div class="col-2 offset-3" id="plusTard">
                    <a href="#"><p>Compléter plus tard</p></a>
                </div>
                <div class="col-2 offset-1">
                    <button type="submit" class="btn btn-primary">Passez à l'étape suivante</button><br>
                </div>
            </div>
        </div>
        <div class="row" id="creationPotager">
            <div class="col-4">
                <form>
                    <div class="form-row">
                        <div class="col">
                            <h6>Indiquez-nous où se trouve votre potager</h6><br>
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" v-model="address_1" aria-describedby="emailHelp"><br>
                            <input type="text" class="form-control" id="address_2" name="address_2" v-model="address_2" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mt-4">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="city" name="city" v-model="city" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="form-row" id="pays">
                        <div class="col-md-5 mt-4">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="prov" name="prov" v-model="prov" aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-5 mt-4">
                            <label for="pays">Pays</label>
                            <input type="text" class="form-control" id="country" name="country" v-model="country" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="form-row" id="trouver">
                        <div class="col-md-5 mt-4">
                            <label for="codePostal">Code postal</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" v-model="postal_code" aria-describedby="emailHelp" style="width: 160px;">
                        </div>
                        <div class="col-md-5 mt-4">
                            <span class="btn btn-primary btn-file mt-4">
                                Trouver<input type="file">
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3 ml-5" id="profilPotagerImages">
                <h6>Ajouter des photos de votre potager</h6>
                <p style="font-size:12px;">Téléverser jusqu'à {{ X }} photos; au moins une est requise.</p>
                <img src="/images/potager_pardefault_100px.png">
                <img src="/images/potager_pardefault_100px.png">
                <img src="/images/potager_pardefault_100px.png">
                <img src="/images/potager_pardefault_100px.png">
                <img src="/images/potager_pardefault_100px.png">
                <img src="/images/potager_pardefault_100px.png">
                <span class="btn btn-primary btn-file mr-4 mt-3">
                    Téléverser une photo<input type="file" id="photo_path" name="photo_path" ref="file" v-on:change="handleFileUpload()">
                </span>
            </div>
            <div class="col-3 offset-1" id="etiquettesPotager">
                <h6 class="ml-5">Quel type de potager est-ce ?</h6>
                <p class="ml-5">Cochez tous ceux qui s'appliquent.</p>
                <table width="100%" id="etiquetteProfilJardinier">
                    <tr>
                    <td>
                    <ul>
                        <li v-for="(etiquette1, index) in etiquettes1" @click="toggleClass" :class="{ selected: selected }" :key="index">{{ etiquette1 }}</li>
                    </ul>
                    </td>
                    <td>
                    <ul>
                        <li v-for="(etiquette2, index) in etiquettes2" @click="toggleClass" :class="{ selected: selected }" :key="index">{{ etiquette2 }}</li>
                    </ul>
                    </td>
                    </tr>
                </table>
            </div>
         </div>
    </div>
</div>
</form>
</template>

<script>
    import Axios from "axios";
    export default {
        name: 'FormulairePotager', 
        data() {
            return {
                address_1: '',
                address_2: '',
                city: '',
                prov: '',
                country: '',
                postal_code: '',
                photo_path: null,
                tags_potagers: [],
                etiquettes1:["Biologique","Intérieur","En pot","Communautaire","En terre"],
                etiquettes2:["Conventionel","En serre","En bacs","Urbain","Monoculture"],
                selected: false,
                X: 6,
            }
        }, //end data
        props: {

        },
        components: {

        },
        mounted() {
            let file = document.querySelector('#photo')
        },
        methods: {
            envoiPotager() {
                var photo = this.$refs.file.files[0]
                let formData = new FormData();
                const options = {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
                formData.append('address_1', this.address_1);
                formData.append('address_2', this.address_2);
                formData.append('city', this.city);
                formData.append('prov', this.prov);
                formData.append('country', this.country);
                formData.append('postal_code', this.postal_code);
                formData.append('photo_path', photo_path);
                formData.append('tags_potagers', this.tags_potagers);
                axios.post('/api/potager/new/', formData, options).then((data) => {
                    this.mettreAJour();
                }).catch(() => {
                    console.log('FAILURE!!');
                });
            },

            handleFileUpload(){
                this.file = this.$refs.file.files[0];
            },

            toggleClass(e) {
                e.target.classList.toggle("selected")

                if (e.target.classList.contains("selected")) {
                    this.tags_potagers.push(e.target.innerHTML)
                } else {
                    this.tags_potagers.pop(e.target.innerHTML)
                }
            console.log(this.tags_potagers)
            },
        }, //end method
    }
</script>