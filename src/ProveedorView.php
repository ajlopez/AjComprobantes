<?
	$Page->Title = 'Proveedor';

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
	include_once($Page->Prefix.'includes/ProveedorFunctions.inc.php');

	DbConnect();
	
	SessionPut('ProveedorLink',PageCurrent());


	if (!isset($Id))
		PageExit();

	$rs = ProveedorGetById($Id);
	$Nombre = $rs['Nombre'];
	$IdEmpresa = $rs['IdEmpresa'];

	$TranslationIdEmpresa = "<a href='EmpresaView.php?Id=".$IdEmpresa. "'>".TranslateDescription("$Cfg[SqlPrefix]empresas",$IdEmpresa,"Nombre","Id")."</a>";

	include_once($Page->Prefix.'includes/Header.inc.php');
?>

<center>

<p>
<a href="ProveedorList.php">Proveedores</a>
&nbsp;
&nbsp;
<a href="ProveedorForm.php?Id=<? echo $Id; ?>">Update</a>
&nbsp;
&nbsp;
<a href="ProveedorDelete.php?Id=<? echo $Id; ?>">Delete</a>
</p>

<p>

<table cellspacing=1 cellpadding=2 class="form" width="80%">
<?
	FieldStaticGenerate("Id",$Id);
	FieldStaticGenerate("Nombre",$Nombre);
	FieldStaticGenerate("Empresa",$TranslationIdEmpresa);
?>
</table>


</center>


<?
	DbDisconnect();
	include_once($Page->Prefix.'includes/Footer.inc.php');
?>
