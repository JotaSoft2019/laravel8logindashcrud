<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="app.css">

        <style>
            *{
                margin:0;
                padding:0;
                box-sizing: border-box;
            }

            body{
                background-image: url("./ImagenesJotaRed/texturagris.png");
                background-color: #e6e7e6;
                background-size:100%;

            }
            .container-login{
            width: 90%;
            background-size:100%;
            height: 360px;
            background-image: url("./ImagenesJotaRed/imagen1.jpg");
            border: #000;
            background-repeat:none;
            background-position: center;
            margin:0 1px 0 0;
            }

            .container-login a{
                color:#FFFFFF;
                text-decoration:none;
                font-size: 30px;
                font-family: 'Merriweather Sans', sans-serif;
                
            }
            .container-register a{
                color:#FFFFFF;
                text-decoration:none;
                font-size: 30px;
                font-family: 'Merriweather Sans', sans-serif;

            }

            .container-register{
            width: 178vh;
            height: 360px;
            background-image: url("./ImagenesJotaRed/imagen2.jpg");
            background-size:110%;
            background-repeat:none;
            background-position: center;
            border: #000;
            margin:0;
            }

            .container-register:hover{
                box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.2);
            }

            .container-login:hover{
               
                box-shadow:3px 3px 3px 3px rgba(0, 0, 0, 0.2);
            }


        

          .container-principal{
            display:inline-block;
            justify-content:center;
          }

          .container{
            display:flex;
            justify-content: space-around;
            
          }

          .barra-nav{
            width:100%;
            height: 80px;
            background-image:url('/imagenesJotaRed/texturaAzul.jpg');
            background-size:100%

          }

          .logo-jotared img{
            width:100px;
            height: 30px;
            margin:30px;

          }

          .links{
            display:flex;
            justify-content:center;
            align-items: center;
            margin-top:160px;
          }

          .container-logo{
            display:flex;
            justify-content:center;
            margin-top:30px;
          }

          .container-logo img{
            width:120px;
            height:50px;
          }


          @media (max-width: 576px) {
            *{
                margin:0;
                padding:0;
                box-sizing: border-box;
            }
            .container-principal{
                display:block;
            }

            .container{
                display:block;

            }

            .links{
               margin-top:0;
            }

            .container-login{
                width:100%;
            }

            .container-register{
                width:100%;
            }

            .links a{
                margin-top:150px;
            }

          }

          @media (max-width: 720px) {
            *{
                margin:0;
                padding:0;
                box-sizing: border-box;
            }
            .container-principal{
                display:block;
            }

            .container{
                display:block;

            }

            .links{
               margin-top:0;
            }

            .container-login{
                width:100%;
            }

            .container-register{
                width:100%;
            }

            .links a{
                margin-top:150px;
            }

          }

        </style>
    </head>
    <body class="antialiased">
        <div class="barra-nav">
            <div class="logo-jotared">
            
            <img src="{{ asset('/imagenesJotaRed/logo JotaRed Blanco.png') }}" alt="Logo">
            </div>
        </div>

        <div class="container-principal relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block container">
                    <div class="container-login">
                    <div class="links">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="login text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>
                               
                           </div>
                   
                    </div>
                   
                        <div class="container-register">
                        @if (Route::has('register'))
                           <div class="links">
                               <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarse</a>
                           </div>
                           
                        @endif
                        </div>
                        
                    @endauth
                </div>
            @endif
        </div>

        <footer class=""logo-footer>
            <div class="container-logo">
                <img src="{{ asset('/imagenesJotaRed/logoJotaMundial.png') }}" alt="Logo">
            </div>
            
        </footer>
    </body>
</html>

