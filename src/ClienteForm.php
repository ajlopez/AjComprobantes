<?
	$Page->Title = 'Actualiza Cliente';

	include_once('./Security.inc.php');
	include_once($Page->Prefix.'ajfwk/GetParameters.inc.php');
	include_once($Page->Prefix.'ajfwk/Database.inc.php');
	include_once($Page->Prefix.'ajfwk/Errors.inc.php');
	include_once($Page->Prefix.'ajfwk/Pages.inc.php');
	include_once($Page->Prefix.'ajfwk/Forms.inc.php');
	include_once($Page->Prefix.'ajfwk/Translations.inc.php');

	include_once($Page->Prefix.'includes/Enumerations.inc.php');
	include_once($Page->Prefix.'includes/ClienteFunctions.inc.php');

	DbConnect();
	
	if (!ErrorHas() && isset($Id)) {
		$rs = ClienteGetById($Id);
		$Nombre = $rs['Nombre'];
		$IdEmpresa = $rs['IdEmpresa'];

		$IsNew = 0;
	}	
	else if (isset($Id))
		$IsNew = 0;
	else {
		$Page->Title = "Nuevo Cliente";
		$IsNew = 1;
	}

	$rsIdEmpresa = TranslateQuery("$Cfg[SqlPrefix]empresas","Nombre as Nombre");

	include_once($Page->Prefix.'includes/Header.inc.php');
?>

<center>

<p>
<a href="ClienteList.php">Clientes</a>
&nbsp;
&nbsp;
<?
	if (!$IsNew) {
?>
<a href="ClienteView.php?Id=<? echo $Id; ?>">Cliente</a>
&nbsp;
&nbsp;
<?
	}
?>
</p>


<?
	ErrorRender();
?>

<p>

<form action="ClienteUpdate.php" method=post>

<table cellspacing=1 cellpadding=2 class="form">
<?
	if (!$IsNew)
		FieldStaticGenerate("Id",$Id);

	FieldTextGenerate("Nombre","Nombre",$Nombre,30,False);
	FieldComboRsGenerate("IdEmpresa","Empresa",$rsIdEmpresa,$IdEmpresa,"Id","Nombre",false,False);

	FieldOkGenerate();
?>
</table>

<?
	if (!$IsNew)
		FieldIdGenerate($Id);
?>

</form>

</center>

<?
	DbDisconnect();
	include_once($Page->Prefix.'includes/Footer.inc.php');
?>
