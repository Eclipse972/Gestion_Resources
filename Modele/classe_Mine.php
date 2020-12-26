<?php
class Mine extends LigneTableau {

public function __construct() {
	$this->table = 'mine';
	$this->nomChampID = 'type_mine_ID';
	$this->onglet = 'mines';
	$this->IDmin = 0;
	$this->IDmax = 14;
}

public function HydraterRapport($T_paramètres) {
}

public function AfficherRapport() {
?>
	<h1>En construction</h1>
	<h1>Divers</h1>
<?php
///////////////////////////////////////////////
echo"joueur {$this->IDjoueur}\nID={$this->ID}";exit;
///////////////////////////////////////////////
	echo $this->UtilePour($this->ID);
}

}
