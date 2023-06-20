<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components Data Contoller
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Controller
 */
class Components_dataController extends Controller{
	public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['users_name_exist','users_email_exist']]);
    }
	/**
     * id_usuario_option_list Model Action
     * @return array
     */
	function id_usuario_option_list(Request $request){
		$arr = [];
		if($request->search){
			$sqltext = "SELECT  DISTINCT id AS value,nome AS label FROM users WHERE nome LIKE :search ORDER BY nome ASC LIMIT 0,10" ;
			$query_params = [];
			$query_params['search'] = "%{$request->search}%";
			$arr = DB::select(DB::raw($sqltext), $query_params);
		}
		return $arr;
	}
	/**
     * id_inventario_option_list Model Action
     * @return array
     */
	function id_inventario_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,nome AS label,status AS caption,foto AS image FROM inventario ORDER BY status ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * categoria_option_list Model Action
     * @return array
     */
	function categoria_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,nome AS label FROM cat_invent ORDER BY nome ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * nome_option_list Model Action
     * @return array
     */
	function nome_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT nome AS value,nome AS label FROM inventario ORDER BY nome ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * inventario_categoria_autofill Model Action
     * @return array
     */
	function inventario_categoria_autofill(Request $request){
		$sqltext = "SELECT detalhes FROM cat_invent WHERE id=:value" ;
		$query_params = [];
		$query_params['value'] = request()->get('value');
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * cargo_id_option_list Model Action
     * @return array
     */
	function cargo_id_option_list(Request $request){
		$sqltext = "SELECT cargo_id as value, cargo_id as label FROM cargos";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * check if name value already exist in Users
	 * @param string $value
     * @return bool
     */
	function users_name_exist(Request $request, $value){
		$exist = DB::table('users')->where('name', $value)->value('name');   
		if($exist){
			return "true";
		}
		return "false";
	}
	/**
     * check if email value already exist in Users
	 * @param string $value
     * @return bool
     */
	function users_email_exist(Request $request, $value){
		$exist = DB::table('users')->where('email', $value)->value('email');   
		if($exist){
			return "true";
		}
		return "false";
	}
	/**
     * cargo_usuario_option_list Model Action
     * @return array
     */
	function cargo_usuario_option_list(Request $request){
		$sqltext = "SELECT cargo_id AS value, cargo_nome AS label FROM cargos";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
}
