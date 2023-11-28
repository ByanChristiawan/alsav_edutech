<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;
use App\Models\Materi;

class GuruController extends Controller
{
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('guru.dashboard');
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
            $trainings2023User2 = Training::where('user_id', 3)
            ->where('tahun', 2023)
            ->get();
            $this->data['products'] = $trainings2023User2;
            $this->data['tes'] = null;
            return view('guru.desktop',$this->data);
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
            $trainings2023User2 = Training::where('user_id', 3)
            ->where('tahun', 2023)
            ->get();
            $tes = Materi::where('training_id', $id)
            ->get();
            $type = Training::where('id', $id)->firstOrFail();
            $this->data['products'] = $trainings2023User2;
            $this->data['pictures'] = $tes;
            $this->data['tes'] = $id;
            $this->data['type'] = $type;
            return view('guru.show',$this->data);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'username' => 'Please login to access the dashboard.',
        ])->onlyInput('username');
    } 
}
