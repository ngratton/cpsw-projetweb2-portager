<template>
<form action="/api/profile/new/{userID}" @submit.prevent="envoiJardinier" enctype="multipart/form-data">
    <div class="container-fluid" id="colHeaderProfil">
            <div class="col-2">
                <img id="logo" src="/images/portager_noir.svg">
            </div>
            <div class="col-6 offset-3">
                <img id="barreProgression" src="/images/BarreProfil.PNG">
            </div>
    </div>
    <div class="container-fluid" id="profil">
        <div class="container-fluid" id="profilTitre">
            <div class="row align-items-center" id="profilJardinierTitre">
                <div class="col-5" id="completer">
                    <h3>Complétez votre profil de jardinier</h3>
                </div>
                <div class="col-2 offset-1" id="plusTard">
                    <a href="#"><p>Compléter plus tard</p></a>
                </div>
                <div class="col-2 offset-1" id="suivant">
                    <button type="submit" class="btn btn-primary">Passez à l'étape suivante</button><br>
                </div>
            </div>
        </div>
        <div class="row" id="creationProfil">
            <div class="col-4">
                <div class="form-group">
                    <h4>Ajoutez une photo de profil</h4><br>
                    <img :src="photo_mini">
                    <span class="btn btn-primary btn-file mt-4">
                        Téléverser une photo<input type="file" id="photo" name="photo" ref="file" v-on:change="handleFileUpload()">
                    </span>
                </div>
                <div class="form-group">
                    <h4>Depuis quelle année jardinez-vous?</h4>
                    <input type="text" class="form-control" id="jardine_depuis" name="jardine_depuis" v-model="jardine_depuis" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-3">
                <h4>Parlez-nous de vous (cette description s'affichera sur votre profil public)</h4>
                <textarea class="form-control" id="bio" name="bio" v-model="bio" rows="5" cols="50"></textarea>
            </div>
            <div class="col-3 offset-1" id="etiquetteJardin">
                <h4>Quel type de jardinier êtes-vous ?</h4>
                <p style="font-size:12px;">Cochez tous ceux qui s'appliquent.</p>
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
</form>
</template>

<script>
    import Axios from "axios";
    export default {
        name: 'FormulaireJardinier', 
        data() {
            return {
                photo: null,
                photo_mini: "/images/profil_pardefault_100px.png",
                jardine_depuis: '',
                bio: '',
                etiquettes1:["Amateur","Biologique","Conventionnel"],
                etiquettes2:["Autosuffisant","Communautaire","Écologique"],
                selected: false,
                tags_jardiniers: [],
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
            envoiJardinier() {
                var photo = this.$refs.file.files[0]
                let formData = new FormData();
                const options = {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
                formData.append('photo', photo);
                formData.append('jardine_depuis', this.jardine_depuis);
                formData.append('bio', this.bio);
                formData.append('tags_jardiniers', this.tags_jardiniers);
                axios.post('/api/profile/new/1', formData, options).then((data) => {
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
                    this.tags_jardiniers.push(e.target.innerHTML)
                } else {
                    this.tags_jardiniers.pop(e.target.innerHTML)
                }
            console.log(this.tags_jardiniers)
            },
        }, //end method
    }
</script>