<?php
function post_install() {

	if (strtolower($_POST['mode']) == 'install') {
	
	?><br/>
	<h3>Advanced OpenSales by <a href="http://www.salesagility.com">SalesAgility</a></h3>
	<br/>
	German translation by Claudia Haring & Georg Schütz <a href="http://www.kamux.de">www.kamux.de</a><br/>
	Russian tranlsation by likhobory <a href="mailto:likhobory@mail.ru">likhobory@mail.ru</a><br/>
	Dutch translation by OpenSesame ICT <a href="http://www.osict.com">www.osict.com</a> <a href="mailto:bdm@osict.com">bdm@osict.com</a><br/>
	Finnish translation by Henri Vuolle <a href="mailto:henri.vuolle@kiwai.fi">henri.vuolle@kiwai.fi</a><br/>
	Italian translation by Andrea Motta<br/>
	Spanish translation by Morris X<br/>
	<br/><?php
		$modules = array('AOS_Contracts','AOS_Invoices','AOS_PDF_Templates','AOS_Products','AOS_Products_Quotes','AOS_Quotes');
		
		$actions = array('clearAll','rebuildAuditTables','rebuildExtensions','repairDatabase');

		require_once('modules/Administration/QuickRepairAndRebuild.php');
		$randc = new RepairAndClear();
		$randc->repairAndClearAll($actions, $modules, true,false);
		
		$_REQUEST['upgradeWizard'] = true;
		require_once('modules/ACL/install_actions.php');
		unset($_REQUEST['upgradeWizard']);

	}
		
}
?>
