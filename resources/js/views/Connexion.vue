<template>
    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <div class="col-md d-none d-md-flex" id="imageGauche">
                <div class="grosseImageConnexion"></div>
            </div>
            <div class="col-md d-flex justify-content-center align-items-center" id="connexion">

                <div>
                    <div class="logoConnection">
                        <img src="/images/portager_noir.svg" alt="Portager" id="logo">
                    </div>
                    <div class="formConnection">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Courriel</label>
                                <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" v-if="errors.email">
                                    {{ errors.email[0] }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Mot de passe</label>
                                <input type="password" v-model="form.password"  class="form-control" id="exampleInputPassword1">
                                <span class="text-danger" v-if="errors.password">
                                    {{ errors.password[0] }}
                                </span>
                            </div>
                            <button type="submit" @click.prevent="connexion" class="btn btn-block btn-primary">CONNEXION</button>
                            <router-link :to="{ name: 'Inscription' }">
                                <p class="mt-3">Pas de compte? Inscrivez-vous !</p>
                            </router-link>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import User from '../api/User'

    export default {
        props: [
            'whereto'
        ],
        data() {
            return {
                form: {
                    email: 'user@portager.com',
                    password: 'portager',
                },
                errors: [],
            }
        }, //data
        mounted() {
            //
        }, //mounted
        methods: {
            connexion() {
                User.connexion(this.form)
                    .then(response => {
                        axios.get('api/user').then(user => {
                            this.$store.dispatch('logsIn', user.data)
                            this.redirectionUtilisateur(user.data.user_role)
                        })
                    })
                    .catch(error => {
                        if(error.response.status === 422) {
                            this.errors = error.response.data.errors
                        }
                    })
            },
            deconnexion() {
                User.deconnexion()
                    .then(() => {
                        this.$store.dispatch('logsOut')
                        this.$router.go()
                    })
            },
            redirectionUtilisateur(role) {
                let url =  new URL(window.location)
                let baseURL = url.protocol + '//' + url.host

                if(role == 'Administrateur') { window.location.href = baseURL + '/administration' }
                if(role == 'Commanditaire') { window.location.href = baseURL + '/commanditaire' }
                else {
                    if(this.whereto) {
                        this.$router.push(this.whereto)
                    } else {
                        this.$router.push({name: 'Accueil'})
                    }
                }
            }
        }, // methods
    }
</script>

<style lang="scss">
#imageGauche,
#connexion {
    margin: 0;
    padding: 0;
    height: 100vh;
}

.imgConnection {
    width: 100%;
    // height: 100%;
}

.grosseImageConnexion {
    height: 100%;
    width: 100%;
    background-image: url('/images/hero/girl-tomatoes-shutterstock_440076301_0.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

#connexion {

    .logoConnection {
        text-align: center;
    }

    #logo {
        max-height: 70px;
        margin: 0 auto;
        margin-bottom: 30px;
    }
}

.formConnection {
    max-width: 375px;
    padding: 30px;
    background-color: white;
    box-shadow: 0px 5px 10px #00000029;
    border-radius: 16px;

    .form-group {
        width: 100%;

        input {
            width: 100%;

            &:focus {
                border: 1px solid #9FCC3B;
                outline: none;
                box-shadow: none;
            }
        }
    }

    label {
        font-size: 12px;
        color: #717C89;
    }

    a {
        text-align: center;
        color: #717C89;
    }
}

</style>
