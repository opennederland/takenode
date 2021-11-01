<!--
<div class="btn-group btn-group-vertical w-100" role="group" aria-label="Persoonsgegevens">
  <input type="radio" class="btn-check" name="persoonsgegevens" id="persoonsgegevens1" autocomplete="off" checked>
  <label class="btn btn-outline-dark" for="persoonsgegevens1">Anoniem</label>
  
  <input type="radio" class="btn-check" name="persoonsgegevens" id="persoonsgegevens2" autocomplete="off">
  <label class="btn btn-outline-dark" for="persoonsgegevens2">Naam</label>
</div>
<div class="clearfix"></div>
<br>
<input type="radio" class="btn-check" name="persoonsgegevens" id="persoonsgegevens3" autocomplete="off">
<label class="btn btn-outline-dark w-100" for="persoonsgegevens3">Verified by IRMA</label>
-->

<div class="multi-input">
  <div class="form-check">
    <input class="form-check-input" type="radio" name="persoonsgegevens" id="persoonsgegevens1" value="anoniem">
    <label class="form-check-label" for="persoonsgegevens1">
      Anoniem
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="persoonsgegevens" id="persoonsgegevens2" value="mijn">
    <label class="form-check-label" for="persoonsgegevens2">
      Naam
    </label>
  </div>
  <br>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="persoonsgegevens" id="persoonsgegevens3" value="door IRMA geverifieerde"<?= $is_authenticated ? ' checked="checked"' : '' ?>>
    <label class="form-check-label" for="persoonsgegevens3">
      Geverifieerd door IRMA
    </label>
  </div>
</div>

<div id="velden_anoniem" class="d-none">
  <div class="clearfix"></div>
  <br>
  <div class="mb-3">
    <label for="naam" class="form-label">Pseudoniem (optioneel)</label>
    <input type="text" name="alias" class="form-control" id="pseudoniem" placeholder="Pseudoniem">
  </div>
</div>

<div id="velden_naam" class="d-none">
  <div class="clearfix"></div>
  <br>
  <div class="mb-3">
    <label for="naam" class="form-label">Naam (verplicht)</label>
    <input type="text" name="name" class="form-control" id="naam" placeholder="Naam">
  </div>
</div>
  
<div id="velden_algemeen"<?= $is_authenticated ? '' : ' class="d-none"' ?>>
  <div class="mb-3">
    <label for="contact" class="form-label">Jouw contactgegevens (optioneel)</label>
    <input type="text" name="contact_info" class="form-control" id="contact" placeholder="E-mail en/of internetadres" value="<?= !empty($_POST['contact_info']) ? htmlspecialchars($_POST['contact_info']) : '' ?>">
  </div>
</div>

<div class="text-center">
  <br>
<?php if($is_authenticated): ?>
  <button id="step2_button_next" class="btn btn-primary d-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" disabled>
    Ga verder
  </button>
  <button id="irma_button" class="btn btn-primary">
    Ga verder
  </button>
<?php else: ?>
  <button id="step2_button_next" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" disabled>
    Ga verder
  </button>
  <button id="irma_button" class="btn btn-primary d-none">
    Ga verder
  </button>
<?php endif; ?>
</div>