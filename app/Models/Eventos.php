<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Eventos extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'eventos';
	

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
	protected $fillable = ["titulo","foto","observacoes","data_inicio","hora_inicio","data_termino","hora_termino","inserido_por","link"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				titulo LIKE ?  OR 
				observacoes LIKE ? 
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
			"id", 
			"titulo", 
			"foto", 
			"link", 
			"data_inicio", 
			"hora_inicio", 
			"data_termino", 
			"hora_termino", 
			"inserido_por", 
			"observacoes" 
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
			"titulo", 
			"foto", 
			"link", 
			"data_inicio", 
			"hora_inicio", 
			"data_termino", 
			"hora_termino", 
			"inserido_por", 
			"observacoes" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"foto", 
			"titulo", 
			"link", 
			"data_inicio", 
			"hora_inicio", 
			"data_termino", 
			"hora_termino", 
			"observacoes", 
			"id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"foto", 
			"titulo", 
			"link", 
			"data_inicio", 
			"hora_inicio", 
			"data_termino", 
			"hora_termino", 
			"observacoes", 
			"id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"titulo", 
			"foto", 
			"observacoes", 
			"data_inicio", 
			"hora_inicio", 
			"data_termino", 
			"hora_termino", 
			"inserido_por", 
			"link", 
			"id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
