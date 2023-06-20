<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AgendaLaboratorio extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'agenda_laboratorio';
	

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
	protected $fillable = ["titulo","numero_pessoas","confirmacao","observacoes","data_inicio","hora_inicio","data_termino","hora_termino","inserido_por"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id LIKE ?  OR 
				titulo LIKE ?  OR 
				numero_pessoas LIKE ?  OR 
				confirmacao LIKE ?  OR 
				inserido_por LIKE ?  OR 
				observacoes LIKE ? 
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
			"titulo", 
			"numero_pessoas", 
			"confirmacao", 
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
			"numero_pessoas", 
			"confirmacao", 
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
			"agenda_laboratorio.id AS id", 
			"agenda_laboratorio.titulo AS titulo", 
			"agenda_laboratorio.numero_pessoas AS numero_pessoas", 
			"agenda_laboratorio.confirmacao AS confirmacao", 
			"agenda_laboratorio.data_inicio AS data_inicio", 
			"agenda_laboratorio.hora_inicio AS hora_inicio", 
			"agenda_laboratorio.data_termino AS data_termino", 
			"agenda_laboratorio.hora_termino AS hora_termino", 
			"agenda_laboratorio.inserido_por AS inserido_por", 
			"users.nome AS users_nome", 
			"agenda_laboratorio.observacoes AS observacoes" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"agenda_laboratorio.id AS id", 
			"agenda_laboratorio.titulo AS titulo", 
			"agenda_laboratorio.numero_pessoas AS numero_pessoas", 
			"agenda_laboratorio.confirmacao AS confirmacao", 
			"agenda_laboratorio.data_inicio AS data_inicio", 
			"agenda_laboratorio.hora_inicio AS hora_inicio", 
			"agenda_laboratorio.data_termino AS data_termino", 
			"agenda_laboratorio.hora_termino AS hora_termino", 
			"agenda_laboratorio.inserido_por AS inserido_por", 
			"users.nome AS users_nome", 
			"agenda_laboratorio.observacoes AS observacoes" 
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
			"numero_pessoas", 
			"confirmacao", 
			"observacoes", 
			"data_inicio", 
			"hora_inicio", 
			"data_termino", 
			"hora_termino", 
			"inserido_por", 
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
