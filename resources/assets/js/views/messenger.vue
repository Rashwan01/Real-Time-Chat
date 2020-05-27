<template>
			<div class="layout">
				<messenger-navigation></messenger-navigation>
		<messenger-sidebar></messenger-sidebar>
<messenger-start-chat></messenger-start-chat>
<messenger-add-friend></messenger-add-friend>
    <messenger-conversation></messenger-conversation>

			</div> <!-- Layout -->
	

</template>
<script>
import messengerSidebar from "./messenger/sidebar"
import messengerNavigation from "./messenger/navigation"
import messengerStartChat from "./messenger/startChat"
import messengerAddFriend from "./messenger/addFriend"
import messengerConversation from "./messenger/conversation"

export default{
created(){
(User.isLogin())?'' :this.$router.push("/login");
     window.Echo.private(`message.${User.id()}`).listen(".messageEvent", (e) => {
   
         EventBus.$emit("msgStored",e);
          
})
},
components:{messengerSidebar,messengerNavigation,messengerStartChat,messengerAddFriend,messengerConversation}
}
</script>
<style>

</style>