<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\slider;
use App\Models\gallery;
use App\Models\media;

class publicController extends Controller
{
    public function index(){
        $slider = slider::orderBy('id','desc')->get();
        $news = news::where('type',0)->orderBy('id','desc')->limit(3)->get();
        $event = news::where('type',1)->orderBy('id','desc')->limit(2)->get();
        return view('index')->with(['slider'=>$slider,'event'=>$event,'news'=>$news]);
    }

    public function history(){
        return view('history');
    }

    public function presidentMessage(){    
        return view('presidentMessage');
    }

    public function factsFigures(){    
        return view('facts-figures');
    }

    public function strategicPlan(){    
        return view('strategic-plan');
    }

    public function universityOrganogram(){    
        return view('university-organogram');
    }

    public function ourTeam(){    
        return view('our-team');
    }
    public function academicDeputy(){    
        return view('academic-deputy');
    }

    public function studentDeputy(){    
        return view('student-deputy');
    }
    public function financeDeputy(){    
        return view('finance-deputy');
    }

    public function universityServices(){    
        return view('university-services');
    }
    
    public function economyFaculty(){    
        return view('economy-faculty');
    }
    
    public function lawFaculty(){    
        return view('law-faculty');
    }

    public function newsEvents(){    
        $news = news::orderBy('id','desc')->paginate(6);
        return view('news-event')->with(['news'=>$news]);
    }
    
    

    
    public function newsDetail($id){    
        $news = news::findOrfail($id);
        $also = news::inRandomOrder()->limit(3)->get();
        return view('news-detail')->with(['news'=>$news,'also'=>$also]);
    }
    
    
    public function howToApply(){    
        return view('how-to-apply');
    }
    
    public function applyProcess(){    
        return view('apply-process');
    }
    
    public function galleryDetail($id){    
        $gallery = gallery::findOrfail($id);
        return view('gallery-detail')->with(['gallery'=>$gallery]);
    }

    public function gallery(){
        $gallery = gallery::orderBy('id','desc')->paginate(9);
        return view('gallery')->with(['gallery'=>$gallery]);
    }

    public function contact(){
        return view('contact');
    }
    
}
