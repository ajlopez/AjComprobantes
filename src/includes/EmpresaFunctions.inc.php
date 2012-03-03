<?

/*
 *	Functions
 * for Entity Empresa
 *
 */

	include_once($Page->Prefix.'ajfwk/Database.inc.php');
	include_once($Page->Prefix.'ajfwk/Translations.inc.php');

function EmpresaGetById($Id) {
	global $Cfg;

	$sql = "select Id, Nombre from $Cfg[SqlPrefix]empresas where Id = $Id";

	$rs = DbExecuteQuery($sql);
	return DbNextRow($rs);
}

function EmpresaGetList($where='',$order='') {
	global $Cfg;

	$sql = "select Id, Nombre from $Cfg[SqlPrefix]empresas";

	if ($where)
		$sql .= " where $where";
	if (!$order)
		$order = 'Id';
	$sql .= " order by $order";

	return DbExecuteQuery($sql);
}


function EmpresaGetView($where='',$order='') {
	global $Cfg;

}

//	function GetListBy...
//	function GetViewBy...

function EmpresaInsert($Nombre) {
	global $Cfg;

	$sql = "insert $Cfg[SqlPrefix]empresas set
		Nombre = '$Nombre'";

	DbExecuteUpdate($sql);

	return DbLastId();
}

function EmpresaUpdate($Id, $Nombre) {
	global $Cfg;

	$sql = "update $Cfg[SqlPrefix]empresas set
		Nombre = '$Nombre' where Id = $Id";

	DbExecuteUpdate($sql);
}

function EmpresaDelete($Id) {
	global $Cfg;

	$sql = "delete from $Cfg[SqlPrefix]empresas where Id = $Id";
	DbExecuteUpdate($sql);
}

function EmpresaTranslate($Id) {
	global $EmpresaNames;
	global $Cfg;

	if ($EmpresaNames[$Id])
		return $EmpresaNames[$Id];

	$description = TranslateDescription("$Cfg[SqlPrefix]empresas",$Id,"Nombre");

	$EmpresaNames[$Id] = $description;

	return $description;
}


?>
