<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function __construct() {
        $this->data['currentAdminMenu'] = 'catalog';
    }
    public function index()
    {
        $this->data['currentAdminSubMenu'] = 'product';
        $this->data['trainings'] = Training::where('user_id', 2)->orderBy('tahun', 'ASC')->paginate(10);

        return view('admin.trainings.index', $this->data);
    }
    public function create()
    {
        $this->data['currentAdminSubMenu'] = 'product';
        $tahunSekarang = date('Y');
        for ($i = $tahunSekarang; $i <= ($tahunSekarang + 3); $i++) {
            $this->data['tahunOptions'][$i] = $i;
        }
       
        return view('admin.trainings.form', $this->data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'hari' => 'required',
            'type' => 'required', 
            
        ]);
        $params = $request->except('_token');
       
     
        $params['user_id'] = "2";
 
        if (Training::create($params)) {
            Session::flash('success', 'Seminar has been saved');
        }
        return redirect('admin/desktop-software/industrial-class');
    }
    public function edit(string $id)
    {
        if (empty($id)) {
            return redirect('admin/trainings/create');
        }
        $this->data['currentAdminSubMenu'] = 'product';
        $tahunSekarang = date('Y');
        for ($i = $tahunSekarang; $i <= ($tahunSekarang + 3); $i++) {
            $this->data['tahunOptions'][$i] = $i;
        }
        $product = Training::findOrFail($id);

        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.trainings.form', $this->data);
    }
    public function update(Request $request, string $id)
    {
        $params = $request->except('_token');
        $product = Training::findOrFail($id);
    
        $params['user_id'] = "2";
   
        if ($product->update($params)) {
            Session::flash('success', 'product has been updated.');
        }
        return redirect('admin/desktop-software/industrial-class');
    }
    public function destroy(string $id)
    {
        $training = Training::find($id);
        $training->delete();
        Session::flash('success', 'Data berhasil dihapus.');

        return redirect('admin/desktop-software/industrial-class');
    }

    //-------------------------------------------------------------------
    public function index2()
    {
        $this->data['currentAdminSubMenu'] = 'teacher';
        $this->data['trainings'] = Training::where('user_id', 3)->orderBy('tahun', 'ASC')->paginate(10);

        return view('admin.teachers.index', $this->data);
    }
    public function create2()
    {
        $this->data['currentAdminSubMenu'] = 'teacher';
        $tahunSekarang = date('Y');
        for ($i = $tahunSekarang; $i <= ($tahunSekarang + 3); $i++) {
            $this->data['tahunOptions'][$i] = $i;
        }
       
        return view('admin.teachers.form', $this->data);
    }
    public function store2(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'hari' => 'required',
            'type' => 'required', 
       
        ]);
        $params = $request->except('_token');
        $params['user_id'] = "3";
   
        if (Training::create($params)) {
            Session::flash('success', 'Seminar has been saved');
        }
        return redirect('admin/desktop-software/teacher');
    }
    public function edit2(string $id)
    {
        if (empty($id)) {
            return redirect('admin/trainings/create2');
        }
        $this->data['currentAdminSubMenu'] = 'teacher';
        $tahunSekarang = date('Y');
        for ($i = $tahunSekarang; $i <= ($tahunSekarang + 3); $i++) {
            $this->data['tahunOptions'][$i] = $i;
        }
        $product = Training::findOrFail($id);

        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.teachers.form', $this->data);
    }
    public function update2(Request $request, string $id)
    {
        $params = $request->except('_token');
        
        $product = Training::findOrFail($id);
        $params['user_id'] = "3";
       
        if ($product->update($params)) {
            Session::flash('success', 'product has been updated.');
        }
        return redirect('admin/desktop-software/teacher');
    }
    public function destroy2(string $id)
    {
        $training = Training::find($id);
        $training->delete();
        Session::flash('success', 'Data berhasil dihapus.');

        return redirect('admin/desktop-software/teacher');
    }

    public function convertDriveUrl($url)
{
    preg_match('/\/d\/([^\/]*)\//', $url, $matches);

    if (isset($matches[1])) {
        $fileId = $matches[1];
        $newUrl = "https://drive.google.com/uc?id={$fileId}";
        return $newUrl;
    } else {
        return $url;
    }
}
}
