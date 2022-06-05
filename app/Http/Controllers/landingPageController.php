<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogModel;
use App\Models\PortofolioModel;
use App\Models\anggotaModel;
use App\Models\qnaModel;
use App\Models\ContactModel;

class landingPageController extends Controller
{

    public function dataLanding(){
        $anggota = anggotaModel::all();
        $faq = qnaModel::all();
        $contact = ContactModel::all();
        return view('display.landing', compact('anggota','faq','contact'));
    }

    public function dataBlog(){
        $blog = blogModel::latest()->paginate(9);
        return view('display.blog.list_blog', compact('blog'));
    }

    public function detailDataBlog($slug){
        $data = blogModel::where('slug', $slug)->get();
        return view('display.blog.detail_blog', compact('data'));
    }

    public function dataPortofolio(){
        $portofolio = PortofolioModel::latest()->paginate(9);
        return view('display.portofolio.list_portofolio', compact('portofolio'));
    }

    public function detailDataPortofolio($slug){
        $data = PortofolioModel::where('slug', $slug)->get();
        return view('display.portofolio.detail_portofolio', compact('data'));
    }
    
}
