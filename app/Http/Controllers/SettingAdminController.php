<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class SettingAdminController extends Controller
{
    use DeleteModelTrait;

    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings =  $this->setting::all();
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingAddRequest $request)
    {
        $this->setting
            ->create([
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
                'type' => $request->type
            ]);

        return redirect()
            ->route('admin.settings.index')
            ->with('msg', 'Add setting successfully !');
    }

    public function edit($id)
    {
        $setting = $this
            ->setting
            ->find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'config_key' => [
                'required',
                Rule::unique('settings')->ignore($id),
                'max:255'
            ],
            'config_value' => [
                'required',
                Rule::unique('settings')->ignore($id),
                'max:255'
            ],
        ]);

        $this->setting
            ->find($id)
            ->update([
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
                'type' => $request->type
            ]);

        return redirect()
            ->route('admin.settings.index')
            ->with('msg', 'Update setting successfully !');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }
}