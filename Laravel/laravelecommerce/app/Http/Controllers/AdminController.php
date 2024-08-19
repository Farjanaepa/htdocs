<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;



class AdminController extends Controller
{
  
public function index()
{
    return view("admin.index");
}


public function brands()
{
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view("admin.brands",compact('brands'));
}



public function add_brand()
{
     return view("admin.brand-add");
}


public function add_brand_store(Request $request)
{        
     $request->validate([
          'name' => 'required',
          'slug' => 'required|unique:brands,slug',
          'image' => 'mimes:png,jpg,jpeg|max:2048'
     ]);

     $brand = new Brand();
     $brand->name = $request->name;
     $brand->slug = Str::slug($request->name);
     
     $image = $request->file('image');
     $file_extention = $request->file('image')->extension();
     $file_name = Carbon::now()->timestamp . '.' . $file_extention;        
     $this->GenerateBrandThumbailImage($image,$file_name);
     $brand->image = $file_name;        
     $brand->save();
     return redirect()->route('admin.brands')->with('status','Record has been added successfully !');



     
}

public function GenerateBrandThumbailImage($image, $file_name)
    {
        // Define the path where the thumbnail will be saved
        $destinationPath = public_path('/images/brands');
        
        // Resize the image and save it as a thumbnail
        $img = Image::make($image->getRealPath());
        $img->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $file_name);
    }

}
