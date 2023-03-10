<?php
/**
 * Page Access Control
 * @category  RBAC Helper
 */
defined('ROOT') or exit('No direct script access allowed');
class ACL
{
	

	/**
	 * Array of user roles and page access 
	 * Use "*" to grant all access right to particular user role
	 * @var array
	 */
	public static $role_pages = array(
			'administrator' =>
						array(
							'dealerreps' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'employees' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'expense_categories' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'generalledger' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'other_income_categories' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'other_income_expenses' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'our_company_info' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'products' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'profitandloss' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'upsrates2' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'zones' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'order_payments' => array('list','view','add','edit', 'editfield','delete'),
							'customers_creditcards' => array('list','view','add','edit', 'editfield','delete'),
							'orderdetails' => array('list','view','add','edit', 'editfield','delete','import_data','list','view','add','edit', 'editfield','delete'),
							'routine_processes' => array('list','view','add','edit', 'editfield','delete'),
							'vendor_list' => array('list','view','add','edit', 'editfield','delete'),
							'vendor_invoices' => array('list','view','add','edit', 'editfield','delete'),
							'site_users' => array('list','view','add','edit', 'editfield','delete','accountedit','accountview','list','view','add','edit', 'editfield','delete'),
							'expense_reimbursement' => array('list','view','add','edit', 'editfield','delete'),
							'inventory' => array('list','view','add','edit', 'editfield','delete'),
							'customers' => array('list','view','add','edit', 'editfield','delete','import_data','list','view','add','edit', 'editfield','delete'),
							'orders' => array('list','view','add','edit', 'editfield','delete','import_data','list','view','add','edit', 'editfield','delete','list','view','add','edit', 'editfield','delete'),
							'collected_report' => array('list','view'),
							'commission_report' => array('list','view'),
							'cost_of_goods' => array('list','view'),
							'current_products' => array('list','view'),
							'freight_report' => array('list','view'),
							'sales_history' => array('list','view'),
							'returns' => array('list','view','add','edit', 'editfield','delete'),
							'test_results' => array('list','view','add','edit', 'editfield','delete')
						),
		
			'user' =>
						array(
							'products' => array('list','view'),
							'orderdetails' => array('list','view','list','view'),
							'site_users' => array('accountedit','accountview'),
							'customers' => array('list','view'),
							'orders' => array('list','view','list','view'),
							'current_products' => array('list','view'),
							'returns' => array('list','view')
						),
		
			'supervisor' =>
						array(
							'dealerreps' => array('list','view'),
							'employees' => array('list','view'),
							'products' => array('list','view'),
							'orderdetails' => array('list','view'),
							'site_users' => array('accountedit','accountview','add'),
							'expense_reimbursement' => array('list','view','add','edit', 'editfield'),
							'inventory' => array('list','view'),
							'customers' => array('list','view','list','view'),
							'orders' => array('list','view','list','view'),
							'current_products' => array('list','view'),
							'sales_history' => array('list','view'),
							'returns' => array('list','view')
						)
		);

	/**
	 * Current user role name
	 * @var string
	 */
	public static $user_role = null;

	/**
	 * pages to Exclude From Access Validation Check
	 * @var array
	 */
	public static $exclude_page_check = array("", "index", "home", "account", "info", "masterdetail");

	/**
	 * Init page properties
	 */
	public function __construct()
	{	
		if(!empty(USER_ROLE)){
			self::$user_role = USER_ROLE;
		}
	}

	/**
	 * Check page path against user role permissions
	 * if user has access return AUTHORIZED
	 * if user has NO access return UNAUTHORIZED
	 * if user has NO role return NO_ROLE
	 * @return string
	 */
	public static function GetPageAccess($path)
	{
		$rp = self::$role_pages;
		if ($rp == "*") {
			return AUTHORIZED; // Grant access to any user
		} else {
			$path = strtolower(trim($path, '/'));

			$arr_path = explode("/", $path);
			$page = strtolower($arr_path[0]);

			//If user is accessing excluded access contrl pages
			if (in_array($page, self::$exclude_page_check)) {
				return AUTHORIZED;
			}

			$user_role = strtolower(USER_ROLE); // Get user defined role from session value
			if (array_key_exists($user_role, $rp)) {
				$action = (!empty($arr_path[1]) ? $arr_path[1] : "list");
				if ($action == "index") {
					$action = "list";
				}
				//Check if user have access to all pages or user have access to all page actions
				if ($rp[$user_role] == "*" || (!empty($rp[$user_role][$page]) && $rp[$user_role][$page] == "*")) {
					return AUTHORIZED;
				} else {
					if (!empty($rp[$user_role][$page]) && in_array($action, $rp[$user_role][$page])) {
						return AUTHORIZED;
					}
				}
				return FORBIDDEN;
			} else {
				//User does not have any role.
				return NOROLE;
			}
		}
	}

	/**
	 * Check if user role has access to a page
	 * @return Bool
	 */
	public static function is_allowed($path)
	{
		return (self::GetPageAccess($path) == AUTHORIZED);
	}

}
