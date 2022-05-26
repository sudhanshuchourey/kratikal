<?php
include("connection.php");
$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

	if(!empty($_POST["forgot-password"])){
			
		
		$sql = "SELECT * FROM admin1 WHERE LoginID='".$_POST['user-login-name']."' OR EmailAddress='".mysql_escape_string($_POST['user-email'])."' ";
      $result = mysql_query($sql,$conn);

		if (@mysql_num_rows($result)!=0) {
			$row = @mysql_fetch_array($result);
			require_once("forgot-password-recovery-mail.php");
		} else {
			$error_message = 'No User Found';
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<style type="text/css">
        	html {
			  font-family: sans-serif;
			  -webkit-text-size-adjust: 100%;
			      -ms-text-size-adjust: 100%;
			}
			section{
			  display: block;
			}
			.container {
			  padding-right: 15px;
			  padding-left: 15px;
			  margin-right: auto;
			  margin-left: auto;
			}
			@media (min-width: 768px) {
			  .container {
			    width: 750px;
			  }
			}
			@media (min-width: 992px) {
			  .container {
			    width: 970px;
			  }
			}
			@media (min-width: 1200px) {
			  .container {
			    width: 1170px;
			  }
			}
			.row {
			  margin-right: -15px;
			  margin-left: -15px;
			}
			.col-md-12{
				float: left;
				width: 100%;
			}
			.text-center {
			  text-align: center;
			}
    		body {
			    font-family: 'Lato', sans-serif;
			    font-size: 14px;
			    font-weight: 300;
			    margin: 0;
			    color: #3b4045;
			    font:14px/22px 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
			    -webkit-font-smoothing: antialiased;
			    background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
			    background-size: 400% 400%;
			    -webkit-animation: Gradient 15s ease infinite;
			    -moz-animation: Gradient 15s ease infinite;
			    animation: Gradient 15s ease infinite;
			}

			@-webkit-keyframes Gradient {
			  0% {
			    background-position: 0% 50%
			  }
			  50% {
			    background-position: 100% 50%
			  }
			  100% {
			    background-position: 0% 50%
			  }
			}

			@-moz-keyframes Gradient {
			  0% {
			    background-position: 0% 50%
			  }
			  50% {
			    background-position: 100% 50%
			  }
			  100% {
			    background-position: 0% 50%
			  }
			}

			@keyframes Gradient {
			  0% {
			    background-position: 0% 50%
			  }
			  50% {
			    background-position: 100% 50%
			  }
			  100% {
			    background-position: 0% 50%
			  }
			}
			h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
			    font-weight: 300;
			    margin: 0px;
			}
			h1 {
			    font-size: 44px;
			    line-height: 56px;
			    color: #fff;
			}
			a {
			    -webkit-transition: all 0.5s ease-in-out 0s;
			    -moz-transition: all 0.5s ease-in-out 0s;
			    -o-transition: all 0.5s ease-in-out 0s;
			    transition: all 0.5s ease-in-out 0s;
			}

			a:focus,
			.btn:focus,
			.btn:active:focus {
			    box-shadow: none;
			    outline: 0 none;
			}
			a,
			a:active,
			a:focus,
			a:active {
			    text-decoration: none;
			}

			.btn {    
			    border-radius: 0;
			}

			.btn-home {
			  background-color: transparent;
			  border: 1px solid #fff;
			  border-radius: 0px;
			  color: #fff;
			  font-size: 18px;
			  padding: 10px 40px;
			  margin-top: 30px;
			}

			.btn-home:hover,
			.btn-home:focus {
			    background-color: #fff;
			    color: #555;
			}
			@media(max-width: 767px){
				.btn-home{
					padding: 5px 25px;
					font-size: 14px;
				}
			}
			.btn-border {
			    border: 1px solid #fff;
			    padding: 13px 40px;
			    color: #fff;
			    font-size: 15px;
			    text-transform: uppercase;
			    text-shadow: none;
			}

			#hero-area {
			  position: relative;
			  height: 100vh;
			}
			.block{
			  margin-top: 180px;
			}
			#hero-area .block p {
			    color: #fff;
			    font-size: 20px; 
			    font-weight: 300;
			    line-height: 30px;
			    margin-top: 20px;
			}
			@media(max-width: 767px){
				.block{
				  margin-top: 80px;
				  padding: 10px 20px;
				}
				#hero-area .block p {
					font-size: 14px;
				}
				h1{
					font-size: 24px;
				}
			}
			.subhead{
			    max-width: 700px;
			    position: relative;
			    margin: auto;
			}
			.animated {
			  -webkit-animation-duration: 1s;
			  animation-duration: 1s;
			  -webkit-animation-fill-mode: both;
			  animation-fill-mode: both;
			}
			@-webkit-keyframes fadeInDown {
			  0% {
			    opacity: 0;
			    -webkit-transform: translate3d(0, -100%, 0);
			    transform: translate3d(0, -100%, 0);
			  }

			  100% {
			    opacity: 1;
			    -webkit-transform: none;
			    transform: none;
			  }
			}

			@keyframes fadeInDown {
			  0% {
			    opacity: 0;
			    -webkit-transform: translate3d(0, -100%, 0);
			    transform: translate3d(0, -100%, 0);
			  }

			  100% {
			    opacity: 1;
			    -webkit-transform: none;
			    transform: none;
			  }
			}
			.fadeInDown {
			  -webkit-animation-name: fadeInDown;
			  animation-name: fadeInDown;
			}
			.site_block{
				display: inline-block;
				margin-top: 20px;
			}
			.foot{
			  color: #fff;
			  position: fixed;
			  width: 100%;
			  bottom: 0;
			  text-align: center;
			  font-weight: normal;
			  font-size: 12px;
			}
			.foot>footer>p>a{
			    color: #fff;
			}
			.foot>footer>p>a:hover{
			  color: #2f2b2b;
			}
			@media(max-width: 767px){
			  .foot{
			    font-size: 10px;
			  }
			}
        </style>
    <style type="text/css">
        .login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {    top: 150px;
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
input[type=submit]
    {
    font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: -webkit-linear-gradient(right, #e1584a, #dbc61f);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
    }
    input[type=submit]:hover
    {
        background: -webkit-linear-gradient(right, #dbc61f, #e1584a );
        }
.form button:active,.form button:focus {
  background: #e1584a;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
/*body {
  background: #f8f8f8; /* fallback for old browsers */
 /* background: -webkit-linear-gradient(right, #e41763, #dada17);
  background: -moz-linear-gradient(right, #e41763, #dada17);
  background: -o-linear-gradient(right, #e41763, #dada17);
  background: linear-gradient(to left, #e41763, #dada17);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}*/
    </style>
    <script type="text/javascript">
        $('.message a').click(function () {
            $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
        });
    </script>
<script>
function validate_forgot() {
	if((document.getElementById("user-login-name").value == "") && (document.getElementById("user-email").value == "")) {
		document.getElementById("validation-message").innerHTML = "Login name or Email is required!"
		return false;
	}
	return true
}
</script>
<body id="body">
<section id="hero-area">
<form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
<div class="form">
 
    <form class="login-form">
<h2 class="animated fadeInDown">Forgot Password?</h4>
	<?php if(!empty($success_message)) { ?>
	<div class="success_message" style="color:#2ABD2D"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

	<div class="field-group">
		
		<div><input type="text" name="user-login-name" placeholder="Username" id="user-login-name" class="input-field"> Or</div>
	</div>
	
	<div class="field-group">
		
		<div><input type="text" placeholder="Email" name="user-email" id="user-email" class="input-field"></div>
	</div>
	
	<div class="field-group">
		<div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
	</div>	
</form></div></form>
</section>
</body>
</html>