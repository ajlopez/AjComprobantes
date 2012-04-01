<?
	$Page->Title = 'Actualiza Empresa';

	include_once('./Security.inc.php');
	include_once($Page->Prefix.'ajfwk/GetParameters.inc.php');
	include_once($Page->Prefix.'ajfwk/Database.inc.php');
	include_once($Page->Prefix.'ajfwk/Errors.inc.php');
	include_once($Page->Prefix.'ajfwk/Pages.inc.php');
	include_once($Page->Prefix.'ajfwk/Forms.inc.php');
	include_once($Page->Prefix.'ajfwk/Translations.inc.php');

	include_once($Page->Prefix.'includes/Enumerations.inc.php');
	include_once($Page->Prefix.'includes/EmpresaFunctions.inc.php');

	DbConnect();
	
	if (!ErrorHas() && isset($Id)) {
		$rs = EmpresaGetById($Id);
		$Nombre = $rs['Nombre'];

		$IsNew = 0;
	}	
	else if (isset($Id))
		$IsNew = 0;
	else {
		$Page->Title = "Nuevo Empresa";
		$IsNew = 1;
	}


	include_once($Page->Prefix.'includes/Header.inc.php');
?>

<center>

<p>
<a href="EmpresaList.php">Empresas</a>
&nbsp;
&nbsp;
<?
	if (!$IsNew) {
?>
<a href="EmpresaView.php?Id=<? echo $Id; ?>">Empresa</a>
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

<form action="EmpresaUpdate.php" method=post>

<table cellspacing=1 cellpadding=2 class="form">
<?
	if (!$IsNew)
		FieldStaticGenerate("Id",$Id);

	FieldTextGenerate("Nombre","Nombre",$Nombre,30,False);

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
