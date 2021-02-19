<?php
abstract class ChampFormulaire {
	abstract public function Afficher();
	abstract public function Traiter();

	protected $champ; // nom du champ
	protected $valeurParDéfaut;

	protected function Input($texte, $type, $valeurParDéfaut, $autres_paramètres ='', $id = 'champ' ,$name = 'champ')  {
?>
			<label for="<?=$id?>"><?=$texte?> :</label>
			<input type="<?=$type?>" id="<?=$id?>" name="<?=$name?>" value="<?=$valeurParDéfaut?>" <?=$autres_paramètres?> required><br>
<?php
	}
}

class ChampEntier extends ChampFormulaire {
	public function __construct($nom, $valeurParDéfaut) {
		$this->nom = $nom;
		$this->valeurParDéfaut = $valeurParDéfaut;
	}
	public function Afficher() {
		$this->Input($this->nom, 'number', $this->valeurParDéfaut);
	}
	public function Traiter() {}
}

