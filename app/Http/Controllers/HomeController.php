<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    
    public function index(){
        return view('home',[
            "news" => News::orderBy('created_at', 'DESC')->take(3)->get(),
            "title" => "Bina Avia Persada | Beranda",
            "testimonials" => Testimonial::all(),
        ]);
    }
    
    public function contact(){
        return view('contact',[
            "title" => "Bina Avia Persada | Kontak",
        ]);
    }

    public function gallery(){
        return view('gallery',[
            "title" => "Bina Avia Persada | Galeri",
            "galleries" => Gallery::all(),
        ]);
    }

    public function news(){
        return view('news',[
            "title" => "Bina Avia Persada | Bertia",
            "news" => News::all(),
        ]);
    }

    public function new(News $news){
        return view('new',[
            "new" => $news,
            "title" => "Bina Avia Persada | ".$news->title,
        ]);
    }

    public function training(){
        return view('training',[
            "title" => "Bina Avia Persada | Program Pelatihan",
        ]);
    }
    
    
}
