<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;
use App\Models\Materi;

class SiswaController extends Controller
{
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('siswa.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'username' => 'Please login to access the dashboard.',
        ])->onlyInput('username');
    } 
    public function desktop()
    {
        if(Auth::check())
        {
            $trainings2023User2 = Training::where('user_id', 2)
            ->where('tahun', 2023)
            ->get();
            $this->data['products'] = $trainings2023User2;
            $this->data['tes'] = null;
            return view('siswa.desktop',$this->data);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'username' => 'Please login to access the dashboard.',
        ])->onlyInput('username');
    }
    public function sow(Request $request, $id)
    {
        if(Auth::check())
        {
            $trainings2023User2 = Training::where('user_id', 2)
            ->where('tahun', 2023)
            ->get();
            $tes = Materi::where('training_id', $id)
            ->get();
            $this->data['products'] = $trainings2023User2;
            $this->data['pictures'] = $tes;
            $this->data['tes'] = $id;
            return view('siswa.show',$this->data);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'username' => 'Please login to access the dashboard.',
        ])->onlyInput('username');
    } 
}
