<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isEmpty;

class Todo extends Model
{
	use HasFactory;

	protected $guarded = array('id');

	protected $fillable = [
		'content',
		'tag_id',
	];

	public function getTagId()
	{
		return optional($this->tag)->id;
	}

	public function getTagName()
	{
		return optional($this->tag)->name;
	}

	public function tag()
	{
		return $this->belongsTo('App\Models\Tag');
	}

	public function scopeSearch($query, $params)
	{
		if ($params !== null) {
			$query->where('content', 'LIKE BINARY', "%{$params['content']}%")
				->where('tag_id', '=', $params['tag_id']);
		}
		return $query;
	}
}
