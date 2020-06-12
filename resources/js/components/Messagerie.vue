<template>
  
    <div>  
      <div class="container" id="messagerie">
        <div class="row">
          <div class="col-3" id="liste-conversations">
            <h2>Messages</h2>
            <div id="conversations">
              {{ username }} <br>
              Jasmine
            </div>
            </div>
            <div class="col-9" id="conversation-active">
            <h2>David</h2>
            <div id="conversation">
              <div class="message" v-for="item in message" :key="item.id">
                <h3 id="nom-utilisateur"> {{ item.nomUtilisateur }}</h3>
                 <p id="contenu">{{ item.contenu }}</p>
              </div>
            </div>
            <div id="redaction">
            <form action="./api/messages/create" method="POST" @submit.prevent="envoiMessage()">
              <input type="text" name="message" v-model="contenu" placeholder="Redigez un message.."></input>
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
               toUserId: 1,
               fromUserId: 1,
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
          
             Axios.get("/api/users/" + this.userId).then(response => {
              this.user = response.data
              this.username = this.user.name
              console.log(this.username)
            });
        


            Axios.get("/api/messages").then(response => {
              this.message = response.data
              console.log(this.message)
            });
        
          },
           envoiMessage() {

             Axios.post("/api/messages/store", {
                contenu: this.contenu,
                from_id: this.fromUserId,
                to_id: this.toUserId,
               
              })
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

#redaction textarea{
  width: 100%;
}



</style>