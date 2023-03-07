<?php
    /**
     * Acest fisier a fost creat pentru a defini posibilitatea de a lucra cu BD;
     * comanda utilizata:
     *      $ php artisan make:model Blog
     */

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    /**
     * Clasa responsabila de lucrul cu BD
     */
    class Blog extends Model
    {
        use HasFactory;

        // Aici trebuie sa aratam care sunt coloanele (field-urile) din BD, pe care vrem sa le populam
        protected $fillable = [
            'title',
            'description',
            'content',
            'image'
        ];
    }
