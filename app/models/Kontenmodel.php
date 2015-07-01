<?php
    namespace App\models;

    use Illuminate\Database\Eloquent\Model;

    class KontenModel extends Model {

        protected $table = 'konten';

        protected $fillable = ['is_admin', 'views', 'date', 'judul', 'gambar', 'slug', 'content', 'summary', 'kolom_informasi', 'urutan'];
    }