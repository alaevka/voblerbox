<!DOCTYPE html>
  <html>
    <head>
    	<title>voblerBox - @yield('title')</title>
      	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Play&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
      	<!--Let browser know website is optimized for mobile-->
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      	<style>
            html, body {
                
                font-family: 'Play', sans-serif;
                padding-top: 30px;
            }
            .has-error .error-input {
            	color: #ff0000;
            }
            .login-form-password {
            	display: none;
            }
            .navbar-brand {
              padding-left: 0px;
            }
            .box-thumb {
              margin-bottom: 20px;
            }
            .lure-thumb {
              margin-bottom: 20px;
            }
            div.roulette_container {
                background-color:rgb(253, 252, 253);
                width:250px;
                height:194px;
                margin:auto;
            }
        </style>
    </head>
    <body>
  	<nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-header-collapsed" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="{{ route('home') }}" class="navbar-brand">ВОБЛЕРБОКС</a>
        </div>  

        <div class="collapse navbar-collapse" id="nav-header-collapsed">
	      
	     	<ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
              <li><a href="{{ route('addbalance', ['id' => Auth::user()->_id, 'value' => 100]) }}">Ваш баланс: <font id="user-balance">{{ Auth::user()->getBalance() }}</font> (пополнить на 100 рублей)</a></li>
              <li><a href="">8 {{ Auth::user()->phone }}</a></li>
              <li><a href="{{ route('logout') }}">выйти</a></li>
            @else
              <li><a href="{{ route('login') }}">войти</a></li>
              <li><a href="{{ route('registration') }}">зарегистрироваться</a></li>
            @endif
	        	
	      	</ul>
        </div>
	    </div>
	  </nav>

    <div class="container">
      @yield('content')
    </div>
        <!-- Compiled and minified JavaScript -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/jquery.maskedinput.min.js"></script>
    <script src="/js/jquery.animateNumber.min.js"></script>
    <script src="/js/roulette.js"></script>
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


      $(function(){
          // initialize!
          var option = {
              speed : 10,
              duration : 1,
              stopImageNumber : 3,
              startCallback : function() {
                  console.log('start');
              },
              slowDownCallback : function() {
                  console.log('slowDown');
              },
              stopCallback : function($stopElm) {
                  console.log('stop');
                  //show 
                  //cheack balance and show button or not show :)
                  $("#start-roulette").html('Попробовать еще раз!').prop('disabled', false);
              }
          }
          $('div.roulette').roulette(option); 

          // START!
          $('#start-roulette').click(function(){
              $("#start-roulette").prop('disabled', true);
              //money back
              var box_price = $("#current-box-price").val();
              var box_id = $("#current-box-id").val();
              var current_user_balance = $("#user-balance").html();
              var new_balance = parseInt(current_user_balance) - parseInt(box_price);
              $('#user-balance').prop('number', current_user_balance).animateNumber({ number: new_balance }, 2000);

              var token = $('meta[name="csrf-token"]').attr('content');
              //ajax money back
              $.ajax({
                type: "POST",
                dataType: 'json',
                url: "{{ route('roulette') }}",
                data: "box_id="+box_id+"&_token="+token,
                success: function(data,status){

                }
              });

              $('div.roulette').roulette('start');
              return false;   
          });

          // STOP!
          // $('.stop').click(function(){
          //     $('div.roulette').roulette('stop'); 
          // });
      });
        


		});
		</script>
    </body>
</html>