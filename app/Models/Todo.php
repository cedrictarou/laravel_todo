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
}
