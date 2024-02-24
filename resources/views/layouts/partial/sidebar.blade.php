<?php
dd($menus)
?>
<div id="sidebars-container" class="col-2 mx-0 pt-3">
  <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
    <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
    <span class="fs-5 fw-semibold">&nbsp;</span>
  </a>
  <ul class="list-unstyled ps-0">
    <li class="mb-1">
      <button class="align-items-center btn btn-toggle collapsed px-0 rounded text-lg-start w-100" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true" aria-label="Accueil">
        Home
      </button>
      <div class="collapse show" id="home-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li class="py-2 px-3"><a href="#" class="rounded">Overview</a></li>
          <li class="py-2 px-3"><a href="#" class="rounded">Updates</a></li>
          <li class="py-2 px-3"><a href="#" class="rounded">Reports</a></li>
        </ul>
      </div>
    </li>
    <li class="border-top my-3"></li>
    <li class="mb-1">
      <a href="#">No collapsable link</a>
    </li>
    <li class="border-top my-3"></li>
  </ul>
</div>
