
<template>
    <div>
         <div class="container" id="colHeader">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="col">
                <img src="/images/portager_noir.svg">
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="#">Plants</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Carte des potagers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Boutique</a>
                </li>
            </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid" id="bannerUser">
        <div class="container">
            <div class="row"> <!--banner-->
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
    <div class="container">
        <div class="row align-items-center" id="jardinier">
            <div class="col-2">
               <img :src="miniImg" alt="...">
            </div>
            <div class="col-10" id="jardinierDescription">
                <div>
                    <h2> {{ username }} </h2>
                    <p>Jardine depuis  {{ jardineDepuis }} </p>
                </div>
                <div class="etoile">
                    <p>Étoile vote</p>
                </div>
                <div class="btn-group-vertical">
                    <button type="button" class="btn btn-primary" style="background-color: #9BC53D; color: white; margin-bottom: 20px; border: none;">Évaluer ce jardinier</button>
                    <button type="button" class="btn btn-secondary" style="background-color: #FFDD00; color: #332E0A; border: none;">Contacter  jardinier </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9" id="jardinierBio">
                <h3>Biographie</h3>
                <p>{{ bio }}</p>
            </div>
            <div class="col-2 offset-1" id="etiquettes">
                <h3>Étiquettes</h3>
                <ul v-for="item in tags" :key="item.id">
                    <li>{{ item }}</li>                 
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col" id="adminTitre">
                <h3>Potager administré</h3>
            </div>
        </div>
        <div class="row">
            <div class="col" id="potagerAdministre">
                <p> #  plants de légumes</p>
                <p> #  plants de fruits</p>
                <p> #  plants de fines herbes</p>
                <button type="button" class="btn btn-primary">Voir le potager de  utilisateur </button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Plants le plus populaires</h3>
            </div>
        </div>
        <div class="row">
            <div class="card" id="cardUser">
                <img src="/images/Plants_placeholders/green-bean.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> Nom du plant </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col" id="evaluationTitre">
                <h3>Évaluation</h3>
            </div>
        </div>
        <div class="row">
            <div class="col" id="evaluations">
                <p> Autre jardinier </p>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis libero nihil nisi suscipit, soluta architecto ullam dolores eum recusandae sit reiciendis totam eligendi laborum nemo repudiandae vel, ducimus doloremque laudantium,soluta architecto ullam dolores eum recusandae sit reiciendis totam eligendi laborum nemo repudiandae vel, ducimus doloremque laudantium.</p>
            </div>
            <div class="col" id="evaluations">
                <p> Autre jardinier </p>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis libero nihil nisi suscipit, soluta architecto ullam dolores eum recusandae sit reiciendis totam eligendi laborum nemo repudiandae vel, ducimus doloremque laudantium.</p>
            </div>
            <div class="w-100"></div>
            <div class="col" id="evaluations">
                <p> Autre jardinier </p>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis libero nihil nisi suscipit, soluta architecto ullam dolores eum recusandae sit reiciendis totam eligendi laborum nemo repudiandae vel, ducimus doloremque laudantium.</p>
            </div>
            <div class="col" id="evaluations">
                <p> Autre jardinier </p>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis libero nihil nisi suscipit.</p>
            </div>
        </div>
        <div class="row" id="plus">
            <div class="col offset-5">
                <button type="button" class="btn btn-primary">Lire plus d'évaluations</button>
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
    import Axios from "axios";
    export default {
        name: 'ProfilUtilisateur', 
        data() {
            return {  
                data: 0,
                user: '',
                userId: 3, // temporairement, changer le id ici pour changer de profile de jardinier
                profile: '',
                username: '',
                jardineDepuis: '',
                bio: '',
                tags: '',
                miniImg: '',
            };
        
        },
        props: {

        },
        components: {

        },
        mounted() {
            this.getData()
        },
        methods: {
            getData() {

                // Get les informations sur le profil du jardinier selon le id

                Axios.get("/api/profile/" + this.userId).then(response => {
                    this.profile = response.data
                    this.jardineDepuis = this.profile.jardine_depuis
                    this.bio = this.profile.bio
                    this.tags = this.profile.tags_jardiniers
                    this.miniImg = './' + this.profile.photo_mini  // A revoir
                    console.log(this.profile)
                });

                // Get les informations sur le user lié jardinier selon le id

                 Axios.get("/api/users/" + this.userId).then(response => {
                    this.user = response.data[0]
                    this.username = this.user.first_name + ' ' + this.user.last_name
                    
                    console.log(this.user)
                });
            },

            
        },
    }
</script>
