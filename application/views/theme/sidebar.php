<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Charts -->
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo site_url('anggota/read');?>">
      <i class="fas fa-fw fa-user"></i>
      <span>Anggota</span>
    </a>
  </li>

  <!-- Heading -->
  <div class="sidebar-heading">
    Peminjaman
  </div>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('buku/read');?>">
      <i class="fas fa-fw fa-paperclip"></i>
      <span>Peminjaman</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('buku/read_theme');?>">
      <i class="fas fa-fw fa-book"></i>
      <span>Buku</span>
    </a>
  </li>

  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>