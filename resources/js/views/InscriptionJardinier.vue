<template>

<div>
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
                    <h3>Complétez votre profil de jardinier, {{ prenom }}</h3>
                </div>
                <div class="col-2 offset-1" id="plusTard">
                    <a href="#"><p>Compléter plus tard</p></a>
                </div>
                <div class="col-4" id="suivant">
                    <button type="button" class="btn btn-primary">Passez à l'étape suivante</button><br>
                </div>
            </div>
        </div>
        <div class="row" id="creationProfil">
            <div class="col-4">
                <form>
                    <div class="form-group">
                        <h4>Ajoutez une photo de profil</h4><br>
                        <img src="/images/profil_pardefault_100px.png">
                        <span class="btn btn-primary btn-file">
                            Téléverser une photo<input type="file">
                         </span>
                    </div>
                    <div class="form-group">
                        <h4>Depuis quelle année jardinez-vous?</h4>
                        <input type="text" class="form-control" id="annee" aria-describedby="emailHelp">
                    </div>
                </form>
            </div>
            <div class="col-3">
                <h4>Parlez-nous de vous (cette description s'affichera sur votre profil public)</h4>
                <textarea class="form-control" id="texteProfil" rows="5" cols="50"></textarea>
            </div>
            <div class="col-3 offset-1" id="etiquetteJardin">
                <h4>Quel type de jardinier êtes-vous ?</h4>
                <p style="font-size:12px;">Cochez tous ceux qui s'appliquent.</p>
                <table width="100%" id="etiquetteProfilJardinier">
                    <tr>
                    <td>
                    <ul>
                        <li>Amateur</li>
                        <li>Biologique</li>
                        <li>Conventionnel</li>
                    </ul>
                    </td>
                        <td><ul>
                        <li>Autosuffisant</li>
                        <li>Communautaire</li>
                        <li>Écologique</li>
                    </ul>
                    </td>
                    </tr>
                </table>
            </div>
         </div>
    </div>
</div>

</template>


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

.form-group span {
    width: auto;
    position: absolute;
    margin-top: 28px;
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