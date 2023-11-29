  <div class="sidebar" id="sidebar">
  <div class="top">
    <div class="logo">
      <a href="/dashboard">
        <img src="/img/connected.png" class="side-img">
        <span class="side-logo">Connected</span>
      </a>
    </div>
    <ion-icon name="menu-outline" id="btn"></ion-icon>
  </div>
  <div class="user">
    <a href="/users/{{ auth()->user()->id }}">
      @if (auth()->user()->image)
        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="foto_project" class="user-img"> 
      @else
        <img src="https://source.unsplash.com/1200x400?profil" alt="" class="user-img">
      @endif
      <div class="role">
        <p class="text {{ Request::is('dashboard/categories*') ? '' : 'text-black' }}">{{ auth()->user()->name }}</p>
        <p class="text {{ Request::is('dashboard/categories*') ? '' : 'text-black' }}">{{ auth()->user()->role }}</p>
      </div>
    </a>
  </div>
<div class="sidebar-nav">
  <ul>
    @can('owner')
    <li>
      <a href="/dashboard">
        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
        <span class="text">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
    @endcan
    @can('staff')
    <li>
      <a href="/workbench">
        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
        <span class="text">Workbench</span>
      </a>
      <span class="tooltip">Workbench</span>
    </li>
    @endcan
    @can('owner')
    <li>
      <a href="/projects/create">
      <span class="icon"><ion-icon name="duplicate-outline"></ion-icon></span>
      <span class="text {{ Request::is('dashboard') ? '' : 'text-black' }}">Project</span>
      </a>
      <span class="tooltip">Project</span>
    </li>
    <li>
      <a href="/users">
      <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
      <span class="text {{ Request::is('dashboard') ? '' : 'text-black' }}">User Management</span>
      </a>
      <span class="tooltip">User Management</span>
    </li>
    @endcan
    <li>
      <a href="#" onclick="logout()" class="logout">
        <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
        <span class="text">Logout</span>
      </a>
      <form id="logout-form" action="/logout" method="post" style="display: none;">
          @csrf
      </form>
      <span class="tooltip">Logout</span>
    </li> 
    
    <li class="dropdown">
      <a class="select">
        <span class="selected"><ion-icon name="layers-outline"></ion-icon></span>
        <span class="text" style="margin-right:95px;">Lists</span>
        <span class="caret"></span>
      </a>
    
      <ul class="menu">
        @foreach ($projects as $project)
          <li class="active">
            <a href="/projects/{{ $project->id }}/tasks">
              {{ $project->nama_project }}
            </a>
          </li>
        @endforeach
      </ul>
    </li>
  </ul>
 </div>
 {{-- <div class="projectlist">
    <p id="projectlist">Lists</p>
 @foreach ($projects as $project)
        <ul class="side flex-column">
            <li class="side-item">
                <a class="nav-link" href="/projects/{{ $project->id }}/tasks">
                    {{ $project->nama_project }}
                </a>
            </li>
        </ul>
        @endforeach
 </div> --}}
 </div>
<script>
  let btn=document.querySelector('#btn')
  let sidebar=document.querySelector('.sidebar')
  let projectlist=document.querySelector('#projectlist')

  btn.onclick = function (){
    sidebar.classList.toggle('active');
  };

  projectlist.onclick = function(){
    sidebar.classList.toggle('active');
  }
</script>

<script>
  function logout() {
      event.preventDefault(); // Mencegah pengaruh bawaan dari tag <a>
      document.getElementById('logout-form').submit();
  }
</script>

<script>
  const dropdowns = document.querySelectorAll('.dropdown');

  dropdowns.forEach(dropdown => {
      const select = dropdown.querySelector('.select');
      const caret = dropdown.querySelector('.caret');
      const menu = dropdown.querySelector('.menu');
      const options = dropdown.querySelectorAll('.menu li');
      const selected = dropdown.querySelector('.selected');
      const sidebar = document.querySelector('.sidebar');

      select.addEventListener('click', () => {
          dropdown.classList.toggle('select-clicked');
          caret.classList.toggle('caret-rotate');
          menu.classList.toggle('menu-open');
          sidebar.classList.toggle('active');
      });

      options.forEach(option => {
          option.addEventListener('click', () => {
              sidebar.classList.remove('active');
              selected.innerHTML = option.innerText;
              select.classList.remove('select-clicked');
              caret.classList.remove('caret-rotate');
              menu.classList.remove('menu-open');

              options.forEach(option => {
                  option.classList.remove('active');
              });
          option.classList.add('active');
        });
      });
    });
</script>