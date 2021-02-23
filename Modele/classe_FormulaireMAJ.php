<?php
abstract class FormulaireMAJ {
	abstract public function Afficher();
	abstract public function Traiter();

	protected $champ; // nom du champ
	protected $valeurParDéfaut;

	protected function DébutFormulaire() {
?>
	<tr>
		<td colspan="2" id="formulaireMAJ">
			<form method="post" action="?onglet=<?=$_SESSION['onglet']?>&id=<?=$_SESSION['id']?>&champ=<?=$_SESSION['champ']?>">
<?php
	}

	protected function FinFormulaire() {
?>
			<br><button type="submit">Valider</button><button type="reset">RAZ</button>
			</form>
		</td>
	</tr>
<?php
	}

	protected function Input($texte, $type, $valeurParDéfaut, $autres_paramètres ='', $id = 'champ' ,$name = 'champ')  {
?>
			<label for="<?=$id?>"><?=$texte?> :</label>
			<input type="<?=$type?>" id="<?=$id?>" name="<?=$name?>" value="<?=$valeurParDéfaut?>" <?=$autres_paramètres?> required>
<?php
	}
}

class MAJEntier extends FormulaireMAJ {
	public function __construct($nom, $valeurParDéfaut) {
		$this->nom = $nom;
		$this->valeurParDéfaut = $valeurParDéfaut;
	}
	public function Afficher() {
		$this->DébutFormulaire();
		$this->Input($this->nom, 'number', $this->valeurParDéfaut, 'min="0"');
		$this->FinFormulaire();
	}
	public function Traiter() {}
}

class MAJPourcentage extends FormulaireMAJ {
	public function __construct($nom, $valeurParDéfaut) {
		$this->nom = $nom;
		$this->valeurParDéfaut = $valeurParDéfaut;
	}
	public function Afficher() {
		$this->DébutFormulaire();
		$this->Input($this->nom, 'number', $this->valeurParDéfaut, 'min="0" max="100"');
		$this->FinFormulaire();
	}
	public function Traiter() {}
}

class MAJDurée extends FormulaireMAJ {
	public function __construct($nom, $valeurParDéfaut) {
		$this->nom = $nom;
		$this->valeurParDéfaut = $valeurParDéfaut;
	}
	public function Afficher() {
		$this->DébutFormulaire();
		$this->Input('jour',	'number', intdiv($this->valeurParDéfaut, 86400) , 'min="0"');
		$this->Input('heure',	'number', intdiv($this->valeurParDéfaut, 3600) % 24, 'min="0" max="23"');
		$this->Input('minute',	'number', intdiv($this->valeurParDéfaut, 60) % 60, 'min="0" max="60"');
		$this->FinFormulaire();
	}
	public function Traiter() {}
}
