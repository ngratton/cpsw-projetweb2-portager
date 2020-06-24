<template>
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
                        <div class="col">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="form-row" id="pays">
                        <div class="col-md-5">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-5">
                            <label for="pays">Pays</label>
                            <input type="text" class="form-control" id="pays" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="form-row" id="trouver">
                        <div class="col-md-5">
                            <label for="codePostal">Code postal</label>
                            <input type="text" class="form-control" id="codePostal" aria-describedby="emailHelp" style="width: 160px;">
                        </div>
                        <div class="col-md-5">
                            <input type="file" id="photo" class="btn btn-primary mt-4">Trouver</input>
                        </div>
                    </div>
                </form>
            </div>

</template>