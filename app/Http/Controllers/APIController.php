<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Branch;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Testimonial;
//use App\Models\Training;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
  public function Branch(Branch $branch){  
    return ApiFormatter::createApi(200,"Success",$branch);
  }  
  public function Gallery(Gallery $gallery){  
    return ApiFormatter::createApi(200,"Success",$gallery);
  }  
  public function News(News $news){  
    return ApiFormatter::createApi(200,"Success",$news);
  }  
  public function Testimonial(Testimonial $testimonial){  
    return ApiFormatter::createApi(200,"Success",$testimonial);
  }  
  // public function Training(Training $training){  
  //   return ApiFormatter::createApi(200,"Success",$training);
  // }  
  public function User(User $user){  
    return ApiFormatter::createApi(200,"Success",$user);
  }  
}
