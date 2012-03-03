<?

/*
 *	Functions
 * for Entity Proveedor
 *
 */

	include_once($Page->Prefix.'ajfwk/Database.inc.php');
	include_once($Page->Prefix.'ajfwk/Translations.inc.php');

function ProveedorGetById($Id) {
	global $Cfg;

	$sql = "select Id, Nombre, IdEmpresa from $Cfg[SqlPrefix]proveedores where Id = $Id";

	$rs = DbExecuteQuery($sql);
	return DbNextRow($rs);
}

function ProveedorGetList($where='',$order='') {
	global $Cfg;

	$sql = "select Id, Nombre, IdEmpresa from $Cfg[SqlPrefix]proveedores";

	if ($where)
		$sql .= " where $where";
	if (!$order)
		$order = 'Id';
	$sql .= " order by $order";

	return DbExecuteQuery($sql);
}


function ProveedorGetView($where='',$order='') {
	global $Cfg;

}

//	function GetListBy...
//	function GetViewBy...

function ProveedorInsert($Nombre, $IdEmpresa) {
	global $Cfg;

	$sql = "insert $Cfg[SqlPrefix]proveedores set
		Nombre = '$Nombre',
		IdEmpresa = $IdEmpresa";

	DbExecuteUpdate($sql);

	return DbLastId();
}

function ProveedorUpdate($Id, $Nombre, $IdEmpresa) {
	global $Cfg;

	$sql = "update $Cfg[SqlPrefix]proveedores set
		Nombre = '$Nombre',
		IdEmpresa = $IdEmpresa where Id = $Id";

	DbExecuteUpdate($sql);
}

function ProveedorDelete($Id) {
	global $Cfg;

	$sql = "delete from $Cfg[SqlPrefix]proveedores where Id = $Id";
	DbExecuteUpdate($sql);
}

function ProveedorTranslate($Id) {
	global $ProveedorNames;
	global $Cfg;

	if ($ProveedorNames[$Id])
		return $ProveedorNames[$Id];

	$description = TranslateDescription("$Cfg[SqlPrefix]proveedores",$Id,"Nombre");

	$ProveedorNames[$Id] = $description;

	return $description;
}


function ProveedorGetByEmpresa($IdEmpresa) {
	return ProveedorGetList("IdEmpresa = $IdEmpresa");
}

?>
