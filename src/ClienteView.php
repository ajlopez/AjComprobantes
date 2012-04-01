<?
	$Page->Title = 'Cliente';

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
	include_once($Page->Prefix.'includes/ClienteFunctions.inc.php');

	DbConnect();
	
	SessionPut('ClienteLink',PageCurrent());


	if (!isset($Id))
		PageExit();

	$rs = ClienteGetById($Id);
	$Nombre = $rs['Nombre'];
	$IdEmpresa = $rs['IdEmpresa'];

	$TranslationIdEmpresa = "<a href='EmpresaView.php?Id=".$IdEmpresa. "'>".TranslateDescription("$Cfg[SqlPrefix]empresas",$IdEmpresa,"Nombre","Id")."</a>";

	include_once($Page->Prefix.'includes/Header.inc.php');
?>

<center>

<p>
<a href="ClienteList.php">Clientes</a>
&nbsp;
&nbsp;
<a href="ClienteForm.php?Id=<? echo $Id; ?>">Update</a>
&nbsp;
&nbsp;
<a href="ClienteDelete.php?Id=<? echo $Id; ?>">Delete</a>
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
