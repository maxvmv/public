<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Esensi\Model\Model;
class Block extends Model
{
	
	protected $primaryKey="id";
	protected $table="blocks";
	protected $fillable=['topicid','title', 'content','imagePath','created_at', 'updated_at'];
	protected $rules = ['title'=>['required','max:100'], 'topicid'=>['required'], 'content'=>['required']];
}
