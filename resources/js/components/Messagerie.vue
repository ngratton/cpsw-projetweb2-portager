<template>
  
    <div>  
      <div class="container" id="messagerie">
        <div class="row" id="haut-messagerie">
          <div class="col-3">
            <h3>Recents</h3>
          </div>
          <div class="col-9">
            <h3>{{ titreConvo }}</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-3" id="liste-conversations">           
            <div class="container" id="conversations" v-for="convo in lesUsers" :key="convo.id">
              <h4 v-on:click="toggle(convo)">{{ convo.name }}</h4> <br>
            </div>
            </div>
            <div class="col-9" id="conversation-active">
            <div id="conversation">
              <div class="message" v-for="item in message" :key="item.id">
                <div v-if="item.id == userId" id="un-message-from">
                    <h3 id="nom-utilisateur"> </h3>
                 <p id="contenu">{{ item.contenu }}</p>
                 <p id="contenu">{{ item.created_at }}</p>
                </div>

                <div v-if="item.id != userId" id="un-message-to">
                     <h3 id="nom-utilisateur"> </h3>
                      <p id="contenu">{{ item.contenu }}</p>
                      <p id="contenu">{{ item.created_at }}</p>
                </div>
              
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
               userId: 1,         //Temporaire, cette variable contiendra eventuellement le id de la personne connectée
               username: '',
               contenu: '',
               toUserId: '',
               user: '',
               lesUsers: '',
               titreConvo: '',
               interlocuteurId: '',
               messageDate: '',
               
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
           
        
          },

           toggle(convo) {
              this.titreConvo = convo.name
              this.toUserId = convo.id
              console.log('vous avez choisi ' + convo.name, convo.id)


              this.listeMessages()


              // Selectionne l'interlocuteur selon son id
             Axios.get("/api/users/" + this.toUserId).then(response => {
              this.interlocuteur = response.data
              this.interlocuteurName = this.interlocuteur.name
              console.log(this.interlocuteurName)
            });
              
            },



           envoiMessage() {

             Axios.post("/api/messages/store", {
                contenu: this.contenu,
                from_id: this.userId,
                to_id: this.toUserId,
               
              })

             
            },  
            
            listeMessages() {
               Axios.get("/api/messages/" + this.userId + "/" + this.toUserId).then(response => {              
                   this.message = response.data
                   this.messageDate = response.data.created_at
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

#haut-messagerie {
  background-color: rgb(197, 201, 152);
}

#conversations {
  width: 100%;
  border: solid yellowgreen 0.5px;
}

#liste-conversations{
  background-color: rgb(216, 223, 206);
  width: 100%;
}

#conversation-active{
  background-color: rgb(255, 255, 255);
}

#conversation {
  background-color: rgb(250, 250, 250);
}

#liste-conversations :hover {
  background-color: rgb(158, 179, 134);
}

#text-container {
  margin: 0px;
  width: 100%;
}



</style>