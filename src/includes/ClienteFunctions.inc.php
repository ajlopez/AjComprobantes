<?

/*
 *	Functions
 * for Entity Cliente
 *
 */

	include_once($Page->Prefix.'ajfwk/Database.inc.php');
	include_once($Page->Prefix.'ajfwk/Translations.inc.php');

function ClienteGetById($Id) {
	global $Cfg;

	$sql = "select Id, Nombre, IdEmpresa from $Cfg[SqlPrefix]clientes where Id = $Id";

	$rs = DbExecuteQuery($sql);
	return DbNextRow($rs);
}

function ClienteGetList($where='',$order='') {
	global $Cfg;

	$sql = "select Id, Nombre, IdEmpresa from $Cfg[SqlPrefix]clientes";

	if ($where)
		$sql .= " where $where";
	if (!$order)
		$order = 'Id';
	$sql .= " order by $order";

	return DbExecuteQuery($sql);
}

function ClienteGetListView($where='',$order='') {
	global $Cfg;

	$sql = "select Id, Id, Nombre, IdEmpresa from $Cfg[SqlPrefix]clientes";

	if ($where)
		$sql .= " where $where";
	if (!$order)
		$order = 'Id';
	$sql .= " order by $order";

	return DbExecuteQuery($sql);
}

function ClienteGetView($where='',$order='') {
	global $Cfg;

}

//	function GetListBy...
//	function GetViewBy...

function ClienteInsert($Nombre, $IdEmpresa) {
	global $Cfg;

	$sql = "insert $Cfg[SqlPrefix]clientes set
		Nombre = '$Nombre',
		IdEmpresa = $IdEmpresa";

	DbExecuteUpdate($sql);

	return DbLastId();
}

function ClienteUpdate($Id, $Nombre, $IdEmpresa) {
	global $Cfg;

	$sql = "update $Cfg[SqlPrefix]clientes set
		Nombre = '$Nombre',
		IdEmpresa = $IdEmpresa where Id = $Id";

	DbExecuteUpdate($sql);
}

function ClienteDelete($Id) {
	global $Cfg;

	$sql = "delete from $Cfg[SqlPrefix]clientes where Id = $Id";
	DbExecuteUpdate($sql);
}

function ClienteTranslate($Id) {
	global $ClienteNames;
	global $Cfg;

	if ($ClienteNames[$Id])
		return $ClienteNames[$Id];

	$description = TranslateDescription("$Cfg[SqlPrefix]clientes",$Id,"Nombre");

	$ClienteNames[$Id] = $description;

	return $description;
}


function ClienteGetByEmpresa($IdEmpresa) {
	return ClienteGetList("IdEmpresa = $IdEmpresa");
}

?>
