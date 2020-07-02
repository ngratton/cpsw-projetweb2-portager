<template>

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
                    <button type="button" class="btn btn-primary">Passez à l'étape suivante</button><br>
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
                            <input type="text" class="form-control" id="adresse" aria-describedby="emailHelp"><br>
                            <input type="text" class="form-control" id="adresse" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mt-4">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="form-row" id="pays">
                        <div class="col-md-5 mt-4">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-5 mt-4">
                            <label for="pays">Pays</label>
                            <input type="text" class="form-control" id="pays" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="form-row" id="trouver">
                        <div class="col-md-5 mt-4">
                            <label for="codePostal">Code postal</label>
                            <input type="text" class="form-control" id="codePostal" aria-describedby="emailHelp" style="width: 160px;">
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
                    Téléverser une photo<input type="file">
                </span>
            </div>
            <div class="col-3 offset-1" id="etiquettesPotager">
                <h6 class="ml-5">Quel type de potager est-ce ?</h6>
                <p class="ml-5">Cochez tous ceux qui s'appliquent.</p>
                <table width="100%" id="etiquetteProfilJardinier">
                    <tr>
                    <td>
                    <ul>
                        <li>Biologique</li>
                        <li>Intérieur</li>
                        <li>En pot</li>
                        <li>Communautaire</li>
                        <li>En terre</li>
                    </ul>
                    </td>
                        <td><ul>
                        <li>Conventionel</li>
                        <li>En serre</li>
                        <li>En bacs</li>
                        <li>Urbain</li>
                        <li>Monoculture</li>
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