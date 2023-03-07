<?php

    namespace App\Http\Controllers;

    use App\Models\Blog; // Aici importam clasa, pentru a putea fi folosita.
    use Illuminate\Http\Request;

    class BlogController extends Controller {
        // Cream aici metoda care ne va arata pagina 'Blogs'
        public function index() {
            /**
             * Prin intermediul lui Blog Model, scoatem din tabel toate inregistrarile existente,
             * incepand cu cea mai recenta,
             * si stocam totul intr-o variabila array.
             */
            $blogs = Blog::latest()->get();

            // Redirect inapoi la acelasi View (pagina 'blog.index'), si trimitem informatia stocata in variabila
            return view('blog.index')->with('blogs', $blogs);
            /**
             * 'blogs' <- este numele variabilei care va fi disponibila in view; pe aceasta o vom accesa acolo.
             * $blogs - contine informatia ce dorim a fi transmisa si disponibila in views.
             */
        }

        // Cream aici metoda care ne va duce la pagina de care avem nevoie
        public function create() {
            return view('blog.create'); // Redirect catre view, catre pagina 'blog.create', fara parametrii.
        }

        /**
         * Cream aici metoda care stocheaza datele in baza de date;
         * este chemata la apasarea butonului 'Submit' din form.
         * 
         * @param $request - stocheaza toate datele ce le primim din form.
         */
        public function store(Request $request) {

            // Die & Dump = metoda de debugging de la Laravel, afiseaza tot ce contine o variabila, in acest caz.
            //dd('suntem in metoda "store"');
            //dd($request);

            /**
             * Folosim informatia primita de la form,
             * si Schimbam denumirea fisierului imagine (pentru stocare).
             * Formatul numelui este: timpul curent + titlul din form + extensia fisierului upload-at.
             */  
            $newImageName = time().'-'.$request->title.'.'.$request->image->extension();

            /**
             * Specificam locul / calea unde se salveaza imaginea - primul argument = public_path('images')
             * si apoi noul nume - al doilea argument = $newImageName
             */
            $request->image->move(public_path('images'), $newImageName);

            /**
             * 
             */
            // Cream o noua inregistrare in BD, in tabelul 'blogS':
                // Chemam modelul 'Blog' (care reprezinta baza de date) si metoda 'create' de la Laravel,
                // Parametrul metodei 'create' este un array, deoarece se primeste o colectie de date, un sir de valori
            Blog::create([
                'title' => $request->title, // Pe coloana 'title' punem valoarea venita din form - $request->title
                'description' => $request->description,
                'content' => $request->blogBody,
                'image' => $newImageName // Pe coloana 'image' stocam denumirea noua
            ]);

            // Dupa inregistrarea datelor in BD, facem un redirect catre pagina 'Blogs', cu un mesaj de succes.
            return redirect(route('blog.index'))->with('success', 'Blog creat cu success!');
        }

        /**
         * Cream aici metoda responsabila cu editarea unui blog;
         * ca si parametru este declarat modelul, care contine toata informatia necesara.
         * 
         * @return $blog - ca si parametru; contine toata informatia
         */
        public function edit(Blog $blog) {
            return view('blog.edit')->with('blog', $blog);
        }

        /**
         * Cream aici metoda responsabila cu update-ul in BD.
         * 
         * @param $request - contine datele care vin din form
         * @param $blog - modelul; contine datele existente in tabel, in BD
         */
        public function update(Request $request, Blog $blog) {
            $blog->title = $request->title; // Valoarea noua, ce vine din form, o stocam in variabila
            $blog->description = $request->description; // Valoarea noua, ce vine din form, o stocam in variabila
            $blog->content = $request->blogBody; // Valoarea noua, ce vine din form, o stocam in variabila

            // Image handeling: doar daca se schimba imaginea, vom face update si la link-ul imaginii; daca nu, ramane neschimbat
            if ($request->image) {
                // Asemenetor ca in metoda 'store' - schimbare nume fisier si specificarea locatiei unde se depoziteaza imaginea
                $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
                $request->image->move(public_path('images'), $newImageName);

                $blog->image = $newImageName; // Valoarea noua, ce vine din form, o stocam in variabila
            }

            $blog->save(); // Salveaza informatia in BD

            // Redirectionare catre pagina 'blog.index', insotita de un mesaj de success.
            return redirect(route('blog.index'))->with('success', 'Continutul a fost schimbat cu success!');
        }

        /**
         * Cream aici metoda responsabila cu afisarea blogului accesat din interfata, cu 'Read more'
         * 
         * @param $blog - modelul; contine datele existente in tabel, in BD
         * @return view-ul paginii 'show'
         */
        public function show(Blog $blog) {
            // Trimitere catre pagina 'blog.show':
            return view('blog.show')->with('blog', $blog);
        }
    }
