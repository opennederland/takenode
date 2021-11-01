<!DOCTYPE html>
<html lang="<?= $language ?>">
  <head>
    <?php include 'parts/head-meta.php' ?>
    <title>TakeNode | Spread the Word</title>
  </head>
  <body class="<?= $activepage ?>">
    <?php include 'parts/header.php' ?>
    <main>
      <main>
        <section class="mod-pageheader d-flex align-items-center bg-blue text-white">
          <div class="container">
            <div class="row">
              <div class="col-lg-5 offset-lg-1 col-xl-4 offset-xl-1">
                <h1 class="h2"> Register your creative intentions with TAKENODE.org </h1>
              </div>
              <div class="col-lg-5 offset-lg-0 col-xl-4 offset-xl-2">
                <p>Do you like our initiative? Help us by sharing TakeNode with your family, friends  and colleagues. Use (parts of) our statements below, create an unique TakeNode profile picture, download our social media kit etc. Do you have a better idea? Let us know, we are all ears: <a href="mailto:takenode@opennederland.nl" target="_blank">takenode@opennederland.nl</a></p>
              </div>
            </div>
          </div>
        </section>
        <section class="mod-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                <div class="mb-5">
                  <div class="row">
                    <div class="col-md">
                      <img src="<?= BASE_URL ?>assets/img/spread-the-word1.png" class="spread-the-word">
                    </div>
                    <div class="col-md">
                      <h4> #1 </h4>
                      <h2 class="text-blue mb-4">TakeNode.org empowers creators</h2>
                      <p>
Is it a tool?  Platform? App? TakeNode is an online wizard helping content creators to protect their creative work before it's uploaded to the internet. It allows creators to speak up about their intention to share.</p>
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                  <div class="row">
                    <div class="col-md">
                      <h4> #2 </h4>
                      <h2 class="text-blue mb-4">EU Law, created and enforced</h2>
                      <p>The Directive on Copyright in the Digital Single Market forces digital platforms to rethink the onboarding process of creative content. Instead of major platforms blocking more content and frustrating creatives we offer a more balanced, fair, alternative: TakeNode.org </p>
                    </div>
                    <div class="col-md order-first order-md-last">
                      <img src="<?= BASE_URL ?>assets/img/spread-the-word2.png" class="spread-the-word">
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                  <div class="row">
                    <div class="col-md">
                      <img src="<?= BASE_URL ?>assets/img/spread-the-word3.png" class="spread-the-word">
                    </div>
                    <div class="col-md">
                      <h4> #3 </h4>
                      <h2 class="text-blue mb-4">Sharing is inseparably linked to "the internet"</h2>
                      <p>Our world uses open (Creative Commons) licenses to accelerate social, scientific and creative growth. We need to protect our right to share. TakeNode.org registers unique and crucial information about your work before you hit the upload button on your favorite platform. TakeNode gives creators a powerful voice: Share my work, it's okay!</p>
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                  <div class="row">
                    <div class="col-md">
                      <h4> #4 </h4>
                      <h2 class="text-blue mb-4">Law is never sexy but can we make it clear?</h2>
                      <p>Copyright law, Terms of Use, content license agreements. Boring! Most people will only pay attention when a red flag lands in their mailbox. TakeNode.org will promote digital platforms willing to give creatives around the world the tools they need to share freely.</p>
                    </div>
                    <div class="col-md order-md-last">
                      <img src="<?= BASE_URL ?>assets/img/spread-the-word4.png" class="spread-the-word">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php include 'parts/'.$language.'/share.php' ?>
          </div>
        </section>
      </main>
    </main>
    <?php include 'parts/'.$language.'/footer.php' ?>
    <script src="<?= BASE_URL ?>assets/js/main-min.js?<?= VERSION ?>" type="text/javascript"></script>
  </body>
</html>