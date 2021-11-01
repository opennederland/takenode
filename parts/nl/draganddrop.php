<div class="dragandrop">
  <div class="backgroundimage vh-100 d-flex align-items-center">
    <div class="creator altfont">
      Image by <span id="creator_name"></span> |
      TakeNode ID: <a href="#" id="image_takenode_id" data-base_url="<?= BASE_URL ?>" target="_blank"></a>
    </div>
    <div class="container">
      <div class="uploadyourwork">
        <div class="card bg-white">
          <div class="card-body">
            <div id="hash_spinner" class="d-flex align-items-center d-none">
              <h1 class="w-100 text-center"><i class="fal fa-spinner fa-pulse"></i></h1>
            </div>
            <form id="myAwesomeDropzone" action="#" class="dropzone d-flex align-items-center">
              <div class="fallback">
                <input name="file" type="file" multiple />
              </div>
              <div class="row g-0">
                <div class="col-3 d-flex align-items-center">
                  <div class="plus">+</div>
                </div>
                <div class="col-9">
                  <div class="dropzonecontent">
                    <h4 class="text-blue"> 
                      <span class="nohover">Start hier met het selecteren van je bestand.</span>
                      <span class="hover">Sleep je bestand in dit venster.</span>
                    </h4>
                    <p class="mb-0">Bescherm je werk met een unieke code in minder dan een minuut.</p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>