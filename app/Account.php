<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function accountType()
    {
        return $this->belongsTo(AccountType::class, 'jenis_account_id');
    }

    protected $table = 'accounts'; //Nama Table

    protected $fillable = ['name', 'username', 'email', 'password', 'url', 'keterangan', 'jenis_account_id', 'user_id'];

    protected $hidden = ['password', 'user_id'];

    // Jika ingin menggunakan kolom waktu (timestamps) created_at dan updated_at, set $timestamps ke true
    public $timestamps = true;
}
