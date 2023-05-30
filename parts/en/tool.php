<section class="mod-tool min-vh-100 vw-100">
  <div class="row g-0">
    <form id="tool_form" action="<?= BASE_URL ?>auth.php" method="post" autocomplete="off">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
      <input type="hidden" name="uuid" value="<?= $is_authenticated && !empty($id) ? $id : '' ?>">
      <input type="hidden" name="filename" value="<?= !empty($_POST['filename']) ? htmlspecialchars($_POST['filename']) : '' ?>">
      <input type="hidden" name="hash" value="<?= !empty($_POST['hash']) ? htmlspecialchars($_POST['hash']) : '' ?>">
      <div class="col-auto">
        <div class="tool min-vh-100 bg-white">
          <a class="closetool js-closetool" href="<?= BASE_URL ?>"><i class="fal fa-times"></i></a>
          <div class="accordion" id="accordionTool">
            <div class="accordion-item">
              <div class="accordion-header" id="headingOne">
                <button class="accordion-button<?= $is_authenticated ? '' : ' disabled' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="<?= $is_authenticated ? 'false' : 'true' ?>" aria-controls="collapseOne">
                <?php if($is_authenticated && !empty($_POST['bestandstype'])): ?>
                  <h5 class="mb-0">1. I'm registering <?= htmlspecialchars($_POST['bestandstype']) ?></h5>
                <?php else: ?>
                  <h5 class="mb-0">1. Is this the correct file type? </h5>
                <?php endif; ?>
                  <span class="d-none" id="registering_beeld">1. I'm registering a visual</span>
                  <span class="d-none" id="registering_geluid">1. I'm registering audio</span>
                  <span class="d-none" id="registering_tekst">1. I'm registering text</span>
                </button>
                <button type="button" class="btn-information" data-bs-toggle="modal" data-bs-target="#modal_bestandstype">
                  <i class="fal fa-info-circle"></i>
                </button>
              </div>
              <div id="collapseOne" class="accordion-collapse collapse<?= $is_authenticated ? '' : ' show' ?>" aria-labelledby="headingOne" data-bs-parent="#accordionTool">
                <div class="accordion-body">
                  <?php include 'parts/'.$language.'/tool/step1.php' ?>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed<?= $is_authenticated ? '' : ' disabled' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <?php if($is_authenticated): ?>
                  <h5 class="mb-0">2. I'm sending by Yivi verified personal details</h5>
                <?php else: ?>
                  <h5 class="mb-0">2. Add personal details?</h5>
                <?php endif; ?>
                  <span class="d-none" id="sending_anoniem">2. I'm sending personal data anonymously</span>
                  <span class="d-none" id="sending_mijn">2. I'm sending my personal data</span>
                </button>
                <button type="button" class="btn-information" data-bs-toggle="modal" data-bs-target="#modal_persoonsgegevens">
                  <i class="fal fa-info-circle"></i>
                </button>
              </div>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTool">
                <div class="accordion-body">
                  <?php include 'parts/'.$language.'/tool/step2.php' ?>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed disabled" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="<?= $is_authenticated ? 'true' : 'false' ?>" aria-controls="collapseThree">
                  <h5 class="mb-0"> 3. What are people allowed to do with your work? </h5>
                  <span class="d-none" id="permission_toestemming1">3. My work can be shared</span>
                  <span class="d-none" id="permission_toestemming2">3. My work can be shared and adapted</span>
                  <span class="d-none" id="permission_toestemming3">3. My work can be shared, even commercially</span>
                  <span class="d-none" id="permission_toestemming4">3. My work can be shared and adapted, even commercially</span>
                  <span class="d-none" id="permission_toestemming5">3. My work can not be used in any way without my written consent</span>
                </button>
                <button type="button" class="btn-information" data-bs-toggle="modal" data-bs-target="#modal_toestemming">
                  <i class="fal fa-info-circle"></i>
                </button>
              </div>
              <div id="collapseThree" class="accordion-collapse collapse<?= $is_authenticated ? ' show' : '' ?>" aria-labelledby="headingThree" data-bs-parent="#accordionTool">
                <div class="accordion-body">
                  <?php include 'parts/'.$language.'/tool/step3.php' ?>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed disabled" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <h5 class="mb-0"> 4. My #TakeNode </h5>
                </button>
                  <button type="button" class="btn-information" data-bs-toggle="modal" data-bs-target="#modal_mijntakenode">
                  <i class="fal fa-info-circle"></i>
                </button>
              </div>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionTool">
                <div class="accordion-body">
                  <?php include 'parts/'.$language.'/tool/step4.php' ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="col">
      <?php include 'parts/'.$language.'/draganddrop.php' ?>
    </div>
  </div>
</section>