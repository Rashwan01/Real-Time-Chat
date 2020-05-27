<template>
        <div class="container">
        <div class="col-md-12">
          <div class="bottom">
            <form class="position-relative w-100" @submit.prevent ="SendMsg">
              <textarea v-model="form.message" class="form-control" placeholder="Start typing for reply..." rows="1"></textarea>
              <button class="btn emoticons">
                <i class="material-icons">insert_emoticon</i>
              </button>
              <button type="submit" class="btn send">
                <i class="material-icons">send</i>
              </button>
            </form>
            <label>
              <input type="file" />
              <span class="btn attach d-sm-block d-none">
                <i class="material-icons">attach_file</i>
              </span>
            </label>
          </div>
        </div>
      </div>
</template>
<script>
export default {
    props:['id'],
    data(){
        return{
            form:{
                message:'',
            }
        }
    },
    methods:{
       SendMsg(){
           if(this.form.message)
           {
                 axios.post("api/user/send/message",{message:this.form.message,user_from:User.id(),user_to:this.id})
                 .then(res=>{
                     console.log(res.data);
                   EventBus.$emit("msgStored",res.data)
                   this.form.message=" "  
                   

                 })
                 .catch(error=>{})
           }
         
       }
    }
}
</script>