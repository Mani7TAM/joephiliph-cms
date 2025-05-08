<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SmartPick extends Model
{
    protected $fillable = ['title', 'rating', 'image', 'affiliate_link', 'category', 'view_count'];
}