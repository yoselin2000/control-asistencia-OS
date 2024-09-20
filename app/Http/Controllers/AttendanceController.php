<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function markEntry(Request $request)
    {
        $user = Auth::user();
        $now = now();
        $userIp = $request->ip();
        $allowedRange = '192.168.0.'; 

        \Log::info('User IP: ' . $userIp);

        if ($userIp !== '127.0.0.1' && $userIp !== 'localhost' && strpos($userIp, $allowedRange) !== 0) {
            // return response()->json(['error' => 'Debes estar conectado a la red de la oficina para marcar la entrada.', 'user_ip' => $userIp], 403);
            return redirect()->back()->with('error', 'Debes estar conectado a la red de la oficina para marcar la entrada.');
        }

        $attendance = Attendance::updateOrCreate(
            ['user_id' => $user->id, 'left_at' => null], // Condición para actualizar si aún no se ha registrado una salida
            [
                'marked_at' => $now, 
                'user_name' => $user->name, 
                'user_ip' => $userIp 
            ]
        );

        $message = 'Entrada marcada correctamente para el ' . $attendance->marked_at->format('d/m/Y') . ' a las ' . $attendance->marked_at->format('H:i');
        // return response()->json(['message' => $message, 'ip' => $userIp]);
        return redirect()->back()->with('message', 'Entrada marcada correctamente para ' . $user->name . ' el ' . $attendance->marked_at->format('d/m/Y') . ' a las ' . $attendance->marked_at->format('H:i'));
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
}