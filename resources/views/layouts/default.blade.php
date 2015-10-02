<!DOCTYPE html>
  <html>
    <head>
    	<title>voblerBox - @yield('title')</title>
      	<!--Import Google Icon Font-->
      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<!--Import materialize.css-->
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

      	<!--Let browser know website is optimized for mobile-->
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      	<style>
            html, body {
                height: 100%;
            }
            .has-error .error-input {
            	color: #ff0000;
            }
            .login-form-password {
            	display: none;
            }
            .brand-logo {
            	margin-top: 6px;
            	margin-left: 20px;
            }
        </style>
    </head>
    <body>
    	<nav class="teal lighten-3 z-depth-0">
		    <div class="nav-wrapper">
		      <a href="{{ route('home') }}" class="brand-logo"><img src="/images/logo.png"></a>
		     	<ul id="nav-mobile" class="right hide-on-med-and-down">
              @if (Auth::check())
                <li><a href="">8 {{ Auth::user()->phone }}</a></li>
                <li><a href="{{ route('logout') }}">выйти</a></li>
              @else
                <li><a href="{{ route('login') }}">войти</a></li>
                <li><a href="{{ route('registration') }}">зарегистрироваться</a></li>
              @endif
		        	
		      	</ul>
		    </div>
		</nav>

        <div class="container" style="height: 100%;">
            @yield('content')
        </div>
        <!-- Compiled and minified JavaScript -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script src="/js/jquery.maskedinput.min.js"></script>
		<script type="text/javascript">
		$(function() {
			$("#form-login").find('#phone, #password').keyup(function(){
				if($("#form-login").find('#phone').val() != '' && $("#form-login").find('#password').val() != '') {
					$("#form-login-submit").prop('disabled', false);
				} else {
					$("#form-login-submit").prop('disabled', true);
				}
			});
      $("#form-registration").find('#phone, #firstname, #lastname').keyup(function(){
        if($("#form-registration").find('#phone').val() != '' && $("#form-registration").find('#firstname').val() != '' && $("#form-registration").find('#lastname').val() != '') {
          $("#form-registration-submit").prop('disabled', false);
        } else {
          $("#form-registration-submit").prop('disabled', true);
        }
      });
      $("#phone").mask("(999) 999-9999");
		});
		</script>
    </body>
</html>