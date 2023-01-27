<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Todo extends Model
{
	use HasFactory;

	protected $guarded = array('id');

	protected $fillable = [
		'content',
		'tag_id',
		'user_id',
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

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function getUserName()
	{
		return optional($this->user)->name;
	}

	public function scopeSearch($query, $params)
	{
		// 検索条件
		if ($params !== null) {
			if (is_null($params['tag_id'])) {
				// contentのみの場合
				$query
					->where('user_id', '=', (int)$params['user_id'])
					->where(function ($q) use ($params) {
						$q->where('content', 'LIKE BINARY', "%{$params['content']}%");
					});
			} else if (is_null($params['content'])) {
				// tagのみの場合
				$query
					->where('user_id', '=', (int)$params['user_id'])
					->where(function ($q) use ($params) {
						$q->where('tag_id', '=', (int)$params['tag_id']);
					});
			} else {
				// 両方の場合
				$query
					->where('user_id', '=', (int)$params['user_id'])
					->where(function ($q) use ($params) {
						$q->where('content', 'LIKE BINARY', "%{$params['content']}%")
							->where('tag_id', '=', (int)$params['tag_id']);
					});
			}
		}
		return $query;
	}
}
