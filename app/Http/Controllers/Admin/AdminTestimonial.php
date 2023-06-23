<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTestimonial extends Controller
{
    
    public function index(){
        return view('admin.testimonial',[
            "testimonials" => Testimonial::all(),
            "title" => "Admin | Testimoni",
            "users" => User::all(),
        ]);
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/testimonial')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/testimonial')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/testimonial')->with($res['status'],$res['message']);
            // return redirect('/admin/testimonial')->with("info","Fitur hapus sementara dinonaktifkan");
        }else{
            return redirect('/admin/testimonial')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' =>'required',
            'position' =>'required',
            'image' =>'required|image|file|max:1024',
            'review' => 'required',
        ]);
        
        // Check image
        if($request->file('image')){
            $validatedData['image'] = time().".png";
            $request->file('image')->move(public_path('assets/img/testimoni'), $validatedData['image']);
            // Create new testimonial
            Testimonial::create($validatedData);
            return ['status'=>'success','message'=>'Testimoni berhasil ditambahkan'];
        }
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required',
            'review' => 'required',
            'position' => 'required',
        ]);
        
        $testimonial = Testimonial::find($request->id);

        //Check if testimonial is found
        if($testimonial){
            
            //Check if has image
            if($request->file('image')){
                
                $validatedData = $request->validate([
                    'name' => 'required',
                    'review' => 'required',
                    'position' => 'required',
                    'image' => 'required|image|file|max:1024',
                ]);

                if($testimonial->image){
                    // Delete old image
                    $img_path = public_path().'/assets/img/testimoni/'.$testimonial->image;
                    unlink($img_path);         // Delete image
                }
                
                // Upload new image
                $validatedData['image'] = time().".png";
                $request->file('image')->move(public_path('assets/img/testimoni'), $validatedData['image']);
                $testimonial->update($validatedData);
                return ['status'=>'success','message'=>'Testimonial berhasil diupdate']; 
            }else{
                $testimonial->update($validatedData);
                return ['status'=>'success','message'=>'Testimonial berhasil diupdate']; 
            }
        }else{
            return ['status'=>'error','message'=>'Testimonial tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $testimonial = Testimonial::find($request->id);
        $name = $testimonial->name;

        //Check if the testimonial is found
        if($testimonial){
            //Check if the testimonial image is found
            if($testimonial->image){
                // Delete image
                $img_path = public_path().'/assets/img/testimoni/'.$testimonial->image;
                unlink($img_path);         // Delete image
            }
            // Delete testimonial
            Testimonial::destroy($request->id);    // Delete testimonial
            return ['status'=>'success','message'=>'Testimoni dari '.$name.' berhasil dihapus'];
        }else{
            return ['status'=>'error','message'=>'Testimoni tidak ditemukan'];
        }
    }
}
