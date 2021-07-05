<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'sliders');
            if (!empty($dataImageSlider)) {
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $this->slider->create($dataInsert);
                return redirect()->route('sliders.index');
            }
        } catch (Exception $e) {
            \Log::error('Lỗi: ' . $e->getMessage() . '--Line: ' . $e->getLine());
        }
    }

    public function edit($id)
    {
        $slider = $this->slider->findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'sliders');
            if (!empty($dataImageSlider)) {
                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
                $this->slider->findOrFail($id)->update($dataUpdate);
                return redirect()->route('sliders.index');
            }
        } catch (Exception $e) {
            \Log::error('Lỗi: ' . $e->getMessage() . '--Line: ' . $e->getLine());
        }
    }
    public function destroy($id)
    {
        try {
            $this->slider->findOrFail($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'deleted successfully'
            ], 200);
        } catch (Exception $e) {
            \Log::error('Lỗi: ' . $e->getMessage() . '--Line: ' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'delete fail'
            ], 500);
        }
    }
}
