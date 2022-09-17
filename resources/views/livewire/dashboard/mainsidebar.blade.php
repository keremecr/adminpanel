<!-- Main Sidebar Container -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">@if (\Illuminate\Support\Facades\Auth::check())
          {{ \Illuminate\Support\Facades\Auth::user()->name }}
        @endif</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('dashboard.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Anasayfa
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="/dashboard/index" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Aktiviteler
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/dashboard/lessons" class="nav-link">
              <i class="nav-icon fa-thin fa-award"></i>
              <p>
                Dersler
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="/dashboard/groups" class="nav-link">
            <i class="nav-icon fa-thin fa-book-open"></i>
            <p>
              Gruplar
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/dashboard/lessongroups" class="nav-link">
            <i class="nav-icon fa-thin fa-book-open"></i>
            <p>
              Ders Grupları
            </p>
          </a>
        </li>
        @if(auth()->user()->type=="admin")
          <li class="nav-item">
            <a href="/dashboard/exams" class="nav-link">
              <i class="nav-icon fa-thin fa-book-open"></i>
              <p>
                Sınavlar
              </p>
            </a>
          </li>
        @endif
        @if(auth()->user()->type=="user")
          <li class="nav-item">
            <a href="/dashboard/exams" class="nav-link">
              <i class="nav-icon fa-thin fa-book-open"></i>
              <p>
                Sınavlarım
              </p>
            </a>
          </li>
        @endif
        @if(auth()->user()->type=="admin")
        <li class="nav-item">
          <a href="/dashboard/students" class="nav-link">
            <i class="nav-icon fa-thin fa-book-open"></i>
            <p>
              Öğrenciler
            </p>
          </a>
        </li>
        @endif
        @if(auth()->user()->type=="admin")
        <li class="nav-item">
          <a href="/dashboard/appointments" class="nav-link">
            <i class="nav-icon fa-thin fa-book-open"></i>
            <p>
              Randevular
            </p>
          </a>
        </li>
        @endif
        @if(auth()->user()->type=="user")
        <li class="nav-item">
          <a href="/dashboard/appointments" class="nav-link">
            <i class="nav-icon fa-thin fa-book-open"></i>
            <p>
              Randevularım
            </p>
          </a>
        </li>
        @endif

        <li class="nav-item">
            <a href="/dashboard/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Çıkış Yap
              </p>
            </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
