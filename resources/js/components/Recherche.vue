<template>

    <div>
            <div class="container" id="search"> <!-- recherche -->
                <div class="row align-items-center">
                    <form action="/recherche" class="col" method="get">
                        <div class="form-group form-check-inline recheche-box">
                            <input class="form-control form-control-lg" type="text" placeholder="Recherche...">
                            <button type="submit" class="btn btn-secondary">Chercher</button>
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

</template>

<script>
    export default {
        name: 'Recherche',
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

<style lang="scss">
    .recheche-box {
        width: 80%;
    }
</style>
