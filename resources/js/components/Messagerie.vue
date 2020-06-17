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
                  <div class="col-md-auto" v-if="item.from_id == userId" id="un-message-from">
                    <div class="row">
                      <div class="col-2">
                        <p class="nom-utilisateur">{{ username }}</p>
                      </div>
                      <div class="col-2">
                        <p class="date">{{ transformerHeure(item.created_at) }}</p>
                      </div>                    
                    </div>  
                    <div class="col-md-auto">
                      <p class="contenu">{{ item.contenu }}</p><br>
                    </div>                   
                  
                  <p class="date">{{ transformerDate(item.created_at) }}</p>
                  </div> <br>
                  <div class="col-4" v-if="item.from_id != userId" id="un-message-to">
                    <div class="row">
                      <div class="col-2">
                        <p class="nom-utilisateur">{{ toUserName }}</p>
                      </div>
                      <div class="col-2">
                        <p class="date">{{ transformerHeure(item.created_at) }}</p>
                      </div>                    
                    </div>                     
                  <p class="contenu">{{ item.contenu }}</p><br>
                  <p class="date">{{ transformerDate(item.created_at) }}</p>
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

            

        
          // Selectionne tous les utilisateurs(temporaire)
            Axios.get("/api/users").then(response => {
              this.lesUsers = response.data
             
              console.log(this.lesUsers)
            });          
        
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
            
            // Selectionne les messages selon les id des utilisateurs dans la conversation
            listeMessages() {
               Axios.get("/api/messages/" + this.userId + "/" + this.toUserId).then(response => {              
                   this.message = response.data
                   this.messageDate = response.data.created_at
                console.log(this.message)              
                
            });
            },
              // Transorme le format de l'heure d'envoi d'un message
            transformerDate(temps) {
              return temps.substring(0,10)
            },

             transformerHeure(temps) {
              return temps.substring(11,16)
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
  border-bottom: solid yellowgreen 0.5px;
}

#liste-conversations{
  background-color: rgb(242, 245, 238);
  width: 100%;
}

#conversation-active{
  background-color: rgb(255, 255, 255);
}

#conversation {
  background-color: rgb(250, 250, 250);
}

#liste-conversations :hover {
  background-color: rgb(227, 243, 208);
}

#text-container {
  margin: 0px;
  width: 100%;
}

#un-message-from{
  color: rgb(10, 6, 6);
  border-radius: 10px;
  background-color: rgb(194, 235, 129);
  padding: 4px;
  margin-top: 5px;
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