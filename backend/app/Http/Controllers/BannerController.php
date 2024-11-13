<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::filter(request(['search']))->latest()->select('image','page','slug','created_at')->paginate(10);
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('name','slug')->get();
        return view('admin.banner.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $formFields = $request->validate([
                'page'=>'required|unique:banners,page,',
                'title'=>'required',
                'subtitle'=>'required',
                'alt'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            ],
            [
                'page.unique'=>'Banner for this page already exists'
            ]);
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('banners',$imageName,'public');
            }
            $slug = Str::slug($formFields['page']);
            Banner::create($formFields+['slug'=>$slug]);
            return redirect()->route('banners')->with('message','Banner added successfully');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Please check the required fields are filled.');
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $slug)
    {
        $banner = Banner::whereSlug($slug)->first();
        $categories = Category::select('name','slug')->get();
        return view('admin.banner.edit',compact('banner','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $slug)
    {
        try{
            $banner = Banner::whereSlug($slug)->first();
            $formFields = $request->validate([
                'page'=>'required|unique:banners,page,'.$banner->id,
                'title'=>'required',
                'subtitle'=>'required',
                'alt'=>'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            ],
            [
                'page.unique'=>'Banner for this page already exists'
            ]);
            if($request->hasFile('image'))
            {
                $slug = Str::slug($formFields['page']);
                if(!empty($team->image))
                {
                    $image_path = public_path('storage/'.$team->image);
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
                $uploadedFile = $request->file('image');
                $fileName = $uploadedFile->getClientOriginalName();
                $formFields['image'] = $uploadedFile->storeAs('banners',$fileName,'public');
            }
            $banner->update($formFields+['slug'=>$slug]);
            return redirect()->route('banners')->with('message','Banner updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please check the required fields are filled.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {
        try{
            $banner = Banner::whereSlug($slug)->first();
            if(!empty($banner->image))
            {
                $image_path = public_path('storage/'.$banner->image);
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $banner->delete();
            return redirect()->route('banners')->with('message','Banner deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please check the required fields are filled.');
        }
    }

}
