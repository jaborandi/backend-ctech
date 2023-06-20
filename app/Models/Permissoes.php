<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Permissoes extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'permissoes';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'permissao_id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["permission","cargo_id"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				permissao_id LIKE ?  OR 
				permission LIKE ? 
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
			"permissao_id", 
			"permission", 
			"cargo_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"permissao_id", 
			"permission", 
			"cargo_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"permissao_id", 
			"permission", 
			"cargo_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"permissao_id", 
			"permission", 
			"cargo_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"permissao_id", 
			"permission", 
			"cargo_id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
