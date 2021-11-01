<p class="text-black">In this initial step we will generate a unique identification number for your file and categorize the file type.</p>
<!--
<div class="btn-group btn-group-vertical w-100" role="group" aria-label="Bestandstype">
  <input type="radio" class="btn-check" name="bestandstype" id="bestandstype1" autocomplete="off" checked>
  <label class="btn btn-outline-dark" for="bestandstype1">Beeld</label>

  <input type="radio" class="btn-check" name="bestandstype" id="bestandstype2" autocomplete="off">
  <label class="btn btn-outline-dark" for="bestandstype2">Geluid</label>

  <input type="radio" class="btn-check" name="bestandstype" id="bestandstype3" autocomplete="off">
  <label class="btn btn-outline-dark" for="bestandstype3">Tekst</label>
</div>
-->
<div class="multi-input">
  <div class="form-check">
    <input class="form-check-input" type="radio" name="bestandstype" id="bestandstype1" value="beeld"<?= empty($_POST['bestandstype']) || !in_array($_POST['bestandstype'], ['geluid', 'tekst']) ? ' checked="checked"' : '' ?>>
    <label class="form-check-label" for="bestandstype1">
    Visual
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="bestandstype" id="bestandstype2" value="geluid"<?= !empty($_POST['bestandstype']) && $_POST['bestandstype'] == 'geluid' ? ' checked="checked"' : '' ?>>
    <label class="form-check-label" for="bestandstype2">
    Audio
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="bestandstype" id="bestandstype3" value="tekst"<?= !empty($_POST['bestandstype']) && $_POST['bestandstype'] == 'tekst' ? ' checked="checked"' : '' ?>>
    <label class="form-check-label" for="bestandstype3">
    Text
    </label>
  </div>
</div>

<div class="text-center">
  <br>
  <button id="step1_button_next" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    Next
  </button>
</div>
