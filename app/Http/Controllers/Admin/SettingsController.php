<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{

    public function index()
    {
        $settings = Setting::paginate(10); 
        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'ssid' => 'required|string|max:255',  // SSID ingresado por el usuario
        ]);
    
        // Guardar el SSID en la base de datos como key 'ssid' y su valor correspondiente
        Setting::updateOrInsert(
            ['key' => 'ssid'], // Guardar el SSID en la columna 'key'
            ['value' => $request->ssid] // El valor del SSID se guarda en la columna 'value'
        );
    
        return redirect()->route('settings.index')->with('success', 'SSID guardado correctamente.');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ssid' => 'required|string|max:255', // SSID ingresado
        ]);
    
        // Actualizar el registro en la tabla settings
        $setting = Setting::findOrFail($id);
        $setting->update([
            'key' => 'ssid', // Asegurar que la clave es 'ssid'
            'value' => $request->ssid, // El valor es el SSID que ingresa el usuario
        ]);
    
        return redirect()->route('settings.index')->with('success', 'SSID actualizado correctamente.');
    }

    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Registro eliminado correctamente.');
    }
}
