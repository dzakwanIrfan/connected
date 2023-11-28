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
    <li>
      <a href="/dashboard">
        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
        <span class="text">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
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
    <li>
      <a href="#" onclick="logout()" class="nav-link">
        <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
        <span class="text">Logout</span>
      </a>
      <form id="logout-form" action="/logout" method="post" style="display: none;">
          @csrf
      </form>
      <span class="tooltip">Logout</span>
    </li> 
  </ul>
 </div>
 <div class="projectlist">
    <p id="projectlist">Project Lists</p>
 @foreach ($projects as $project)
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/projects/{{ $project->id }}/tasks">
                    {{ $project->nama_project }}
                </a>
            </li>
        </ul>
        @endforeach
 </div>
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