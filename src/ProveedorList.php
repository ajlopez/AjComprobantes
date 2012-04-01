<?
	$Page->Title = 'Proveedores';


	include_once('./Security.inc.php');
	include_once($Page->Prefix . 'ajfwk/Database.inc.php');
	include_once($Page->Prefix . 'ajfwk/Tables.inc.php');
	include_once($Page->Prefix . 'ajfwk/Pages.inc.php');
	include_once($Page->Prefix . 'ajfwk/Session.inc.php');

	include_once($Page->Prefix . 'includes/Enumerations.inc.php');
	include_once($Page->Prefix . 'includes/ProveedorFunctions.inc.php');
	include_once($Page->Prefix . 'includes/EmpresaFunctions.inc.php');

	SessionPut('ProveedorLink',PageCurrent());

	DbConnect();

	$rs = ProveedorGetListView();

	$titles = array('Id', 'Nombre', 'Empresa');

	include_once($Page->Prefix . 'includes/Header.inc.php');
?>

<center>

<p>
<a href="ProveedorForm.php">New Proveedor...</a>
<p>

<?		
	TableOpen($titles,"98%");

	while ($reg=DbNextRow($rs)) {
		RowOpen();
		DatumLinkGenerate($reg['Id'],"ProveedorView.php?Id=".$reg['Id']);
		DatumGenerate($reg['Nombre']);
		$ColumnDescription = EmpresaTranslate($reg['IdEmpresa']);
		DatumLinkGenerate($ColumnDescription, "EmpresaView.php?Id=".$reg['IdEmpresa']);
		RowClose();
	}

	TableClose();
?>

</center>

<?
	include_once($Page->Prefix . 'includes/Footer.inc.php');
	DbDisconnect();
?>
