<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $primaryKey = "id";
//    protected $fillable = ["name","content"]; // Database üzerinde değişim olabilecekler.
    protected $guarded = []; // Database üzerinde değişim yapılmayacaklar. Direkt [] şeklinde bırakırsak tamamına müdahale hakkımız bulunur.

    public function getUsers()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
