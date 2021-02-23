<?php
abstract class FormulaireMAJ {
	abstract public function Afficher();

	protected function DébutFormulaire($identifiantFormulaire) {
?>
	<tr>
		<td colspan="2" id="<?=$identifiantFormulaire?>">
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
		$this->DébutFormulaire('MAJEntier');
		$this->Input($this->nom, 'number', $this->valeurParDéfaut, 'min="0"');
		$this->FinFormulaire();
	}
}

class MAJPourcentage extends FormulaireMAJ {
	public function __construct($nom, $valeurParDéfaut) {
		$this->nom = $nom;
		$this->valeurParDéfaut = $valeurParDéfaut;
	}
	public function Afficher() {
		$this->DébutFormulaire('MAJPourcentage');
		$this->Input($this->nom, 'number', $this->valeurParDéfaut, 'min="0" max="100"');
		$this->FinFormulaire();
	}
}

class MAJDurée extends FormulaireMAJ {
	public function __construct($nom, $valeurParDéfaut) {
		$this->nom = $nom;
		$this->valeurParDéfaut = $valeurParDéfaut;
	}
	public function Afficher() {
		$this->DébutFormulaire('MAJDurée');
		$this->Input('jour',	'number', (int)($this->valeurParDéfaut/86400) , 'min="0"', 'jour','jour');
		$this->Input('heure',	'number', (int)($this->valeurParDéfaut/3600) % 24, 'min="0" max="23"', 'heure','heure');
		$this->Input('minute',	'number', (int)($this->valeurParDéfaut/60) % 60, 'min="0" max="59"' ,'minute','minute');
		$this->FinFormulaire();
	}
}
