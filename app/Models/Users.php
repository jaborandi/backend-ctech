<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Users extends Authenticatable 
{
	use Notifiable, HasApiTokens;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'users';
	

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
	protected $fillable = ["name","password","image","phone","email","nome","score","cor_postit","cor_letra","cargo_usuario"];
	/**
     * Table fields which are not included in select statement
     *
     * @var array
     */
	protected $hidden = ['password', 'token'];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id LIKE ?  OR 
				name LIKE ?  OR 
				phone LIKE ?  OR 
				email LIKE ?  OR 
				cor_postit LIKE ?  OR 
				cor_letra LIKE ?  OR 
				nome LIKE ?  OR 
				score LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"name", 
			"image", 
			"phone", 
			"email", 
			"cor_postit", 
			"cor_letra", 
			"nome", 
			"score", 
			"cargo_usuario" 
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
			"name", 
			"image", 
			"phone", 
			"email", 
			"cor_postit", 
			"cor_letra", 
			"nome", 
			"score", 
			"cargo_usuario" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"users.id AS id", 
			"users.nome AS nome", 
			"users.name AS name", 
			"users.phone AS phone", 
			"users.email AS email", 
			"users.cor_letra AS cor_letra", 
			"users.score AS score", 
			"users.cargo_usuario AS cargo_usuario", 
			"cargos.cargo_nome AS cargos_cargo_nome" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"users.id AS id", 
			"users.nome AS nome", 
			"users.name AS name", 
			"users.phone AS phone", 
			"users.email AS email", 
			"users.cor_letra AS cor_letra", 
			"users.score AS score", 
			"users.cargo_usuario AS cargo_usuario", 
			"cargos.cargo_nome AS cargos_cargo_nome" 
		];
	}
	

	/**
     * return accountedit page fields of the model.
     * 
     * @return array
     */
	public static function accounteditFields(){
		return [ 
			"id", 
			"name", 
			"image", 
			"phone", 
			"cor_postit", 
			"cor_letra", 
			"nome", 
			"score", 
			"cargo_usuario" 
		];
	}
	

	/**
     * return accountview page fields of the model.
     * 
     * @return array
     */
	public static function accountviewFields(){
		return [ 
			"id", 
			"name", 
			"phone", 
			"email", 
			"cor_postit", 
			"cor_letra", 
			"nome", 
			"score", 
			"cargo_usuario" 
		];
	}
	

	/**
     * return exportAccountview page fields of the model.
     * 
     * @return array
     */
	public static function exportAccountviewFields(){
		return [ 
			"id", 
			"name", 
			"phone", 
			"email", 
			"cor_postit", 
			"cor_letra", 
			"nome", 
			"score", 
			"cargo_usuario" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id", 
			"name", 
			"image", 
			"phone", 
			"cor_postit", 
			"cor_letra", 
			"nome", 
			"score", 
			"cargo_usuario" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
	

	/**
     * Get current user name
     * @return string
     */
	public function UserName(){
		return $this->name;
	}
	

	/**
     * Get current user id
     * @return string
     */
	public function UserId(){
		return $this->id;
	}
	public function UserEmail(){
		return $this->email;
	}
	public function UserPhoto(){
		return $this->image;
	}
	public function UserRole(){
		return $this->cargo_usuario;
	}
	

	/**
     * Send Password reset link to user email 
	 * @param string $token
     * @return string
     */
	public function sendPasswordResetNotification($token)
	{
		// Your your own implementation.
		$this->notify(new \App\Notifications\ResetPassword($token));
	}
	
	private $roleNames = [];
	private $userPages = [];
	
	/**
	* Get the permissions of the user.
	*/
	public function permissions(){
		return $this->hasMany(Permissoes::class, 'cargo_id', 'cargo_usuario');
	}
	
	/**
	* Get the roles of the user.
	*/
	public function roles(){
		return $this->hasMany(Cargos::class, 'cargo_id', 'cargo_usuario');
	}
	
	/**
	* set user role
	*/
	public function assignRole($roleName){
		$roleId = Cargos::select('cargo_id')->where('cargo_nome', $roleName)->value('cargo_id');
		$this->cargo_usuario = $roleId;
		$this->save();
	}
	
	/**
     * return list of pages user can access
     * @return array
     */
	public function getUserPages(){
		if(empty($this->userPages)){ // ensure we make db query once
			$this->userPages = $this->permissions()->pluck('permission')->toArray();
		}
		return $this->userPages;
	}
	
	/**
     * return user role names
     * @return array
     */
	public function getRoleNames(){
		if(empty($this->roleNames)){// ensure we make db query once
			$this->roleNames = $this->roles()->pluck('cargo_nome')->toArray();
		}
		return $this->roleNames;
	}
	
	/**
     * check if user has a role
     * @return bool
    */
	public function hasRole($arrRoles){
		if(!is_array($arrRoles)){
			$arrRoles = [$arrRoles];
		}
		$userRoles = $this->getRoleNames();
		if(array_intersect($userRoles, $arrRoles)){
			return true;
		}
		return false;
	}
	
	/**
     * check if user can access page
     * @return bool
     */
	public function canAccess($path){
		$userPages = $this->getUserPages();
		return in_array($path, $userPages);
	}
}
