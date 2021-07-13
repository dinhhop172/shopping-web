<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    use DeleteModelTrait;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }
    public function create()
    {
        return view('admin.setting.add');
    }
    public function store(SettingAddRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);
        return redirect()->route('settings.index');
    }
    public function edit($id)
    {
        $setting = $this->setting->findOrFail($id);
        return view('admin.setting.edit', compact('setting'));
    }
    public function update(SettingAddRequest $request, $id)
    {
        $this->setting->findOrFail($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ]);
        return redirect()->route('settings.index');
    }

    public function destroy($id)
    {
        return $this->DeleteModel($id, $this->setting);
    }
}
