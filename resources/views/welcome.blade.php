<!DOCTYPE html>
<html>
    <head>
        <title>dropKeys</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="/js/jquery-latest.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/roulette.js"></script>
        <script type="text/javascript">
        // $(function(){
        //     // initialize!
        //     var option = {
        //         speed : 10,
        //         duration : 3,
        //         stopImageNumber : 3,
        //         startCallback : function() {
        //             console.log('start');
        //         },
        //         slowDownCallback : function() {
        //             console.log('slowDown');
        //         },
        //         stopCallback : function($stopElm) {
        //             console.log('stop');
        //         }
        //     }
        //     $('div.roulette').roulette(option); 

        //     // START!
        //     $('.start').click(function(){

        //         $('div.roulette').roulette('start');    
        //     });

        //     // STOP!
        //     $('.stop').click(function(){
        //         $('div.roulette').roulette('stop'); 
        //     });
        // });
        </script>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            div.roulette_container {
                background-color:rgb(253, 252, 253);
                width:200px;
                height:200px;
                border:1px solid rgba(253, 252, 253, 0.31);
                box-shadow:0px 0px 3px lightpink;margin:auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">dropKeys</div>
                @if (Auth::check())
                <div>{{ Auth::user()->name }} <a href="/logout">logout</a></div>
                @else
                <div></div>
                @endif
            </div>
            <!-- <div class="roulette_container" >
            <div class="roulette" style="display:none;"> 
                <img width="200" src="/images/1.jpg"/>
                <img width="200" src="/images/2.jpg"/>
                <img width="200" src="/images/3.jpg"/>
                <img width="200" src="/images/4.jpg"/>
                <img width="200" src="/images/5.jpg"/>
            </div> 
            </div>

            <button class="start">START</button> 
            <button class="stop">STOP</button>  -->
        </div>
    </body>
</html>
