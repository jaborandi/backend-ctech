<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgendaFablabAddRequest;
use App\Http\Requests\AgendaFablabEditRequest;
use App\Models\AgendaFablab;
use Illuminate\Http\Request;
use Exception;
class AgendaFablabController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = AgendaFablab::query();
		if($request->search){
			$search = trim($request->search);
			AgendaFablab::search($query, $search);
		}
		$orderby = $request->orderby ?? "agenda_fablab.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, AgendaFablab::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AgendaFablab::query();
		$record = $query->findOrFail($rec_id, AgendaFablab::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(AgendaFablabAddRequest $request){
		$modeldata = $request->validated();
		$modeldata['inserido_por'] = auth()->user()->id;
		
		//save AgendaFablab record
		$record = AgendaFablab::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AgendaFablabEditRequest $request, $rec_id = null){
		$query = AgendaFablab::query();
		$record = $query->findOrFail($rec_id, AgendaFablab::editFields());
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
		$query = AgendaFablab::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
