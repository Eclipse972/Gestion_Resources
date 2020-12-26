<?php
class Commerce extends LigneTableau {

public function __construct() {
	$this->table = 'commerce';
	$this->nomChampID = 'marchandise_ID';
	$this->onglet = 'commerce';
	$this->IDmin = 3;
	$this->IDmax = 60;
}

public function AfficherRapport() {
?>
	<h1>Liste des besoins avec achats et ventes &agrave; pr&eacute;voir</h1>
	<p></p>
	<h1>Divers</h1>
<?php
	echo $this->UtilePour($Tvariables['ID']);
	echo $this->Obtenir($Tvariables['ID']);
}

}
