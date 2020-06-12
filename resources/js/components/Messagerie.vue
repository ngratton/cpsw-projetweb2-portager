<template>
  
    <div>  
      <div class="container" id="messagerie">
        <div class="row">
          <div class="col-3" id="liste-conversations">
            <h2>Conversations</h2>
            <div id="conversations" v-for="convo in lesUsers" :key="convo.id">
              <h4 v-on:click="toggle(convo)">{{ convo.name }}</h4> <br>
            </div>
            </div>
            <div class="col-9" id="conversation-active">
            <h2>{{ titreConvo }}</h2>
            <div id="conversation">
              <div class="message" v-for="item in message" :key="item.id">
                <h3 id="nom-utilisateur"> {{ item.nomUtilisateur }}</h3>
                 <p id="contenu">{{ item.contenu }}</p>
              </div>
            </div>
            <div id="redaction">
            <form action="./api/messages/create" method="POST" @submit.prevent="envoiMessage()">
              <input id="text-container" type="text" name="message" v-model="contenu" placeholder="Rédigez un message..">
              <button type="submit" value="Envoyer un message" class="btn btn-success">Envoyer</button> 
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>

</template>

<script>
    import Axios from "axios";
    export default {
        name: 'Messagerie', 
        data() {
            return {  
               message: '',
               userId: 1,
               username: '',
               contenu: '',
               toUserId: '',
               fromUserId: 1,
               user: '',
               lesUsers: '',
               titreConvo: '',
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

          // Selectionne un utilisateur selon son id
             Axios.get("/api/users/" + this.userId).then(response => {
              this.user = response.data
              this.username = this.user.name
              console.log(this.username)
            });
        
          // Selectionne tous les utilisateurs
            Axios.get("/api/users").then(response => {
              this.lesUsers = response.data
             
              console.log(this.lesUsers)
            });

          // Selectionne les messages 
           this.listeMessages()
        
          },

           toggle(convo) {
              this.titreConvo = convo.name
              this.toUserId = convo.id
              console.log('vous avez choisi ' + convo.name, convo.id)
            },
           envoiMessage() {

             Axios.post("/api/messages/store", {
                contenu: this.contenu,
                from_id: this.fromUserId,
                to_id: this.toUserId,
               
              })

              this.listeMessages()
            },  
            
            listeMessages() {
               Axios.get("/api/messages").then(response => {
              this.message = response.data
              console.log(this.message)
            });
            },
        },
    }
</script>

<style lang="css">
#messagerie {
  
  border: solid yellowgreen 2px;
}

#liste-conversations{
  background-color: rgb(216, 223, 206);
}

#conversation-active{
  background-color: rgb(255, 255, 255);
}

#conversation {
  background-color: rgb(250, 250, 250);
}

#text-container {
  width: 100%;
}



</style>