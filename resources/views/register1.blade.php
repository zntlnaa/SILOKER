<!DOCTYPE html>
<html>
<head>
    <title>SILOKER</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet"  type="text/css" >
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="shortcut icon"  href='https://i.ibb.co/ThwKjYm/siloke.png'>
		
</head>
<link href="{{asset('style/css/login.css')}}" rel="stylesheet">

<body>
	<div class="container">
		<div class="img">
			<img  src={{asset('style/image/logo.png')}}>
		</div>
		<div class="login-content">
			<form action="/registeruser" method="post">@csrf
				<h2 class="title">Register</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nama</h5>
           		   		<input name="name" type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Email</h5>
           		    	<input name="email" type="email" class="input">
            	   </div>
                </div>

           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input name="password" type="password" class="input">
            	   </div>
            	</div>
            	<a href="/">Login</a>
            	<input type="submit" class="btn" value="Register">
            </form>
        </div>
    </div>
    <script>  // login1

const inputs = document.querySelectorAll(".input");


function addcl(){
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function remcl(){
  let parent = this.parentNode.parentNode;
  if(this.value == ""){
    parent.classList.remove("focus");
  }
}


inputs.forEach(input => {
  input.addEventListener("focus", addcl);
  input.addEventListener("blur", remcl);
});
</script>
 

</body>

</html>