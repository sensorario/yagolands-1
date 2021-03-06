<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/standard.css" />
    <link rel="stylesheet" type="text/css" href="css/yago.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-script-type" content="text/javascript" />
    <title><?php echo $this->pageTitle; ?></title>
    <?php if ($this->controller == 'site'): ?>
      <?php if ($this->action != 'login'): ?>
        <script src="javascript/jquery.js"></script>
        <script src="javascript/jquery.the_final_countdown.js"></script>
        <script src="javascript/yago.js"></script>
      <?php endif; ?>
    <?php endif; ?>

  </head>
  <body>
    <div id="porta-header">
      <div id="fascia-header">
        <img src="images/loghi/yagolands.png" />
      </div>
    </div>
    <div class="titolo-pagina arial size14px">
      Le terre di yago
    </div>
    <div class="menu-pagina arial size14px">
      <?php if (UtenteWeb::status()->isAutenticato()): ?>
        <strong><?php echo UtenteWeb::status()->user->username; ?></strong> &raquo;
        <?php $this->echolink(array('page' => 'site/manageusers', 'label' => 'Gestione Utenti', 'visible' => $this->can('manageusers'), 'append' => '  &raquo;')); ?>
        <?php $this->echolink(array('page' => 'stats/stats', 'label' => 'Classifica', 'visible' => $this->can('viewstat'), 'append' => '  &raquo;')); ?>
        <?php $this->echolink(array('page' => 'site/vista', 'label' => 'Mappa')); ?>  &raquo;
        <?php $this->echolink(array('page' => 'site/logout', 'label' => 'Logout')); ?>  &raquo;
        <?php $this->echolink(array('label' => 'Cambia password', 'page' => 'utenti/cambiapassword')); ?>
      <?php else: ?>
        Entra nel mondo di yago!
      <?php endif; ?>
    </div>
    <?php if (UtenteWeb::status()->isAutenticato()): ?>
    <div class="center ElencoDelleRisorse">

        <?php $costruzione = new MCostruzioni(); ?>

        <img src="../../images/celle/8.svg" height="24" /> <span id="ferro"></span> /
        <?php echo Config::moltiplicatoreCapienzaEdificio($costruzione->getLivello(4)) ?>
        (<?php echo Config::risorseAllOra($costruzione->getLivello(8)) ?>/h)

        <img src="../../images/celle/10.svg" height="24" /> <span id="legno"></span> /
        <?php echo Config::moltiplicatoreCapienzaEdificio($costruzione->getLivello(4)) ?>
        (<?php echo Config::risorseAllOra($costruzione->getLivello(10)) ?>/h)

        <img src="../../images/celle/9.svg" height="24" /> <span id="roccia"></span> /
        <?php echo Config::moltiplicatoreCapienzaEdificio($costruzione->getLivello(4)) ?>
        (<?php echo Config::risorseAllOra($costruzione->getLivello(9)) ?>/h)

        <img src="../../images/celle/7.svg" height="24" /> <span id="grano"></span> /
        <?php echo Config::moltiplicatoreCapienzaEdificio($costruzione->getLivello(5)) ?>
        (<?php echo Config::risorseAllOra($costruzione->getLivello(7)) ?>/h)

      </div>
    <?php endif; ?>
    <div id="contenitore">
      <?php echo $content; ?>
      <div id="side-left" class="testoverde arial size12px">
        <?php if (UtenteWeb::status()->isAutenticato()): ?>
          <h2>Cosa stai addestrando</h2>
          <div id="coda-addestramenti"></div>
          <h2>Le tue truppe</h2>
          <div id="mytroops"></div>
          <h2>Azioni belliche</h2>
          <div id="azioni-belliche"></div>
        <?php endif; ?>
      </div>
      <div id="side-right" class="testoverde arial size12px">
        <?php if (UtenteWeb::status()->isAutenticato()): ?>
          <?php if (@UtenteWeb::status()->user->createplace): ?>
            <div id="createplace"></div>
          <?php endif; ?>
          <h1>Edifici</h1>
          <div id="buildable"></div>
          <div id="coda-lavori"></div>
          <h2>I tuoi Edifici</h2>
          <div id="mybuildings"></div>
        <?php endif; ?>
      </div>
    </div>
  </body>
</html>