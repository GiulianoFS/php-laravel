<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Office
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Office extends Model
{
	protected $table = 'offices';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
