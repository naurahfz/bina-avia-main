<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminNews extends Controller
{
    
    public function index(){
        return view('admin.news',[
            "news" => News::all(),
            "title" => "Admin | Berita",
            "users" => User::all(),
        ]);
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/news')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/news')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/news')->with($res['status'],$res['message']);
            // return redirect('/admin/announcement')->with("info","Fitur hapus sementara dinonaktifkan");
        }else{
            return redirect('/admin/news')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|file|max:1024',
        ]);

        if($request->file('image')){
            $validatedData['image'] = time().".png";
            $request->file('image')->move(public_path('assets/img/news'), $validatedData['image']);
            News::create($validatedData);
            return ['status'=>'success','message'=>'Berita berhasil ditambahkan']; 
        }
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'title' => 'required',
            'body' => 'required',
        ]);
        
        $news = News::find($request->id);

        //Check if news is found
        if($news){
            
            //Check if has image
            if($request->file('image')){
                
                $validatedData = $request->validate([
                    'title' => 'required',
                    'body' => 'required',
                    'image' => 'required|image|file|max:1024',
                ]);

                // Delete old image
                $img_path = public_path().'/assets/img/news/'.$news->image;
                if(file_exists($img_path)){unlink($img_path);}
                
                // Upload new image
                $validatedData['image'] = time().".png";
                $request->file('image')->move(public_path('assets/img/news'), $validatedData['image']);
                $news->update($validatedData);
                return ['status'=>'success','message'=>'Berita berhasil diupdate']; 
            }else{
                $news->update($validatedData);
                return ['status'=>'success','message'=>'Berita berhasil diupdate']; 
            }
        }else{
            return ['status'=>'error','message'=>'Berita tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $news = News::find($request->id);

        //Check if the news is found
        if($news){
            
            // Delete image
            $img_path = public_path().'/assets/img/news/'.$news->image;
            if(file_exists($img_path)){unlink($img_path);}
            
            // Delete news
            News::destroy($request->id);
            
            return ['status'=>'success','message'=>'Berita berhasil dihapus'];
        }else{
            return ['status'=>'error','message'=>'Berita tidak ditemukan'];
        }
    }
}
