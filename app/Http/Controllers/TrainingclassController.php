<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;

class TrainingclassController extends Controller
{
    public function dashboard()
    {
        if(Auth::check())
        {
            $user =  \Auth::user();
            $this->data['user'] = $user;
            return view('training_class.dashboard',$this->data);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'username' => 'Please login to access the dashboard.',
        ])->onlyInput('username');
    } 
    public function class($typeclass)
    {
   
        if(Auth::check())
        {
            $user =  \Auth::user();
            $trainings2023User2 = Training::where('type_training', $typeclass)
            ->where('tahun', 2023)
            ->get();
            if ($typeclass == 'website') {
                $this->data['data'] = 'Website';
            }elseif ($typeclass == 'codekidz') {
                $this->data['data'] = 'Codekidz';
            }elseif ($typeclass == 'mobile') {
                $this->data['data'] = 'Moblie App';
            }elseif ($typeclass == 'ui_ux') {
                $this->data['data'] = 'UI/UX with Figma';
            }elseif ($typeclass == 'ai_softwar') {
                $this->data['data'] = 'A.I Software';
            }else {
                $this->data['data'] = 'null';
            }
            $this->data['url'] = $typeclass;
            $this->data['user'] = $user;
            $this->data['products'] = $trainings2023User2;
            $this->data['tes'] = null;
            return view('training_class.class',$this->data);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'username' => 'Please login to access the dashboard.',
        ])->onlyInput('username');
    } 
  
    public function app($classname, $id)
    {
        if(Auth::check())
        {
            $trainings2023User2 = Training::where('type_training', $classname)
            ->where('tahun', 2023)
            ->get();
            $tes = Materi::where('training_id', $id)
            ->get();
            $type = Training::where('id', $id)->firstOrFail();
             $user =  \Auth::user();
            $this->data['products'] = $trainings2023User2;
            $this->data['pictures'] = $tes;
            $this->data['tes'] = $id;
            $this->data['type'] = $type;
            $this->data['user'] = $user;
            if ($classname == 'website') {
                $this->data['data'] = 'Website';
            }elseif ($classname == 'codekidz') {
                $this->data['data'] = 'Codekidz';
            }elseif ($classname == 'mobile') {
                $this->data['data'] = 'Moblie App';
            }elseif ($classname == 'ui_ux') {
                $this->data['data'] = 'UI/UX with Figma';
            }elseif ($classname == 'ai_softwar') {
                $this->data['data'] = 'A.I Software';
            }else {
                $this->data['data'] = 'null';
            }
            $this->data['url'] = $classname;
            
            return view('training_class.show',$this->data);
    }
        return redirect()->route('login')
        ->withErrors([
        'username' => 'Please login to access the dashboard.',
    ])->onlyInput('username');
    }
   
}
