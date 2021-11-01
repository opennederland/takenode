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
                <h1 class="h2"> Leg je creative intenties vast met TAKENODE.org. </h1>
              </div>
              <div class="col-lg-5 offset-lg-0 col-xl-4 offset-xl-2">
                <p>Kun je dit initiatief waarderen? Hieronder vind je digitale tools, afbeeldingen en teksten rondom TakeNode. Kies wat bij je past en deel je enthousiasme met je vrienden, familie en collega's. Heb je een geweldig idee waar wij nog niet aan gedacht hebben? Wij zijn een en al oor: <a href="mailto:takenode@opennederland.nl" target="_blank">takenode@opennederland.nl</a></p>
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
                      <h2 class="text-blue mb-4"> TakeNode.org geeft makers mogelijkheden</h2>
                      <p> Een digitale tool en registratieplatform voor contentmakers. Met een TakeNode registreer je het eigendomschap van je creatie. Tegelijk geef je aan hoe, waar en door wie je content gedeeld mag worden.</p>
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                  <div class="row">
                    <div class="col-md">
                      <h4> #2 </h4>
                      <h2 class="text-blue mb-4"> Europese wetgeving maakt het nodig</h2>
                      <p> In navolging van de EU copyrightwet (2021), moeten platforms kunnen aantonen dat alle gehoste content rechtmatig gedeeld wordt. Om boetes te vermijden grijpen ze snel in bij twijfels rondom copyright. TakeNode.org helpt om takedowns te voorkomen door eigenaarschap te registreren. </p>
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
                      <h2 class="text-blue mb-4"> Delen is deel van het internet-DNA</h2>
                      <p> Open 'Creative Commons' licenties maken meer dan twee miljard auteursrechtelijk beschermde werken toegankelijk. Dit is een belangrijke versneller van sociale, wetenschappelijke en creatieve ontwikkeling. TakeNode.org beschermt deze verworvenheid, door het makkelijk te maken om content te registeren en licentievoorwaarden te checken. </p>
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                  <div class="row">
                    <div class="col-md">
                      <h4> #4 </h4>
                      <h2 class="text-blue mb-4"> Duidelijkheid zorgt voor verbinding </h2>
                      <p> Voor makers is het belangrijk om servicevoorwaarden van platforms te begrijpen. Een flinke taak, want vaak zijn deze teksten ontoegankelijk opgesteld. TakeNode.org zal ervaringen delen rondom platforms die bereid zijn makers een stem te geven. </p>
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