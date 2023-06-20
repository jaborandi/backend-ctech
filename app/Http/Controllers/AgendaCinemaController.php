<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgendaCinemaAddRequest;
use App\Http\Requests\AgendaCinemaEditRequest;
use App\Models\AgendaCinema;
use Illuminate\Http\Request;
use Exception;
class AgendaCinemaController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = AgendaCinema::query();
		if($request->search){
			$search = trim($request->search);
			AgendaCinema::search($query, $search);
		}
		$orderby = $request->orderby ?? "agenda_cinema.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, AgendaCinema::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AgendaCinema::query();
		$record = $query->findOrFail($rec_id, AgendaCinema::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(AgendaCinemaAddRequest $request){
		$modeldata = $request->validated();
		$modeldata['inserido_por'] = auth()->user()->name;
		
		//save AgendaCinema record
		$record = AgendaCinema::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AgendaCinemaEditRequest $request, $rec_id = null){
		$query = AgendaCinema::query();
		$record = $query->findOrFail($rec_id, AgendaCinema::editFields());
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
		$query = AgendaCinema::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
