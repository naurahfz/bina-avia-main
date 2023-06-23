<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminGallery extends Controller
{
    
    public function index(){
        return view('admin.gallery',[
            "galleries" => Gallery::all(),
            "title" => "Admin Galeri",
            "users" => User::all(),
        ]);
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/gallery')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/gallery')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/gallery')->with($res['status'],$res['message']);
            // return redirect('/admin/announcement')->with("info","Fitur hapus sementara dinonaktifkan");
        }else{
            return redirect('/admin/gallery')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'caption' => 'required',
            'image' => 'required|image|file|max:1024',
        ]);

        if($request->file('image')){
            $validatedData['image'] = time().".png";
            $request->file('image')->move(public_path('assets/img/gallery'), $validatedData['image']);
            Gallery::create($validatedData);
            return ['status'=>'success','message'=>'Galeri berhasil ditambahkan']; 
        }
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'caption' => 'required',
        ]);
        
        $gallery = Gallery::find($request->id);

        //Check if gallery is found
        if($gallery){
            
            //Check if has image
            if($request->file('image')){
                
                $validatedData = $request->validate([
                    'caption' => 'required',
                    'image' => 'required|image|file|max:1024',
                ]);

                // Delete old image
                $img_path = public_path().'/assets/img/gallery/'.$gallery->image;
                unlink($img_path);         // Delete image
                
                // Upload new image
                $validatedData['image'] = time().".png";
                $request->file('image')->move(public_path('assets/img/gallery'), $validatedData['image']);
                $gallery->update($validatedData);
                return ['status'=>'success','message'=>'Galeri berhasil diupdate']; 
            }else{
                $gallery->update($validatedData);
                return ['status'=>'success','message'=>'Galeri berhasil diupdate']; 
            }
        }else{
            return ['status'=>'error','message'=>'Galeri tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $gallery = Gallery::find($request->id);

        //Check if the gallery is found
        if($gallery){
            // Delete image
            $img_path = public_path().'/assets/img/gallery/'.$gallery->image;
            unlink($img_path);         // Delete image
            // Delete news
            Gallery::destroy($request->id);    // Delete news
            return ['status'=>'success','message'=>'Galleri berhasil dihapus'];
        }else{
            return ['status'=>'error','message'=>'Galleri tidak ditemukan'];
        }
    }
}
