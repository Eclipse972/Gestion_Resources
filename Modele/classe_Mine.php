<?php
class Mine extends LigneTableau {

public function __construct() {
	$this->table = 'mine';
	$this->nomChampID = 'type_mine_ID';
	$this->onglet = 'mines';
	$this->IDmin = 0;
	$this->IDmax = 14;
	parent::__construct();
}

public function AfficherRapport() {
?>
	<h1>En construction</h1>
	<h1>Divers ...</h1>
<?=$this->UtilePour($this->ID + 2); // marchandise_ID = type_usine_ID +2 pour le moment?>
	</a>
<?php
}

}
