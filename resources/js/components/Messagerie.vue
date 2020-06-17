<template>
  
    <div>  
      <div class="container" id="messagerie">
        <div class="row" id="haut-messagerie">
          <div class="col-3">
            <h3>Recents</h3>
          </div>
          <div class="col-9">
            <h3>{{ toUserName }}</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-3" id="liste-conversations">           
            <div v-on:click="toggle(convo)" class="container" id="conversations" v-for="convo in lesUsers" :key="convo.id">
              <h4>{{ convo.first_name }}</h4> <br>
            </div>
            </div>
            <div class="col-9" id="conversation-active">
              <div class="row justify-content-between">
              <div id="conversation">
                <div class="message" v-for="item in message" :key="item.id">
                  <div class="col-16" v-if="item.from_id == userId" id="un-message-from">
                      <h3 class="nom-utilisateur"> {{ username }}</h3>
                  <p class="contenu">{{ item.contenu }}</p>
                  <p class="temps">{{ transformerDate(item.created_at) }}</p>
                  </div> <br>
                  <div class="col-16" v-if="item.from_id != userId" id="un-message-to">
                      <h3 class="nom-utilisateur">{{ toUserName }}</h3>
                        <p class="contenu">{{ item.contenu }}</p>
                        <p class="temps">{{ item.created_at }}</p>
                  </div> <br>           
                </div>
              </div>
            </div>
            <div id="redaction" v-bind:class="{ active: isActive }">
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
               userId: '1',         //Temporaire, cette variable contiendra eventuellement le id de la personne connectée
               username: '',
               contenu: '',
               toUserId: '',
               user: '',
               lesUsers: '',
               toUserName: '',
               interlocuteurId: '',
               isActive: true,
               
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
             this.isActive = false
              this.toUserName = convo.first_name + ' ' + convo.last_name
              this.toUserId = convo.id
              console.log('vous avez choisi ' + convo.first_name + ' ' + convo.last_name, convo.id)


              this.listeMessages()

              
            },



           envoiMessage() {

             Axios.post("/api/messages/store", {
                contenu: this.contenu,
                from_id: this.userId,
                to_id: this.toUserId,
               
              })
              this.listeMessages()
            },  
            
            listeMessages() {
               Axios.get("/api/messages/" + this.userId + "/" + this.toUserId).then(response => {              
                   this.message = response.data
                   this.messageDate = response.data.created_at
                console.log(this.message)              
                
            });
            },
              // Transorme le format de l'heure d'envoi d'un message
            transformerDate(temps) {
              // temps.slice(11,11)
              return temps.substring(0,16)
            }
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
  border-top: solid yellowgreen 0.5px;
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

#un-message-from{
  color: rgb(10, 6, 6);
  border-radius: 10px;
  background-color: rgb(194, 235, 129);
  padding: 10px;
  margin: 5px;
}

#un-message-to {
  color: rgb(10, 6, 6);
  border-radius: 10px;
  background-color: rgb(127, 189, 194);
  padding: 10px;
  margin: 5px;
}

.btn-success {
  margin: 5px;
}

.active {
  display: none;
}



</style>