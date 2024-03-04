<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-bottom">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{ Request::is('admin/services') ? 'active' : '' ; }} ">
          <a class="nav-link" href="/admin/services">Services</a>
        </li>
        <li class="nav-item {{ Request::is('admin/courses') ? 'active' : '' ; }}">
          <a class="nav-link" href="/admin/courses">Courses</a></li>
          <li class="nav-item {{ Request::is('admin/videos') ? 'active' : '' ; }}">
          <a class="nav-link" href="/admin/videos">Videos</a></li>
          <li class="nav-item {{ Request::is('admin/quizzes') ? 'active' : '' ; }}">
          <a class="nav-link" href="/admin/quizzes">Quizzes</a></li>
          <li class="nav-item {{ Request::is('admin/questions') ? 'active' : '' ; }}">
          <a class="nav-link" href="/admin/questions">Questions</a></li></ul>

        <ul class="ml-auto navbar-nav">  <li class="nav-item">
          <a href="/logout" class="nav-link" style="color: white;">log out</a>
        </li>
      </ul>
    </div>
  </nav>
  