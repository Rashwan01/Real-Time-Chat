<template>
				<div class="main">
					<div class="tab-content" id="nav-tabContent">
	                  	<messenger-chat v-if="data" :data= "data" ></messenger-chat>
		
					</div>
				</div>
</template>
<script>
import messengerChat from "./chat"
export default {
    data(){
        return{
            data:'',
        }
    },
    components:{messengerChat},
    created(){


EventBus.$on("startChat", (value) => {
 axios.post("api/user/message",value)
      .then(res=> {this.data = res.data

      })
      .catch(error=>{})

});



    },
   

}
</script>