<template>
<div class="row" id="creationProfil">
    <div class="col-4">
        <form>
            <div class="form-group">
                <h4>Ajoutez une photo de profil</h4><br>
                <img src="/images/profil_pardefault_100px.png">
                <span class="btn btn-primary btn-file mt-4">
                    Téléverser une photo<input type="file" name="photo">
                </span>
            </div>
            <div class="form-group">
                <h4>Depuis quelle année jardinez-vous?</h4>
                <input type="text" class="form-control" id="jardine_depuise" name="jardine_depuis" aria-describedby="emailHelp"> {{ jardine_depuis }} </input>
            </div>
        </form>
    </div>
    <div class="col-3">
        <h4>Parlez-nous de vous (cette description s'affichera sur votre profil public)</h4>
        <textarea class="form-control" id="texteProfil" rows="5" cols="50" name="bio">{{ bio }}</textarea>
    </div>
    <div class="col-3 offset-1" id="etiquetteJardin">
        <h4>Quel type de jardinier êtes-vous ?</h4>
        <p style="font-size:12px;">Cochez tous ceux qui s'appliquent.</p>
        <table width="100%" id="etiquetteProfilJardinier">
            <tr>
            <td>
            <ul v-for="etiquette1 in etiquettes1">
                <li>{{ etiquette1 }}</li>
            </ul>
            </td>
            <td>
            <ul v-for="etiquette2 in etiquettes2">
                <li>{{ etiquette2 }}</li>
            </ul>
            </td>
            </tr>
        </table>
    </div>
</div>
</template>

<script>
    export default {
        name: 'FormulaireJardinier', 
        data() {
            return {  
                photo: [],
                jardine_depuis: '',
                bio: '',
                etiquettes1:["Amateur","Biologique","Conventionnel"],
                etiquettes2:["Autosuffisant","Communautaire","Écologique"],
            };
        
        },
        props: {

        },
        components: {

        },
        mounted() {

        },
        methods: {
            ajoutPhoto() {
                Axios.put("/api/profiles", {
                    photo: this.photo,
                })
            },

            ajoutAnneeJardinage() {
                Axios.put("/api/profiles", {
                    jardine_depuis: this.jardine_depuis
                })
            },

            ajoutBio() {
                Axios.put("/api/profiles", {
                    bio: this.bio
                })
            },
        },
    }
</script>