<template>
    				<!-- Start of Add Friends -->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="requests">
							<div class="title">
								<h1>Add your friends</h1>
								<button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
							</div>
							<div class="content">
								<form  @submit.prevent="submitFriendRequest">
									<div class="form-group">
										<label for="user">Username:</label>
										<input type="text" class="form-control" id="user" placeholder="Add recipient..." v-model="form.email" required @blur="search">
										<div class="user" id="contact" v-if="isExist">
											<img class="avatar-sm" src="dist/img/avatars/avatar-female-5.jpg" alt="avatar">
											<h5>{{name}}</h5>
											<button class="btn"><i class="material-icons">close</i></button>
										</div>
                                        <span class="text-danger" v-if="error" v-text = "error"></span>
									</div>
									<div class="form-group">
										<label for="welcome">Message:</label>
										<textarea class="text-control" id="welcome" v-model="form.body" placeholder="Send your welcome message..." required></textarea>
									</div>
									<button  class="btn button w-100">Send Friend Request</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Add Friends -->
</template>
<script>
export default {
    data(){
        return{
            form:{
                email:'',
                body:'',
                AuthUser:User.id()
             
            },
               name:'',
            isExist:false,
            error:'',
        }
    },
    methods:{
        search(){
             axios.post("api/user/search",{email:this.form.email})
                  .then(res=>{
                     this.name = res.data.name
                      this.isExist =true;
                      this.error='';
                      } )
                  .catch(error=>{
                      this.error = error.response.data.error;
                      console.log(error.response.data.error)
                          
                  })
        },
        submitFriendRequest(){
           axios.post("api/user/addFriend",this.form)
                .then(res=>{
                    this.form.email = '',
                     this.isExist =false;
                    this.form.body = ''
     
                })
                .catch(error=>{})
        }
    }


}
</script>