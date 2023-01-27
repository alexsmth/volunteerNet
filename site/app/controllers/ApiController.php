<?php

/**
 * Info Contoller Class
 * @category  Controller
 */

class ApiController extends BaseController
{

	/**
	 * call model action to retrieve data
     * Takes a varible number of arguments. Can only access functions in the SharedController functions name is passed as action.
     * example: api/json/functionA/arg1/arg2/arg3
     * note: encode the url with url_encode()
	 * @return json data
	 */
    function json($action, ...$args)
    {
        $model = new SharedController;
        $data = call_user_func_array(array($model, $action), $args);
        echo json_encode($data);
    }

}
