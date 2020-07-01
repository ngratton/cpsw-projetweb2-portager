<template lang="fr">
    <div class="container-fluid" style="height: 100vh;">

        <div class="row">
            <div class="col-md d-none d-md-flex justify-content-center align-items-center" id="imageGauche">
                <img src="/images/404.svg" alt="Oops... Erreur 404 !" id="img-404">
            </div>
            <div class="col-md d-flex justify-content-center align-items-center" id="connexion">

                <div class="d-flex flex-column" id="text-404">
                    <h1>Oops... on a oublié d'arroser cette page.</h1>
                    <span class="mt-2">Erreur 404 - Page non trouvée</span>

                    <a class="mt-5" @click="$router.go(-1)">< Retour</a>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    #img-404 {
        width: 50%;
        height: auto;
    }

    #text-404 {
        width: 75%;
    }

    h1 {
        font-size: 3em;
        color: #A1CC14;
    }

    a {
        color: #A1CC14;
        text-decoration: underline;
        cursor: pointer;
    }
</style>
