<?
	$Page->Title = 'Empresas';


	include_once('./Security.inc.php');
	include_once($Page->Prefix . 'ajfwk/Database.inc.php');
	include_once($Page->Prefix . 'ajfwk/Tables.inc.php');
	include_once($Page->Prefix . 'ajfwk/Pages.inc.php');
	include_once($Page->Prefix . 'ajfwk/Session.inc.php');

	include_once($Page->Prefix . 'includes/Enumerations.inc.php');
	include_once($Page->Prefix . 'includes/EmpresaFunctions.inc.php');

	SessionPut('EmpresaLink',PageCurrent());

	DbConnect();

	$rs = EmpresaGetListView();

	$titles = array('Id', 'Nombre');

	include_once($Page->Prefix . 'includes/Header.inc.php');
?>

<center>

<p>
<a href="EmpresaForm.php">New Empresa...</a>
<p>

<?		
	TableOpen($titles,"98%");

	while ($reg=DbNextRow($rs)) {
		RowOpen();
		DatumLinkGenerate($reg['Id'],"EmpresaView.php?Id=".$reg['Id']);
		DatumGenerate($reg['Nombre']);
		RowClose();
	}

	TableClose();
?>

</center>

<?
	include_once($Page->Prefix . 'includes/Footer.inc.php');
	DbDisconnect();
?>
