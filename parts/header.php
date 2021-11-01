<header>
  <div class="mod-logo">
    <a href="<?= BASE_URL ?>"> <img src="assets/img/takenode_logo_color.svg" alt="TakeNode Logo" height="23"></a>
  </div>
  <nav class="mod-nav">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <a href="<?= BASE_URL ?>info.php" class="btn btn-light <?= $activepage == 'info' ? 'active' : '' ?>">
        <i class="fal fa-info-circle d-md-none"></i>
        <span class="d-none d-md-block">Info</span>
      </a>
      <a href="<?= BASE_URL ?>spread-the-word.php" class="btn btn-light <?= $activepage == 'spreadtheword' ? 'active' : '' ?>">
        <i class="fal fa-bullhorn d-md-none"></i>
        <span class="d-none d-md-block">Spread the Word</span>
      </a>
      <a href="<?= BASE_URL ?>lookup.php" class="btn btn-light <?= $activepage == 'search' ? 'active' : '' ?>">
        <i class="fal fa-search d-md-none"></i>
        <span class="d-none d-md-block">ID lookup</span>
      </a>
      <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <?= strtoupper($language) ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <li><a class="dropdown-item" href="<?= BASE_URL ?>set_language.php?language=nl">NL</a></li>
          <li><a class="dropdown-item" href="<?= BASE_URL ?>set_language.php?language=en">EN</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>