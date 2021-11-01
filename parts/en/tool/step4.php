<div id="certificate_spinner">
  <h1 class="w-100 text-center"><i class="fal fa-spinner fa-pulse"></i></h1>
</div>
<div id="result" class="d-none">
  <div class="takenodecertificate">
    <h6 class="text-black"> Your unique TakeNode Certificate </h6>
    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCertificate" aria-expanded="false" aria-controls="collapseCertificate">
      <i class="fal fa-chevron-down"></i>
    </button>
    <div class="collapse" id="collapseCertificate">
      <div class="card card-body bg-greylight altfont">
      </div>
    </div>
    <div class="d-none" id="certificate_text">
    </div>
  </div>
  <div class="btn-group w-100 mb-3">
    <a id="download_button" href="" class="btn btn-outline-primary w-50"><i class="fal fa-arrow-alt-to-bottom"></i> Download </a>
    <button id="copy_button" type="button" class="btn btn-outline-primary w-50"><i class="fal fa-clipboard"></i> Copy </button>
  </div><br>
  <br>

  <h6 class="text-black"> Publish your certificate </h6>
  <p class="text-black"> Would you like to add your unique certificate to our public, online register? With one click we will generate a unique, permanent link for you. </p>
  <button id="generateurl" type="button" class="btn w-100 btn-primary mb-3" data-bs-toggle="collapse" href="#collapseURL" role="button" data-csrf_token="<?= htmlspecialchars($csrf_token) ?>" aria-expanded="false" aria-controls="collapseExample">
    Publish
  </button>
  <div class="collapse" id="collapseURL">
    <div class="card bg-blue text-white">
      <div class="card-body">
        <a id="permanent_url_link" href="" target="_blank"></a>
      </div>
    </div>
    <div class="btn-group w-100 mb-3">
      <button id="copy_link_button" type="button" class="btn btn-outline-primary w-50"><i class="fal fa-clipboard"></i> Copy URL</button>
      <a id="mail_url_link" href="" class="btn btn-outline-primary w-50"><i class="fal fa-envelope"></i> Mail URL </a>
    </div>
  </div>

  <div class="clearfix"></div><br>

  <div class="text-dark">
    <h6> Create another TakeNode? </h6>
    <p>
      Go for it! Use our wizard as much as you like to protect your creative work before uploading to YouTube, Vimeo, Flickr, Facebook, etc.
    </p>
  </div>

  <a class="btn btn-outline-primary w-100" href="<?= BASE_URL ?>">
    New TakeNode
  </a>
</div>