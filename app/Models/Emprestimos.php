<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Emprestimos extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'emprestimos';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["status","id_usuario","id_inventario","emprestado_em","devolver_em","feedback","adicionado_por","quanto_tempo","justificativa"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				users.nome LIKE ?  OR 
				inventario.nome LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"emprestimos.id_usuario AS id_usuario", 
			"users.nome AS users_nome", 
			"emprestimos.id_inventario AS id_inventario", 
			"inventario.nome AS inventario_nome", 
			"emprestimos.status AS status", 
			"emprestimos.emprestado_em AS emprestado_em", 
			"emprestimos.quanto_tempo AS quanto_tempo", 
			"emprestimos.id AS id", 
			"users.id AS users_id", 
			"inventario.id AS inventario_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"emprestimos.id_usuario AS id_usuario", 
			"users.nome AS users_nome", 
			"emprestimos.id_inventario AS id_inventario", 
			"inventario.nome AS inventario_nome", 
			"emprestimos.status AS status", 
			"emprestimos.emprestado_em AS emprestado_em", 
			"emprestimos.quanto_tempo AS quanto_tempo", 
			"emprestimos.id AS id", 
			"users.id AS users_id", 
			"inventario.id AS inventario_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"emprestimos.id_usuario AS id_usuario", 
			"users.nome AS users_nome", 
			"emprestimos.id_inventario AS id_inventario", 
			"inventario.nome AS inventario_nome", 
			"emprestimos.status AS status", 
			"emprestimos.justificativa AS justificativa", 
			"emprestimos.feedback AS feedback", 
			"emprestimos.emprestado_em AS emprestado_em", 
			"emprestimos.quanto_tempo AS quanto_tempo", 
			"emprestimos.devolver_em AS devolver_em", 
			"emprestimos.id AS id", 
			"users.id AS users_id", 
			"inventario.id AS inventario_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"emprestimos.id_usuario AS id_usuario", 
			"users.nome AS users_nome", 
			"emprestimos.id_inventario AS id_inventario", 
			"inventario.nome AS inventario_nome", 
			"emprestimos.status AS status", 
			"emprestimos.justificativa AS justificativa", 
			"emprestimos.feedback AS feedback", 
			"emprestimos.emprestado_em AS emprestado_em", 
			"emprestimos.quanto_tempo AS quanto_tempo", 
			"emprestimos.devolver_em AS devolver_em", 
			"emprestimos.id AS id", 
			"users.id AS users_id", 
			"inventario.id AS inventario_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"status", 
			"emprestado_em", 
			"devolver_em", 
			"feedback", 
			"adicionado_por", 
			"id" 
		];
	}
	

	/**
     * return minhasSolicitacoes page fields of the model.
     * 
     * @return array
     */
	public static function minhasSolicitacoesFields(){
		return [ 
			"users.nome AS users_nome", 
			"inventario.nome AS inventario_nome", 
			"emprestimos.status AS status", 
			"emprestimos.emprestado_em AS emprestado_em", 
			"emprestimos.quanto_tempo AS quanto_tempo", 
			"emprestimos.id AS id", 
			"users.id AS users_id", 
			"inventario.id AS inventario_id" 
		];
	}
	

	/**
     * return exportMinhasSolicitacoes page fields of the model.
     * 
     * @return array
     */
	public static function exportMinhasSolicitacoesFields(){
		return [ 
			"users.nome AS users_nome", 
			"inventario.nome AS inventario_nome", 
			"emprestimos.status AS status", 
			"emprestimos.emprestado_em AS emprestado_em", 
			"emprestimos.quanto_tempo AS quanto_tempo", 
			"emprestimos.id AS id", 
			"users.id AS users_id", 
			"inventario.id AS inventario_id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
