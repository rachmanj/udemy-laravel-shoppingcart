<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description1'  => 'required',
            'description2'  => 'required',
            'slider_image'  => 'required'
        ]);

        // 1. get filename with extension
        $filenameWithExt = $request->file('slider_image')->getClientOriginalName();
        // 2. get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // 3. get just file extension
        $extension = $request->file('slider_image')->getClientOriginalExtension();
        // 4. create filename to store
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        // upload the file
        $request->file('slider_image')->storeAs('public/slider_images', $filenameToStore);

        $slider = new Slider();
        $slider->description1 = $request->description1;
        $slider->description2 = $request->description2;
        $slider->image = $filenameToStore;

        $slider->save();

        return redirect()->route('sliders.index')->with('status', 'New Slider successfully added');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description1' => 'required',
            'description2' => 'required',
        ]);

        $slider = Slider::find($id);
        $slider->description1 = $request->description1;
        $slider->description2 = $request->description2;

        if ($request->slider_image) {
            // 1. get filename with extension
            $filenameWithExt = $request->file('slider_image')->getClientOriginalName();
            // 2. get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // 3. get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            // 4. create filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // upload the file
            $request->file('slider_image')->storeAs('public/slider_images', $filenameToStore);

            $slider->image = $filenameToStore;
        }

        $slider->update();

        return redirect()->route('sliders.index')->with('status', 'Slider successfully updated');

    }

    public function destroy($id)
    {
        $slider = Slider::find($id);

        Storage::delete('public/slider_images/'.$slider->image);
        $slider->delete();

        return redirect()->route('sliders.index')->with('status', 'Slider successfully deleted');
    }

    public function activate($id)
    {
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->update();

        return redirect()->route('sliders.index');
    }

    public function deactivate($id)
    {
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->update();

        return redirect()->route('sliders.index');
    }
}
