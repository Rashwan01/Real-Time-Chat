<template>
  <a
    href="#list-chat"
    :class="['filterDiscussions', 'all' , 'single' ]"
    id="list-chat-list"
    data-toggle="list"
    role="tab"
    @click="startChat"
  >
    <img
      class="avatar-md"
      src="dist/img/avatars/avatar-female-1.jpg"
      data-toggle="tooltip"
      data-placement="top"
      title="Janette"
      alt="avatar"
    />
    <div class="status">
      <i :class="['material-icons',status]">fiber_manual_record</i>
    </div>
    <div class="new bg-yellow">
      <span>+7</span>
    </div>
    <div class="data">
      <h5>{{data.friend_name}}</h5>
      <div v-if="data.lastMessage">
          
      <span >{{ data.lastMessage.created_at }}</span>
      <p>{{data.lastMessage.message}}</p>
        </div>
      <p v-else>You and {{data.friend_name}} became Friend</p>
    </div>
  </a>
</template>
<script>
export default {
  props: ["data"],
  data(){
      return{
status:"offline",
      }
      
  },
  created(){

 EventBus.$on("onlineUser",res=>{
     
     res.forEach(el => {
         if(el.id == this.data.friend_id)
         {
           this.status= "online"
           return ;
         }
     });
   
 
})
EventBus.$on("msgStored", res=>{

if(res.message.user_To == this.data.friend_id)
{
    this.data.lastMessage={
        message : res.message.text,
        created_at : res.message.created_at
    }


}
    

})
  },
  methods:
  {
      startChat(){
          EventBus.$emit("startChat",{friend_id:this.data.friend_id,AuthUser:User.id()})
      }
  }
};
</script>