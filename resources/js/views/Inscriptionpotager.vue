<template>

<div>
    <FormulairePotager
        :user_id="user_id"
    ></FormulairePotager>
</div>

</template>

<script>
    import FormulairePotager from '../components/FormulairePotager';
    export default {
        name: 'InscriptionPotager',
        data() {
            return {
                user_id: null,
            };
        },
        components: {
            FormulairePotager
        },
        mounted() {
            this.user_id = this.$route.params.id
        },
    }
</script>


<style lang="scss">

body {
    background-color: #F7FDFF !important;
    margin: 0;
    padding: 0;
}

nav {
    width: 80%;
}

#colHeader {
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 100px;
}

.form-group {
    margin-top: 10px;
    margin-left: 20px;
    text-align: left;
}

#colHeaderProfil {
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 100px;
}

#colHeader img {
    width: 248.27px;
    height: 89.99px;
}

#logo {
    width: 248.27px;
    height: 89.99px;
    margin-left: 90px;
}

#barreProgression {
    float: right;
    width: 60%;
}

#profil {
    margin-top: 100px;
    text-align: center;
}

#profil h4 {
    font-family: Roboto Slab;
    color: #717C89;
    font-weight: bold;
}

#profil a {
    font-size: 10px;
    color: #717C89;
}

#profilTitre button {
    font-weight: bold;
    background-color: #FFDD00;
    color: #332E0A;
    border: none;
    margin-left: 5%;
}

#completer {
    left: -3%;
}

#suivant {
    left: -1%;
}

#plusTard {
    display: flex;
    left: 19%;
}

#plusTard a {
    padding-top: 5%;
}

#creationProfil {
    background-color: #FFFFFF;
    width: 85%;
    background: #FFFFFF 0% 0% no-repeat padding-box;
    box-shadow: 0px 5px 10px #00000029;
    margin-left: 100px;
    border-radius: 16px;
    opacity: 1;
    margin-top: 2%;
    padding: 20px 10px 100px 20px;
    text-align: left;
}

#creationProfil button {
    position: absolute;
    width: 200px;
    height: 50px;
    background: #9FCC3B 0% 0% no-repeat padding-box;
    color: #FFFFFF;
    box-shadow: 0px 3px 10px #00000029;
    border-radius: 6px;
    opacity: 1;
    border: none;
    margin-top: 25px;
}

#creationProfil img {
    margin-right: 20px;
    margin-bottom: 40px;
}

#creationProfil input {
    width: 300px;
}

#creationProfil h4 {
    color: #32373D;
    font-size: 16px;
    text-align: left;
    font: Regular 16px/23px Inter;
    letter-spacing: 0px;
    color: #32373D;
    opacity: 1;
}

#etiquetteJardin h4 {
    color: #32373D;
    font-weight: bold;
    font-size: 16px;
    margin-left: 42px;
    text-align: left;
}

#etiquetteJardin p {
    margin-left: 42px;
    font-size: 12px;
}

#etiquetteProfilJardinier ul {
    list-style-type: none;
}

#etiquetteProfilJardinier li {
    width: 100%;
    background-color: #CFFFB3;
    border-radius: 50px;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 20px;
    padding-right: 30px;
    padding-left: 30px;
}

#etiquetteProfilJardinier li:hover {
    background-color: #9FCC3B;
}

#profilPotager {
    margin-top: 100px;
    text-align: center;
}

#profilPotager h4 {
    font-family: Roboto Slab;
    color: #717C89;
}

#profilPotager a {
    font-size: 10px;
    color: #717C89;
}

#creationPotager {
    background-color: #FFFFFF;
    width: 85%;
    background: #FFFFFF 0% 0% no-repeat padding-box;
    box-shadow: 0px 5px 10px #00000029;
    margin-left: 100px;
    border-radius: 16px;
    opacity: 1;
    margin-top: 2%;
    padding: 20px 10px 100px 20px;
    text-align: left;
}

#creationPotager h6 {
    font-weight: bold;
    font-size: 16px;
}

#trouver input {
    width: 100px;
}

#trouver button {
    position: absolute;
    width: 160px;
    height: 50px;
    background: #9FCC3B 0% 0% no-repeat padding-box;
    color: #FFFFFF;
    box-shadow: 0px 3px 10px #00000029;
    border-radius: 6px;
    opacity: 1;
    border: none;
}

#etiquettesPotager h6 {
    color: #32373D;
    font-weight: bold;
    font-size: 16px;
    text-align: left;
}

#etiquettesPotager p {
    font-size: 12px;
}

#creationPotager input {
    width: 370px;
}

#pays input {
    width: 160px;
}

#profilPotagerImages img {
    margin-right: 15px;
    margin-bottom: 20px;
    margin-top: 10px;
}

#profilPotagerImages button {
    float: right;
    width: 200px;
    height: 50px;
    background: #9FCC3B 0% 0% no-repeat padding-box;
    color: #FFFFFF;
    box-shadow: 0px 3px 10px #00000029;
    border-radius: 6px;
    opacity: 1;
    border: none;
}

#trouver span {
    width: 80%;
    position: absolute;
    margin-top: 28px;
    color: white;
    background: #9FCC3B 0% 0% no-repeat padding-box;
    box-shadow: 0px 3px 10px #00000029;
    border-radius: 6px;
    opacity: 1;
    border: none;
}

#profilPotagerImages span {
    float: right;
    width: auto;
    color: white;
    background: #9FCC3B 0% 0% no-repeat padding-box;
    box-shadow: 0px 3px 10px #00000029;
    border-radius: 6px;
    opacity: 1;
    border: none;
}

.btn-file {
    position: relative;
    overflow: hidden;
    width: 200px;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    cursor: inherit;
    display: block;
}

</style>
