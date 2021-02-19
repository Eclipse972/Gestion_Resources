<?php
class Entrepot extends LigneTableau {

public function __construct() {
	$this->table = 'entrepot';
	$this->nomChampID = 'marchandise_ID';
	$this->onglet = 'entrepots';
	$this->IDmin = 2;
	$this->IDmax = 60;
	parent::__construct();
}

public function AfficherRapport() {
?>
	<h1>Les besoins</h1>
	<p>Tableau : nom - quantité - date<</p>

	<h1>Am&eacute;lioration</h1>
	<p>Cout pour passer au niveau supérieur</p>
	<h1>Divers ...</h1>
<?php
	echo $this->UtilePour($this->ID);
	echo $this->Obtenir($this->ID);
?>
	</a>
<?php
}

}
