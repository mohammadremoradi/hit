<?php

namespace App\Models\Admin\Notify;

use App\Models\admin\notify\MailFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory , SoftDeletes;

   protected $table = 'public_mail';

   protected $fillable = ['subject' , 'body' , 'published_at'];


   public function files(){
    return $this->hasMany(MailFile::class , 'public_mail_id');
}


}
