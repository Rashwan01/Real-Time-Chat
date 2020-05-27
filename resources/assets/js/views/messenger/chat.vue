<template>
  <!-- Start of Babble -->
  <div
    class="babble tab-pane fade active show"
    id="list-chat"
    role="tabpanel"
    aria-labelledby="list-chat-list"
  >
    <!-- Start of Chat -->
    <div class="chat" id="chat1">
      <div class="top">
        <div class="container">
          <div class="col-md-12">
            <div class="inside">
              <a href="#">
                <img
                  class="avatar-md"
                  src="dist/img/avatars/avatar-female-5.jpg"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Keith"
                  alt="avatar"
                />
              </a>
              <div class="status">
                <i class="material-icons online">fiber_manual_record</i>
              </div>
              <div class="data">
                <h5>
                  <a href="#">{{ data.friend_info.name }}</a>
                </h5>
                <span>Active now</span>
              </div>
              <button class="btn connect d-md-block d-none" name="1">
                <i class="material-icons md-30">phone_in_talk</i>
              </button>
              <button class="btn connect d-md-block d-none" name="1">
                <i class="material-icons md-36">videocam</i>
              </button>
              <button class="btn d-md-block d-none">
                <i class="material-icons md-30">info</i>
              </button>
              <div class="dropdown">
                <button
                  class="btn"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="material-icons md-30">more_vert</i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <button class="dropdown-item connect" name="1">
                    <i class="material-icons">phone_in_talk</i>Voice Call
                  </button>
                  <button class="dropdown-item connect" name="1">
                    <i class="material-icons">videocam</i>Video Call
                  </button>
                  <hr />
                  <button class="dropdown-item">
                    <i class="material-icons">clear</i>Clear History
                  </button>
                  <button class="dropdown-item">
                    <i class="material-icons">block</i>Block Contact
                  </button>
                  <button class="dropdown-item">
                    <i class="material-icons">delete</i>Delete Contact
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content" id="content" v-if="data.messages.length>0"  ref="chato">
        <div class="container">
          <div class="col-md-12">
            <div class="date">
              <hr />
              <span>Yesterday</span>
              <hr />
            </div>
            <div class="pointer" v-for="(msg,index) in data.messages" :key="index">
              <div class="message me" v-if="msg.user_from ==Auth.id ">
                <div class="text-main">
                  <div class="text-group me">
                    <div class="text me">
                      <p>{{msg.text}}</p>
                    </div>
                  </div>
                  <span>{{ msg.created_at }}</span>
                </div>
              </div>
              <div class="message" v-else>
                <img
                  class="avatar-md"
                  src="dist/img/avatars/avatar-female-5.jpg"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Keith"
                  alt="avatar"
                />
                <div class="text-main">
                  <div class="text-group">
                    <div class="text">
                      <p>{{msg.text}}</p>
                    </div>
                  </div>
                  <span>{{ msg.created_at }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content empty" v-else>
        <div class="container">
          <div class="col-md-12">
            <div class="no-messages">
              <i class="material-icons md-48">forum</i>
              <p>Seems people are shy to start the chat. Break the ice send the first message.</p>
            </div>
          </div>
        </div>
      </div>
  <send-message :id="data.friend_info.id"></send-message>
    </div>
    <!-- End of Chat -->
    <!-- Start of Call -->
    <div class="call" id="call1">
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="inside">
              <div class="panel">
                <div class="participant">
                  <img class="avatar-xxl" src="dist/img/avatars/avatar-female-5.jpg" alt="avatar" />
                  <span>Connecting</span>
                </div>
                <div class="options">
                  <button class="btn option">
                    <i class="material-icons md-30">mic</i>
                  </button>
                  <button class="btn option">
                    <i class="material-icons md-30">videocam</i>
                  </button>
                  <button class="btn option call-end">
                    <i class="material-icons md-30">call_end</i>
                  </button>
                  <button class="btn option">
                    <i class="material-icons md-30">person_add</i>
                  </button>
                  <button class="btn option">
                    <i class="material-icons md-30">volume_up</i>
                  </button>
                </div>
                <button class="btn back" name="1">
                  <i class="material-icons md-24">chat</i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Call -->
  </div>
  <!-- End of Babble -->
</template>
<script>
  import sendMessage from "./sendMessage";
export default {
  
  props: ["data"],
  created(){


      window.Echo.private(`message.${User.id()}`).listen(".messageEvent", (e) => {
               this.scrollToBottom();
})
EventBus.$on("msgStored", res=>{
    
     this.data.messages.push( res.message)
     this.scrollToBottom();


})

 
  },
  computed: {
    Auth() {
      return {
        id: User.id()
      };
    }
  },
  methods:{
scrollToBottom(){
    setTimeout(() => {
        this.$refs.chato.scrollTop = this.$refs.chato.scrollHeight- this.$refs.chato.clientHeight;
    }, 50);
    
}
  },

  components:{sendMessage}
};
</script>