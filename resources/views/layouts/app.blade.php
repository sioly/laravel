<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ URL::asset('../public/css/style.css') }}">
    <script type="text/javascript" src="{{ URL::asset('../public/js/style.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('../public/js/ajax.js') }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>

<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <div id="test">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/partners') }}">Partenaire</a></li>
                    <li><a href="{{ url('/location') }}">Location</a></li>
                    <li><a href="{{ url('/sale') }}">Vente</a></li>
                    <li><a href="{{ url('/swap') }}">Troc</a></li>
                    <li><a href="{{ url('/gift') }}">Don</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                </div>
            </div>
            <div id="menu">           
                <form method="get" action="search">
                    <input type="text" name="search" placeholder="Valider avec la touche entrée"/>
                    <select name="categorie"><option value="all">Toutes nos boutiques</option>
                        <option value="animalerie">Animalerie</option>
                        <option value="auto">Auto, moto</option>
                        <option value="beaute">Beauté, parfums</option>
                        <option value="bebe">Bébé, puériculture</option>
                        <option value="bijoux">Bijoux, montres</option>
                        <option value="bricolage">Bricolage</option>
                        <option value="cd">CD, vinyles</option>
                        <option value="dvd">DVD, cinéma</option>
                        <option value="electromenager">Electroménager</option>
                        <option value="hight">Hight-tech</option>
                        <option value="immobilier">Immobilier</option>
                        <option value="informatique">Informatique</option>
                        <option value="instrument">Instruments de musique</option>
                        <option value="jardin">Jardin</option>
                        <option value="jeux">Jeux, jouets</option>
                        <option value="jeuxv">Jeux vidéo, consoles</option>
                        <option value="livre">Livre</option>
                        <option value="logiciel">Logiciel</option>
                        <option value="luminaire">Luminaires et éclairage</option>
                        <option value="sport">Sport et loisirs</option>
                        <option value="telephonie">Téléphonie, mobilité</option>
                        <option value="timbre">Timbres</option>
                        <option value="vetement">Vêtements, accessoires</option>
                        <option value="vin">Vin, gastronomie</option>
                    </select>
                    <select name="library">
                        <option value="all">Toutes nos rubriques</option>
                        <option value="don">Don</option>
                        <option value="troc">Troc</option>
                        <option value="location">Location</option>
                        <option value="vente">Vente</option></select>
                        <button type="submit">submit</button>
                    </select>
                </form>
            </div>
        </div>
    </nav>


    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
