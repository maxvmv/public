<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Esensi\Model\Model;
class Topic extends Model
{
	protected $rules = ['topicname'=>['required','max:100', 'unique']];

	protected $primaryKey="id";
	protected $table="topics";
	protected $fillable=['topicname','created_at', 'updated_at'];
}
