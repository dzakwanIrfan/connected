<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" style="height: 100vh;">
        <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">DZKWN BLOG</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? '' : 'text-black' }}" aria-current="page" href="/dashboard">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Workspace
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? '' : 'text-black' }}" href="/dashboard/posts">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                My Posts
            </a>
            </li>
        </ul>

        @can('')
        
        @endcan

        <hr class="my-3">

        <ul class="nav flex-column mb-5">
            <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link d-flex align-items-center gap-2 text-black"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
            </li>
        </ul>
        </div>
    </div>
  </div>