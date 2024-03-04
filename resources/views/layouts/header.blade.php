<nav class="navbar navbar-expand-md navbar-dark">
     <div class="container">
         <a href="/" class="navbar-brand"><img src="/images/logo.png" height="90px"></a>
         <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
             <span class="menu-icon-bar"></span>
             <span class="menu-icon-bar"></span>
             <span class="menu-icon-bar"></span>
         </button>

         <div id="main-nav" class="collapse navbar-collapse">
             <ul class="navbar-nav ml-auto">
                 <li><a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active':''; }}">Home</a></li>
                 @auth
                 <a href="/Courses" class="nav-item nav-link {{ Route::is('Courses.index') || Route::is('Courses.show' ) || Route::is('quiz.show') ? 'active' : '' ; }}"> courses</a>
                 @endauth
                 <li><a href="/services" class="nav-item nav-link {{ Request::is('services') || Request::is('services/hospital') || Request::is('services/school') || Request::is('services/rehab') ? 'active':''; }}">Where To Go</a></li>

                 <li class="dropdown">
                     <a href="#" class="nav-item nav-link {{ Request::is('tips') || Request::is('tips/down') || Request::is('tips/autism') || Request::is('tips/hearing') ? 'active':''; }}" data-toggle="dropdown">tips</a>
                     <div class="dropdown-menu">
                         <a href="/tips/down" class="dropdown-item">Down syndrome</a>
                         <a href="/tips/autism" class="dropdown-item">Autism</a>
                         <a href="/tips/hearing" class="dropdown-item">Hearing Disabilities</a></div></li>
                         @guest
                 <li><a href="/login" class="nav-item nav-link {{ Request::is('login') ? 'active' : '' ; }}">log in</a></li>
                 <li><a href="/register" class="nav-item nav-link {{ Request::is('register') ? 'active' : '' ; }}">sign up</a></li>
                 @endguest

                 @auth
                 <li><a href="/logout" class="nav-item nav-link">log out</a></li>
                 @endauth


         </ul>
         </div>
     </div>
 </nav>