<?php
// app/Models/Post.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body']; // allow mass assignment // opposite $guarded
}

// some of the Model methods: All(), Find(), Create(), Undate(), Delete()