<?php
class Commerce extends LigneTableau {

public function __construct() {
	$this->table = 'commerce';
	$this->nomChampID = 'marchandise_ID';
	$this->IDmin = 3;
	$this->IDmax = 60;
	$this->T_paramètres = array();
	parent::__construct();
}

public function AfficherFormulaireMAJ() {
}

public function TraiterFormulaireMAJ() {

}

public function Besoins() {
?>
	<h1>Liste des besoins avec achats et ventes &agrave; pr&eacute;voir</h1>
	<p>marchandise - quantité - date</p>
<?php
}

public function LesCours() {
?>
	<h1>Les cours</h1>
	<p>Date de d&eacute;but : et date de fin : -</p>
	<p>Cours d&apos;&eacute;volution en construction</p>
<?php
}

public function StatsMarché() {
?>
	<h1>Statistiques du march&eacute;</h1>
	<p>Les diagrammes ci-dessous montre le rapport entre l&apos;ench&egrave;re la plus &eacute;lev&eacute;e et le cours du ki-market.</p>
	<p><a href="https://fr.wikipedia.org/wiki/Bo%C3%AEte_%C3%A0_moustaches" title="Page Wikip&eacute;dia dans un nouvel onglet" target="_blank">Rappel sur les diagrammes en bo&icirc;tes ou &agrave; moustaches</a></p>
	<h2>Suivant l&apos;heure de la journ&eacute;e</h2>
	<p>En construction</p>
	<h2>Suivant le jour de la semaine</h2>
	<p>En construction</p>
<?php
}

public function AfficherRapport($nbColonne) {
	$this->DébutRapport($nbColonne);
	$this->Besoins();
	$this->LesCours();
	$this->StatsMarché();
?>
	<h1>Divers ...</h1>
<?php
	echo $this->UtilePour($this->ID);
	echo $this->Obtenir($this->ID);
	$this->FinRapport();
}

}
