<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
          <v-app id="inspire">
            @auth  
            <v-navigation-drawer
              v-model="drawer" app>

              <v-list-item two-line >
                <v-list-item-avatar>
                  <img src="https://randomuser.me/api/portraits/men/81.jpg">
                </v-list-item-avatar>
    
                <v-list-item-content>
                  <v-list-item-title>{{ Auth::user()->name }}</v-list-item-title>
                  <v-list-item-subtitle>Admin</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
    
              <v-divider></v-divider>

              <v-list dense>
                <v-list-item to="/home" link >
                  <v-list-item-action>
                    <v-icon>mdi-home</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title>Home</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item to="/user" link>
                  <v-list-item-action>
                    <v-icon>mdi-account</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title>Users</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item to="inventory" link>
                  <v-list-item-action>
                    <v-icon>mdi-book-open-page-variant</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title>Inventary</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item to="/buy" link>
                  <v-list-item-action>
                    <v-icon>mdi-cart</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title>Buy</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item to="/state" link>
                  <v-list-item-action>
                    <v-icon>mdi-tag</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title>State</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item to="/location" link>
                  <v-list-item-action>
                    <v-icon>mdi-map</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title>Location</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                
              </v-list>

              <template v-slot:append>
                <div class="pa-2">
                  <v-btn color="error" dark block href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </v-btn>
                </div>
              </template>

            </v-navigation-drawer>
            @endauth
    
            <v-app-bar
              app
              color="indigo"
              dark
            >
              <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
              <v-toolbar-title>Inventory System</v-toolbar-title>

              <v-spacer></v-spacer>
              @guest
                <v-btn href="{{ route('login')}}"  color="red" class="font-weight-bold ma-2">
                  {{ __('Login') }}
                  <v-icon right>mdi-lock</v-icon> 
                </v-btn>

              @if (Route::has('register'))
                <v-btn href="{{ route('register') }}"  color="teal darken-1" class="font-weight-bold ma-2">
                    {{ __('Register') }}
                  <v-icon right>mdi-account-plus</v-icon> 
                </v-btn>
              @endif
                
                @else
                <v-menu offset-y>
                    <template v-slot:activator="{ on }">
                      <v-avatar v-on="on">
                        <img
                          src="https://cdn.vuetifyjs.com/images/john.jpg"
                          alt="John"
                        >
                    </v-avatar>
                    </template>
                    <v-list>
                      <v-list-item  href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <v-list-item-title >{{ __('Logout') }}</v-list-item-title>
                      </v-list-item>
                    </v-list>
                  </v-menu>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </v-app-bar>
    
            <v-content>
              <v-container
                class="fill-height "
                fluid >
                @guest
                  @yield('content')     
                @endguest
                @auth 
                <router-view></router-view>
                @endauth

              </v-container>
            </v-content>
            <v-footer
              color="indigo"
              app >
              <span class="white--text">Inventory system  created by Allan Sanchez &copy; 2020</span>
            </v-footer>
        </v-app>

    </div>
</body>
</html>
