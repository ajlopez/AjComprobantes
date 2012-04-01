<?
	$Page->Title = 'Empresa';

	include_once('./Security.inc.php');
	include_once($Page->Prefix.'ajfwk/GetParameters.inc.php');
	include_once($Page->Prefix.'ajfwk/Database.inc.php');
	include_once($Page->Prefix.'ajfwk/Errors.inc.php');
	include_once($Page->Prefix.'ajfwk/Pages.inc.php');
	include_once($Page->Prefix.'ajfwk/Session.inc.php');
	include_once($Page->Prefix.'ajfwk/Forms.inc.php');
	include_once($Page->Prefix.'ajfwk/Tables.inc.php');
	include_once($Page->Prefix.'ajfwk/Translations.inc.php');

	include_once($Page->Prefix.'includes/Enumerations.inc.php');
	include_once($Page->Prefix.'includes/EmpresaFunctions.inc.php');
	include_once($Page->Prefix.'includes/ProveedorFunctions.inc.php');
	include_once($Page->Prefix.'includes/ClienteFunctions.inc.php');

	DbConnect();
	
	SessionPut('EmpresaLink',PageCurrent());


	if (!isset($Id))
		PageExit();

	$rs = EmpresaGetById($Id);
	$Nombre = $rs['Nombre'];


	include_once($Page->Prefix.'includes/Header.inc.php');
?>

<center>

<p>
<a href="EmpresaList.php">Empresas</a>
&nbsp;
&nbsp;
<a href="EmpresaForm.php?Id=<? echo $Id; ?>">Update</a>
&nbsp;
&nbsp;
<a href="EmpresaDelete.php?Id=<? echo $Id; ?>">Delete</a>
</p>

<p>

<table cellspacing=1 cellpadding=2 class="form" width="80%">
<?
	FieldStaticGenerate("Id",$Id);
	FieldStaticGenerate("Nombre",$Nombre);
?>
</table>


</center>

<center>
<h2>Proveedores</h2>

<?
	$rsProveedores = ProveedorGetByEmpresa($Id);

	$titles = array('Id', 'Nombre');

	TableOpen($titles,"98%");

	while ($reg=DbNextRow($rsProveedores)) {
		RowOpen();
		DatumLinkGenerate($reg['Id'],"ProveedorView.php?Id=".$reg['Id']);
		DatumGenerate($reg['Nombre']);
		RowClose();
	}


	TableClose();	

	DbFreeResult($rsProveedores);
?>
<center>
<h2>Clientes</h2>

<?
	$rsClientes = ClienteGetByEmpresa($Id);

	$titles = array('Id', 'Nombre');

	TableOpen($titles,"98%");

	while ($reg=DbNextRow($rsClientes)) {
		RowOpen();
		DatumLinkGenerate($reg['Id'],"ClienteView.php?Id=".$reg['Id']);
		DatumGenerate($reg['Nombre']);
		RowClose();
	}


	TableClose();	

	DbFreeResult($rsClientes);
?>

<?
	DbDisconnect();
	include_once($Page->Prefix.'includes/Footer.inc.php');
?>
