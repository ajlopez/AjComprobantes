<?
	include_once('./Security.inc.php');
	include_once($Page->Prefix.'ajfwk/GetParameters.inc.php');
	include_once($Page->Prefix.'ajfwk/Database.inc.php');
	include_once($Page->Prefix.'ajfwk/PostParameters.inc.php');
	include_once($Page->Prefix.'ajfwk/Session.inc.php');
	include_once($Page->Prefix.'ajfwk/Errors.inc.php');
	include_once($Page->Prefix.'ajfwk/Validations.inc.php');
	include_once($Page->Prefix.'ajfwk/Pages.inc.php');

	DbConnect();

	if (ErrorHas()) {
		DbDisconnect();
		include('ClienteForm.php');
		exit;
	}

	if (empty($Id))
		$sql = "Insert";
	else
		$sql = "Update";

	$sql .= " $Cfg[SqlPrefix]clientes set
		Nombre = '$Nombre' , 
		IdEmpresa = $IdEmpresa 		";

	if (!empty($Id))
		$sql .= " where Id=$Id";

	DbExecuteUpdate($sql);

	DbDisconnect();

	$Link = SessionGet("ClienteLink");
	SessionRemove("ClienteLink");

	PageAbsoluteRedirect($Link);
	exit;
?>
