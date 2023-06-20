<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmprestimosAddRequest;
use App\Http\Requests\EmprestimosEditRequest;
use App\Http\Requests\Emprestimosadd_membroRequest;
use App\Models\Emprestimos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
class EmprestimosController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Emprestimos::query();
		if($request->search){
			$search = trim($request->search);
			Emprestimos::search($query, $search);
		}
		$query->leftJoin("users", "emprestimos.id_usuario", "=", "users.id");
		$query->leftJoin("inventario", "emprestimos.id_inventario", "=", "inventario.id");
		$orderby = $request->orderby ?? "emprestimos.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		if(!empty($request->status)){
			$val = $request->status;
			$query->where(DB::raw("emprestimos.status"), "=", $val);
		}
		$records = $this->paginate($query, Emprestimos::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Emprestimos::query();
		$query->leftJoin("users", "emprestimos.id_usuario", "=", "users.id");
		$query->leftJoin("inventario", "emprestimos.id_inventario", "=", "inventario.id");
		$record = $query->findOrFail($rec_id, Emprestimos::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(EmprestimosAddRequest $request){
		$modeldata = $request->validated();
		$modeldata['adicionado_por'] = auth()->user()->name;
		
		//save Emprestimos record
		$record = Emprestimos::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(EmprestimosEditRequest $request, $rec_id = null){
		$query = Emprestimos::query();
		$record = $query->findOrFail($rec_id, Emprestimos::editFields());
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
		$query = Emprestimos::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add_membro(Emprestimosadd_membroRequest $request){
		$modeldata = $request->validated();
		$modeldata['status'] = "AGUARDANDO";
		$modeldata['id_usuario'] = auth()->user()->id;
		$modeldata['adicionado_por'] = auth()->user()->name;
		
		//save Emprestimos record
		$record = Emprestimos::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function minhas_solicitacoes(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Emprestimos::query();
		if($request->search){
			$search = trim($request->search);
			Emprestimos::search($query, $search);
		}
		$query->leftJoin("users", "emprestimos.id_usuario", "=", "users.id");
		$query->leftJoin("inventario", "emprestimos.id_inventario", "=", "inventario.id");
		$orderby = $request->orderby ?? "emprestimos.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("id_usuario", "=" , auth()->user()->id);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		if(!empty($request->status)){
			$val = $request->status;
			$query->where(DB::raw("emprestimos.status"), "=", $val);
		}
		$records = $this->paginate($query, Emprestimos::minhasSolicitacoesFields());
		return $this->respond($records);
	}
}
