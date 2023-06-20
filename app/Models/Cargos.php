<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Cargos extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'cargos';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'cargo_id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["cargo_nome"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				cargo_id LIKE ?  OR 
				cargo_nome LIKE ? 
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
			"cargo_id", 
			"cargo_nome" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"cargo_id", 
			"cargo_nome" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"cargo_id", 
			"cargo_nome" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"cargo_id", 
			"cargo_nome" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"cargo_id", 
			"cargo_nome" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
