<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Inventario extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'inventario';
	

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
	protected $fillable = ["status","categoria","nome","descricao","foto"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id LIKE ?  OR 
				nome LIKE ?  OR 
				descricao LIKE ?  OR 
				foto LIKE ?  OR 
				status LIKE ?  OR 
				categoria LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"id", 
			"nome", 
			"descricao", 
			"foto", 
			"status", 
			"inserido_em", 
			"atualizado_em", 
			"categoria" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id", 
			"nome", 
			"descricao", 
			"foto", 
			"status", 
			"inserido_em", 
			"atualizado_em", 
			"categoria" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"inventario.status AS status", 
			"cat_invent.nome AS catinvent_nome", 
			"inventario.nome AS nome", 
			"inventario.descricao AS descricao", 
			"inventario.foto AS foto", 
			"inventario.inserido_em AS inserido_em", 
			"inventario.atualizado_em AS atualizado_em", 
			"inventario.id AS id", 
			"cat_invent.id AS catinvent_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"inventario.status AS status", 
			"cat_invent.nome AS catinvent_nome", 
			"inventario.nome AS nome", 
			"inventario.descricao AS descricao", 
			"inventario.foto AS foto", 
			"inventario.inserido_em AS inserido_em", 
			"inventario.atualizado_em AS atualizado_em", 
			"inventario.id AS id", 
			"cat_invent.id AS catinvent_id" 
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
			"categoria", 
			"nome", 
			"descricao", 
			"foto", 
			"id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = true;
	const CREATED_AT = 'inserido_em'; 
	const UPDATED_AT = 'atualizado_em'; 
}
