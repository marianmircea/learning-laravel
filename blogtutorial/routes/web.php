<?php

    use App\Http\Controllers\BlogController;
    use App\Http\Controllers\Controller;
    //use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return view('home.index'); // By default, pagina principala este 'home'
    })->name('home.index'); // Denumim aceste route-uri pentru a putea fi folosite in link-urile din pagina
/*
    Route::get('/blog', function () {
            //Traducere ce ne spune acest route:
            //Cand accesam uri-ul 'blog', se va accesa/deschide fisierul ..views/blog/index.blade.php
        return view('blog.index');
    })->name('blog.index'); // Denumim aceste route-uri pentru a putea fi folosite in link-urile din pagina
*/

    /**
     * Despre CONTROLLER:
     * 
     * Pentru a returna mai mult decat un fisier sau o pagina,
     * se poate folosi un controller - acesta poate stoca mai multe functii;
     * comanda pt a crea un controller:
     *      $ php artisan make:controller BlogController
     */

    // Dupa ce controller-ul este creat, se importa intre parantezele [], astfel:
    Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
        /**
         * Traducere:
         * Cand se acceseaza uri-ul '/blog', cauta in controller::class metoda 'index'
         * (se executa tot ce este descris intre '[]' - este referinta spre controller),
         * altfel spus: se executa tot ce avem definit in metoda 'index', din controller.
         */

    /**
     * Acest route este folosit pentru crearea de blog-uri noi.
     * Cand se acceseaza uri-ul '/blog/create', Laravel cauta in controller::class metoda 'create'
     * (se executa tot ce este descris intre '[]');
     * altfel spus: se executa tot ce avem definit in metoda 'create', din controller.
     * 
     * Numele acestui route este 'blog.create'.
     */
    Route::get('/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->name('blog.create'); 
    
    /**
     * Acest route este creat pentru a fi folosit cand este apasat butonul de Submit;
     * acceseaza uri-ul, ca si 'post' request, cauta metoda 'store' in controller (in BlogController),
     * si o executa.
     * Numele acestui route este 'blog.store'.
     */
    Route::post('/blog/store', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');

    /**
     * Acest route este creat pentru a deschide pagina de editare;
     * are parametru dinamic - {blog} - care contine informatia pe care blog anume trebuie sa-l editam (de fapt id-ul).
     * Numele route-ului este 'blog.edit' - pentru a putea fi accesat din link.
     */
    Route::get('/blog/edit/{blog}', [App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');

    /**
     * Acest route este creat pentru update-uri;
     * contine referinta spre controller, unde se gaseste definita metoda 'update';
     * metoda 'update' se ocupa cu actualizarea de care avem nevoie, contine logica.
     * Este request de tip 'patch' deoarece este nevoie de update.
     */
    Route::patch('/blog/update/{blog}', [App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');

    /**
     * Acest route este creat pentru a deschide detaliile despre blog-ul accesat (la actionarea butonului 'Read more')
     * are parametru dinamic - {blog} - care contine informatia pe care blog anume trebuie sa-l afisam (de fapt id-ul).
     * Numele route-ului este 'blog.show' - pentru a putea fi accesat din link.
     */
    Route::get('/blog/show/{blog}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
