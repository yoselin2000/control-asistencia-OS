<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;



class AttendanceController extends Controller
{
    //SOLO CON UNA RED WIFI SSID UNICO
    public function __construct()
    {
        $this->middleware('can:mark entry')->only('markEntry');
        $this->middleware('can:mark exit')->only('markExit');
    }

    public function markEntry(Request $request)
    {
        $user = Auth::user();
    $now = now();
    $userIp = $request->ip();
    \Log::info('User IP: ' . $userIp);

    $allowedRange = Setting::where('key', 'allowed_ip_range')->value('value');
    $expectedSSID = Setting::where('key', 'ssid')->value('value');

    $ssid = $this->getSSID();

    if ($ssid !== $expectedSSID) {
        return redirect()->back()->with('error', 'Debes estar conectado a la red correcta para marcar la entrada.');
    }

    if ($userIp !== '127.0.0.1' && $userIp !== 'localhost' && strpos($userIp, $allowedRange) !== 0) {
        return redirect()->back()->with('error', 'Debes estar conectado a la red de la oficina para marcar la entrada.');
    }

    $attendance = Attendance::updateOrCreate(
        ['user_id' => $user->id, 'left_at' => null],
        [
            'marked_at' => $now,
            'user_name' => $user->name,
            'user_ip' => $userIp
        ]
    );

    return redirect()->back()->with('message', 'Entrada marcada correctamente para ' . $user->name . ' el ' . $attendance->marked_at->format('d/m/Y') . ' a las ' . $attendance->marked_at->format('H:i'));
    }

    /**
     * Obtener el SSID de la red Wi-Fi.
     * 
     * @return string
     */
    private function getSSID()
    {
        $ssid = null;
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows
            $output = shell_exec('netsh wlan show interfaces');
            preg_match('/SSID\s*:\s*(.+)/', $output, $matches);
            if (isset($matches[1])) {
                $ssid = trim($matches[1]);
            }
        } else {
            // Linux/MacOS
            $output = shell_exec("nmcli -t -f active,ssid dev wifi | egrep '^yes' | cut -d\' -f2");
            if ($output) {
                $ssid = trim($output);
            }
        }

        return $ssid;
    }

    public function markExit()
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)
            ->whereNull('left_at')
            ->first();

        if ($attendance) {
            $attendance->update(['left_at' => now()]);
            $message = 'Salida marcada correctamente para el ' . $attendance->left_at->format('d/m/Y') . ' a las ' . $attendance->left_at->format('H:i');
            return redirect()->back()->with('message', $message);
        } else {
            return redirect()->back()->with('error', 'No se ha encontrado un registro de entrada.');
        }
    }

    public function report()
    {
        $attendances = Attendance::all(); 
        return view('attendance.report', compact('attendances'));
    }
}