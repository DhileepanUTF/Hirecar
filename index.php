<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Html.html to edit this template
-->
<html>
    <head>
        <title>Login or Signup</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>-->
        <link rel="stylesheet" href="stile.css">
        <style>
            .geeks {
	            all:unset;
                
                
            }
            .Uno{
	            margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                font-family: 'Jost', sans-serif;
                background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
            }
        </style>
        <!--<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">-->
    <body id="maincontent" class="geeks">
    
        <div class="container">
            
            
            
            <div id="Res">
                <button id="result"> 
            </div>

            

            <div id="checker" style="width:100px; height:30px ;  float:right">
                 <span>
                     <button id="newpage"  style="width:250px; height:30px; right: 100px">Create a strong password</button>
                 </span>
            </div>
            

	<div class="main" id="header">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="POST" id="form1">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="" id="name">
					<input type="email" name="email" placeholder="Email" required="" id="email">
					<input type="password" name="pswd" placeholder="Password" required="" id="password">
                    <input type="number" name="roll" placeholder="Number" >
                    <input type="number" name="year" placeholder="Age">
					<button id="Sign" name="signup">Sign up</button>
				</form>
                
			</div>

			<div class="login" >
				<form method="POST" id="form2">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="EMAIL" placeholder="Email" required="" id="em">
					<input type="password" name="PSWD" placeholder="Password" required="" id ="pd">
					
					<button id="log" name="login">Login</button>
				</form>
			</div>
	</div>
</div>
<div id="dbtelecast" style="width:400px; height:70px; display:none">
            <button id="left" style="width:50px">Prev</button>
            <p id="dbdata"> HEy</p>
            <button id="right" style="width:50px; float:right">Next</button>

            <div>
<script>
    $('#Sign').click(function(event){
        event.preventDefault();
        var signupdata = $('#form1').serialize();
        //console.log(signupdata);
        $.ajax({
        url: 'action.php',
        method: 'POST',
        data : signupdata + '&action=signup'
    }).done(function(res){
        $('#Res').show();
        $('#result').html(res);
    })
    })

    $('#log').click(function(event){
        event.preventDefault();
        var logdata = $('#form2').serialize();
        //console.log(signupdata);
        $.ajax({
        url: 'action.php',
        method: 'POST',
        data : logdata + '&action=login'
    }).done(function(result){
        $('#Res').show();
        $('#result').html(result);
    })
})
    
$(document).ready(function(){
  $("#newpage").click(function(){
      $('#newpage').css("display","none");
      $("#header").css("background","white");
      $("#header").css({"background": "white", "width": "1200px", "height":"900px"});

      $("#header").load("pcheck.html");
  })
})
    
</script>
</body>
</html>