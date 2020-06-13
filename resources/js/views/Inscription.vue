<template>
    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <div class="col-md d-none d-md-flex" id="imageGauche">
                <div class="grosseImageInscription"></div>
            </div>
            <div class="col-md d-flex justify-content-center align-items-center" id="inscription">

                <div>
                    <div class="logoConnection">
                        <img  src="/images/portager_noir.svg" id="logo">
                    </div>
                    <div class="formInscription">
                        <form>
                            <div class="form-group">
                                <label for="first_name">Prénom</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="first_name"
                                    id="first_name"
                                    v-model="form.first_name">
                                    <span class="text-danger" v-if="errors.first_name">
                                        {{ errors.first_name[0] }}
                                    </span>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Nom de famille</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="last_name"
                                    id="last_name"
                                    v-model="form.last_name">
                                    <span class="text-danger" v-if="errors.last_name">
                                        {{ errors.last_name[0] }}
                                    </span>
                            </div>
                            <div class="form-group">
                                <label for="email">Courriel</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    id="email"
                                    aria-describedby="emailHelp"
                                    v-model="form.email">
                                    <span class="text-danger" v-if="errors.email">
                                        {{ errors.email[0] }}
                                    </span>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    id="password"
                                    v-model="form.password">
                                    <span class="text-danger" v-if="errors.password">
                                        {{ errors.password[0] }}
                                    </span>
                            </div>
                            <button type="submit" class="btn btn-primary" @click.prevent="inscription">INSCRIPTION</button>
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

    data() {
        return {
            form: {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
            },
            errors: [],
        }
    }, // data

    mounted() {
        // let titreOg = document.title
        // document.title = 'Inscription | ' + titreOg
    }, // mounted

    methods: {
        inscription() {
            User.inscription(this.form)
                .then(()  => {
                    // Redirige à l'écran de Connexion
                    this.$router.push({ name: 'Connexion' })
                })
                .catch(error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                })
        }
    }, // methods
}
</script>

<style lang="scss">
    #imageGauche,
    #inscription {
        margin: 0;
        padding: 0;
        height: 100vh;
    }

    #inscription {


        .logoConnection {
            text-align: center;
        }

        #logo {
            max-height: 70px;
            margin: 0 auto;
            margin-bottom: 30px;
        }
    }

    .grosseImageInscription {
        height: 100%;
        width: 100%;
        background-image: url("/images/hero/gardener.jpg");
        background-repeat: no-repeat;
        background-position: 80%;
        background-size: cover;
    }

    .formInscription {
        width: 375px;
        padding: 30px 20px;
        background: white;
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

        button {
            width: 100%;
            font-weight: bold;
        }
    }
</style>
