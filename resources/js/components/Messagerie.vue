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
              <h4>{{ convo.first_name }} {{ convo.last_name }}</h4> <br>
            </div>
            </div>
            <div class="col-9" id="conversation-active" ref="messagesContainer">
              <div class="row justify-content-between">
              <div id="conversation">
                <div class="message" v-for="item in message" :key="item.id">
                  <div class="col-12 overflow-auto">
                  <div class="col-4" v-if="item.from_id == userId" id="un-message-from">
                    <div class="row justify-content-between">
                      <div class="col-6">
                        <p class="nom-utilisateur">{{ username }}</p>
                      </div>
                      <div class="col-6">
                        <p class="date">{{ transformerHeure(item.created_at) }}</p>
                      </div>                    
                    </div>  
                    <div class="col-md-auto">
                      <p class="contenu">{{ item.contenu }}</p><br>
                    </div>                   
                  
                  <p class="date">{{ transformerDate(item.created_at) }}</p>
                  </div> <br>
                  </div>
                  <div class="col-12 overflow-auto">
                  <div class="col-4" v-if="item.from_id != userId" id="un-message-to">
                    <div class="row justify-content-between">
                      <div class="col-6">
                        <p class="nom-utilisateur">{{ toUserFirstName }}</p>
                      </div>
                      <div class="col-6">
                        <p class="date">{{ transformerHeure(item.created_at) }}</p>
                      </div>                    
                    </div>                     
                  <p class="contenu">{{ item.contenu }}</p><br>
                  <p class="date">{{ transformerDate(item.created_at) }}</p>
                  </div> <br>  
                  </div>         
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
               userId: '',         
               username: '',
               contenu: '',
               toUserId: '',
               user: '',
               lesUsers: '',
               toUserName: '',
               isActive: true,
               toUserFirstName: '',            
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

            // Selectionne l'utilisateur connecte
             Axios.get("/api/users").then(response => {
              this.user = response.data
              this.username = this.user.first_name
              this.userId = response.data.id
              this.getLinkedUsers()
            });
        
          // Selectionne les utilisateurs ayant des messages avec l'utilisateur connecte
            Axios.get("/api/users/messages_avec/" + this.userId).then(response => {
              this.lesUsers = response.data
              this.test = this.lesUsers.first_name + ' ' + this.lesUsers.last_name       
            });     
            
          },

          // Lorsque l'utilisateur selectionne une conversation
           toggle(convo) {
             this.isActive = false
              this.toUserName = convo.first_name + ' ' + convo.last_name
              this.toUserFirstName = convo.first_name
              this.toUserId = convo.id
              console.log('vous avez choisi ' + convo.first_name + ' ' + convo.last_name, convo.id)

              this.listeMessages()
              console.log(this.message)
            },

          // Lorsque l'utilisateur envoi un message
           envoiMessage() {

             Axios.post("/api/messages/store", {
                contenu: this.contenu,
                from_id: this.userId,
                to_id: this.toUserId,
               
              }).then(response => {              
                  this.listeMessages()  
            }); 
             this.contenu = ""                                      
            },  
            
            // Selectionne les messages selon les id des utilisateurs dans la conversation
            listeMessages() {
               Axios.get("/api/messages/" + this.userId + "/" + this.toUserId).then(response => {              
                   this.message = response.data
                   this.$nextTick(() => {
                      this.scrollToEnd()
                   })
              });          
            },

            // Transorme le format de l'heure d'envoi d'un message
            transformerDate(temps) {
              return temps.substring(0,10)
            },

             transformerHeure(temps) {
              return temps.substring(11,16)
            },

            // Selectionne les utilisateurs avec qui l'utilisateur connecte a des messages
             getLinkedUsers() {
             Axios.get("/api/users/messages_avec/" + this.userId).then(response => {
              this.lesUsers = response.data
            });  
           },

          // Permet d'afficher les conversations a partir du bas (messages plus recents)
            scrollToEnd() {
            let content = this.$refs.messagesContainer
            content.scrollTop = content.scrollHeight
          },
        },
    }
</script>

<style lang="css">
#messagerie {
  overflow: hidden;
  border: solid yellowgreen 2px;
  max-height: 100000px;
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
  max-height: 600px;
  overflow-y: scroll;
}

#conversation {
  width: 100%;
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
  margin-left: auto;
  float: right;
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