<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissoesAddRequest;
use App\Http\Requests\PermissoesEditRequest;
use App\Models\Permissoes;
use Illuminate\Http\Request;
use Exception;
class PermissoesController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Permissoes::query();
		if($request->search){
			$search = trim($request->search);
			Permissoes::search($query, $search);
		}
		$orderby = $request->orderby ?? "permissoes.permissao_id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Permissoes::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Permissoes::query();
		$record = $query->findOrFail($rec_id, Permissoes::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(PermissoesAddRequest $request){
		$modeldata = $request->validated();
		
		//save Permissoes record
		$record = Permissoes::create($modeldata);
		$rec_id = $record->permissao_id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(PermissoesEditRequest $request, $rec_id = null){
		$query = Permissoes::query();
		$record = $query->findOrFail($rec_id, Permissoes::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $request->validated();
			$record->update($modeldata);
		}
		return $this->respond($record);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Permissoes::query();
		$query->whereIn("permissao_id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
