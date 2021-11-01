<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'parts/head-meta.php' ?>
    <title>TakeNode | Search</title>
  </head>
  <body class="<?= $activepage ?>">
    <?php include 'parts/header.php' ?>
    <main>
      <section class="mod-pageheader d-flex align-items-center bg-blue text-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 offset-lg-1 col-xl-4 offset-xl-1">
              <h1> Welkom! Leer meer over het mediabestand dat je online gevonden hebt. </h1>
            </div>
            <div class="col-lg-5 offset-lg-0 col-xl-4 offset-xl-2">
              <p> Waarschijnlijk ben je op deze pagina gekomen via de TakeNode verwijzing bij een online mediabron. Maar wie heeft het bestand geüpload? En wat mag ik ermee? Probeer eens een zoekopdracht op basis van het "TakeNode Certifcate ID" of "Unique File ID". Mogelijk hebben wij het antwoord op jouw vraag. </p>
            </div>
          </div>
        </div>
      </section>
      <section class="mod-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
              <form action="<?= BASE_URL.'lookup.php' ?>" method="get">
                <div class="input-group">
                  <input type="text" name="query" placeholder="Zoek op 'certificate ID' of 'unique file ID'" class="form-control me-3">
                  <input type="submit" value="Zoek" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-5">
            <div class="table-responsive col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <?php if(!empty($results)): ?>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">Datum</th>
                    <th scope="col">Type</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($results as $row): ?>
                  <tr>
                    <td><a href="<?= BASE_URL.'certificate.php?id='.htmlspecialchars($row->id) ?>"><?= htmlspecialchars($row->filename) ?></a></td>
                    <td><?= date('Y-m-d H:i:s', $row->updated_at) ?></td>
                    <td><?= ucfirst(htmlspecialchars(Helper::translate('file_type', $row->file_type))) ?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            <?php elseif(!empty($_GET['query'])): ?>
              Geen resultaten
            <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    </main>
    <?php include 'parts/'.$language.'/footer.php' ?>
    <script src="<?= BASE_URL ?>assets/js/main-min.js?<?= VERSION ?>" type="text/javascript"></script>
  </body>
</html>
