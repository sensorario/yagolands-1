<h1><?php echo $this->nomeEdificio; ?></h1>

<div class="paragrafo-edificio">In questo edificio si possono addestrare le truppe del tuo villaggio.</div>

<?php
/**
 * @todo inventarsi il model di contesto
 */
$truppe = new MTruppe;
$edifici = new MEdifici;
$costruzioni = new MCostruzioni;

$this->modelTruppe = $truppe->findAll ();
$risorseUtente = Config::getRisorseUtente ();
?>


<table>
  <tr>
    <th>truppa</th>
    <th>ferro</th>
    <th>grano</th>
    <th>legno</th>
    <th>roccia</th>
    <th>max</th>
    <th>quantita</th>
    <th>azione</th>
  </tr>
  <?php foreach ( $this->modelTruppe as $itemTruppe ) : ?>
    <?php
    $idutente = UtenteWeb::status ()->user->id;
    $idedificio = $itemTruppe['idedificiodipendente'];
    $livello = $itemTruppe['livelloedificiodipendente'];
    ?>
    <?php if ( $costruzioni->exists ( $idutente, $idedificio, $livello ) ) : ?>
      <tr>
        <td><?php echo $itemTruppe['nome']; ?></td>
        <td><?php echo $itemTruppe['ferro']; ?></td>
        <td><?php echo $itemTruppe['grano']; ?></td>
        <td><?php echo $itemTruppe['legno']; ?></td>
        <td><?php echo $itemTruppe['roccia']; ?></td>
        <td><input type="hidden" value="<?php echo $itemTruppe['id']; ?>" id="unity_id_<?php echo $itemTruppe['id']; ?>" /><div class="autofill" id="_id_<?php echo $itemTruppe['id']; ?>"><?php
    /**
     * Tirarlo fuori da qui e creare una funzione ad oc
     */
    $massimoRapporto = 0;
    $arrayRapporti = array ( );
    foreach ( Config::getArrayRisorse () as $item ) {
      $arrayRapporti[] .= ( (int) ( (int)$risorseUtente[$item] / (int) $itemTruppe[$item]));
    }
    echo min ( $arrayRapporti );
      ?></div></td>
        <td><input type="text" class="texttruppe" id="txt_id_<?php echo $itemTruppe['id']; ?>" /></td>
        <td>
          <button class="btn_trains" id="id_<?php echo $itemTruppe['id']; ?>">addestra</button>
        </td>
      </tr>
  <?php endif; ?>
  <?php endforeach; ?>
</table>