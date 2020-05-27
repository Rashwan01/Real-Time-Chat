<template>

		<main>
			<div class="layout">
				<!-- Start of Sign In -->
				<div class="main order-md-1">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content">
									<h1>Sign in to Swipe</h1>
									<div class="third-party">
										<button class="btn item bg-blue">
											<i class="material-icons">pages</i>
										</button>
										<button class="btn item bg-teal">
											<i class="material-icons">party_mode</i>
										</button>
										<button class="btn item bg-purple">
											<i class="material-icons">whatshot</i>
										</button>
									</div>
									<p>or use your email account:</p>
									<form method="post" @submit.prevent="submit">
										<div class="form-group">
											<input type="email" id="inputEmail" class="form-control" name="email" v-model="form.email" placeholder="Email Address" required>
											<button class="btn icon"><i class="material-icons">mail_outline</i></button>
										</div>
										<div class="form-group">
											<input type="password" id="inputPassword" class="form-control" name="password" v-model="form.password" placeholder="Password" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<button type="submit" class="btn button" formaction="index-2.html">Sign In</button>
										<div class="callout">
											<span>Don't have account? <router-link class="btn button" :to="{name:'register'}">Sign Up</router-link></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign In -->
				<!-- Start of Sidebar -->
				<div class="aside order-md-2">
					<div class="container">
						<div class="col-md-12">
							<div class="preference">
								<h2>Hello, Friend!</h2>
								<p>Enter your personal details and start your journey with Swipe today.</p>
								<router-link class="btn button" :to="{name:'register'}">Sign Up</router-link>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
			</div> <!-- Layout -->
		</main>

</template>

<script>
import User from "../../Auth/user";
export default {
data(){
return {
    form:{
        email:'',
        password:'',
    },
    errors:''
}
},
created(){
(User.isLogin())?this.$router.push("/messenger") :'';
},
  methods:{
submit(){
     User.login(this.form)
    this.errors  = User.errorMessage();
}
  }
};
</script>
<style>
</style>