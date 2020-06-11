<template>
  
    <div>  
      <div class="container" id="messagerie">
        <div class="row">
          <div class="col-3" id="liste-conversations">
            <h2>Messages</h2>
            <div id="conversations" >
              david <br>
              Jasmine
            </div>
            </div>
            <div class="col-9" id="conversation-active">
            <h2>David</h2>
            <div id="conversation">
              <div class="message" v-for="item in message" :key="item">
                <h3 id="nom-utilisateur"> {{ item.nomUtilisateur }}</h3>
                 <p id="contenu">{{ item.contenu }}</p>
              </div>
            </div>
            <div id="redaction">
              <textarea placeholder="Rédigez un message.." required></textarea>
              <button class="btn btn-success" v-on:click="envoiMessage(item)">Envoyer</button> 
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
               message: 'brocoli',
            };
        
        },
        props: {

        },
        components: {

        },
        mounted() {
            Axios.get("/api/messages").then(response => {
            this.message = response.data;
            console.log(this.message)
        });
        
        },
        methods: {
           envoiMessage(item) {

             Axios.post("/api/messages", {
                contenu: this.item.contenu,
                from_id: this.item.userId,
                to_id: this.item.userId,
               
              }).then(data => {
              
              console.log(data)
             
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