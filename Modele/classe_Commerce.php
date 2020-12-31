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
	<p>marchandise - quantité - date</p>
	<a class="infobulle"><h1>Divers ...</h1>
	<span>
<?php
	echo $this->UtilePour($this->ID);
	echo $this->Obtenir($this->ID);
?>
	</span></a>
<?php
}

}
