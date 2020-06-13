<template>
    <div>
        <Navigation></Navigation>
        <div class="container-fluid" id="banner">
            <div class="container">
                <div class="row"> <!--banner-->
                    <div class="col">
                        <h1>Nam urna erat,<br>tempor at auctor.</h1>
                        <router-link :to="{ name: 'Inscription' }">
                            <button type="button" class="btn btn-primary">S'enregistrer</button><br>
                        </router-link>
                        <router-link :to="{ name: 'Connexion' }">
                            <button type="button" class="btn btn-secondary">Se connecter</button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container" id="search"> <!-- recherche -->
                <div class="row align-items-center">
                    <div class="col">
                        <div class="form-group form-check-inline">
                            <input class="form-control form-control-lg" type="text" placeholder="Recherche...">
                            <button type="button" class="btn btn-secondary">Chercher</button>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="form-check form-check-inline">
                                    <p>Rechercher par
                                        <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Plants</label>
                                        <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox1">Villes</label>
                                        <input class="form-check-input" type="radio" id="inlineCheckbox3" value="option3">
                                        <label class="form-check-label" for="inlineCheckbox1">Étiquettes</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="form-check form-check-inline">
                                    <p>Ou</p>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="form-check form-check-inline">
                                    <p>Naviguez par <a href="#">Catégories</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="content">
            <div class="row" id="nouveauxPlants"> <!-- Nouveaux plants -->
                <div class="col">
                    <h3>Nouveaux plans près de chez vous</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="/images/Plants_placeholders/green-bean.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nom du plant</h5>
                            <p class="card-text">Ville</p>
                            <p class="card-text">Jardinier Note Jardinier</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col offset-2">
                    <img class="pubAccueil" src="/images/ad_768-90.png">
                </div>
            </div>
            <div class="row" id="cotePlants"> <!-- Plants les mieux côtés -->
                <div class="col">
                    <h3>Potagers les mieux côtés</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="/images/Plants_placeholders/green-bean.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Jardinier</h5>
                            <p class="card-text">Ville</p>
                            <p class="card-text" style="text-align: right;">Note Jardinier</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="merch"> <!-- Marchandise -->
                <div class="col-lg">
                    <h3>Montrez fièrement votre sens du partage !</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="/images/Plants_placeholders/green-bean.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nom produit</h5>
                            <p class="card-text" style="text-align: right;">Prix</p>
                            <button type="button" class="btn btn-secondary">Acheter</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="populaire"> <!-- Plants Populaire -->
                <div class="col">
                    <h3>Plants les plus populaires</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="/images/Plants_placeholders/green-bean.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Jardinier</h5>
                            <p class="card-text">Ville</p>
                            <p class="card-text" style="text-align: right;">Note Jardinier</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="plus">
                <div class="col offset-5">
                    <button type="button" class="btn btn-primary">En voir plus...</button>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="footer"> <!-- footer -->
            <div class="container">
                <div class="row">
                    <div class="col offset-9">
                        <img src="/images/_LOGOS/portager_blanc.svg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Navigation from './components/Navigation'

    export default {
        name: 'Accueil',
        data() {
            return {
                data: 0,
            };

        },
        props: {

        },
        components: {
            Navigation,
        },
        mounted() {

        },
        methods: {

        },
    }
</script>
