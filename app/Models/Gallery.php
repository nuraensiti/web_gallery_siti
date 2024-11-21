<?php declare(strict_types=1); 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    
    //mendefinisikan kolom yang boleh diisi
    protected $fillable = [
        'post_id',
        'position',
        'status',
        'image_name',
        'image_path'
    ];

    //relasi ke post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //relasi ke image
    public function images()
    {
        return $this->hasMany(Image::class, 'gallery_id');
    }
}
