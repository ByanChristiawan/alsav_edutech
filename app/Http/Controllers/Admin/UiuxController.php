<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Storage;
use File;

class UiuxController extends Controller
{
    public function __construct() {
        $this->data['currentAdminMenu'] = 'ui_ux';
    }
    public function index()
    {
        $this->data['currentAdminSubMenu'] = 'ui_ux_meteri';
        $user =  \Auth::user();
        $this->data['trainings'] = Training::where('type_training', 'ui_ux')->orderBy('tahun', 'ASC')->paginate(10);

        return view('admin.ui_ux.index', $this->data); 
        // dd($this->data);
    }

    public function create()
    {
        $this->data['currentAdminSubMenu'] = 'ui_ux_meteri';
        $tahunSekarang = date('Y');
        for ($i = $tahunSekarang; $i <= ($tahunSekarang + 3); $i++) {
            $this->data['tahunOptions'][$i] = $i;
        }
       
        return view('admin.ui_ux.form', $this->data);
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
        $params['type_training'] = "ui_ux";
 
        if (Training::create($params)) {
            Session::flash('success', 'Seminar has been saved');
        }
        return redirect('admin/ui_ux');
    }
    public function edit(string $id)
    {
        if (empty($id)) {
            return redirect('admin/ui_ux/create');
        }
        $this->data['currentAdminSubMenu'] = 'ui_ux_meteri';
        $tahunSekarang = date('Y');
        for ($i = $tahunSekarang; $i <= ($tahunSekarang + 3); $i++) {
            $this->data['tahunOptions'][$i] = $i;
        }
        $product = Training::findOrFail($id);

        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.ui_ux.form', $this->data);
    }
    public function update(Request $request, string $id)
    {
        $params = $request->except('_token');
        $product = Training::findOrFail($id);
    
        $params['user_id'] = "2";
   
        if ($product->update($params)) {
            Session::flash('success', 'product has been updated.');
        }
        return redirect('admin/ui_ux');
    }
    public function destroy(string $id)
    {
        $training = Training::find($id);
        $training->delete();
        Session::flash('success', 'Data berhasil dihapus.');

        return redirect('admin/ui_ux');
    }
    public function materi_index($id)
    {
        $this->data['currentAdminSubMenu'] = 'ui_ux_meteri';
        $this->data['id'] = $id;
        $this->data['materis'] = Materi::where('training_id', $id)->orderBy('training_id', 'ASC')->paginate(10);

        return view('admin.ui_ux.materi.index', $this->data);
    } 
    public function materi_create($id)
    {
        $this->data['currentAdminSubMenu'] = 'ui_ux_meteri';
        $this->data['id'] = $id;
       
         return view('admin.ui_ux.materi.form', $this->data);
    }
    
    public function materi_store(Request $request ,$id)
    {
        $request->validate([ 
            'materi' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048', 
        ]);
        $params = $request->except('_token');
       
        
        $image = $request->file('materi');
        $name = 'materi' . '_' . time();
        $fileName = $name . '.' . $image->getClientOriginalExtension();
        $folder = '/uploads/images/media';
        $filePath = $image->storeAs($folder, $fileName, 'public');
    
        $params['training_id'] = $id;
        $params['materi'] = $filePath;
        if (Materi::create($params)) {
            Session::flash('success', 'Materi has been saved');
        }
        return redirect('admin/ui_ux/materi/'.$id);
    }
    public function materi_edit(string $id)
    {
        if (empty($id)) {
            return redirect('admin/ui_ux/create');
        }
        $this->data['currentAdminSubMenu'] = 'ui_ux_meteri';
        $product = Materi::findOrFail($id);
        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.ui_ux.materi.form', $this->data);

    }
    public function materi_update(Request $request, string $id)
    {
        $params = $request->except('_token');
        $product = Materi::findOrFail($id);
        $image_path = $product->mater;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image = $request->file('materi');
        $name = 'materi' . '_' . time();
        $fileName = $name . '.' . $image->getClientOriginalExtension();
        $folder = '/uploads/images/media';
        $filePath = $image->storeAs($folder, $fileName, 'public');
        $params['materi'] = $filePath;

        if ($product->update($params)) {
            Session::flash('success', 'product has been updated.');
        }
        return redirect('admin/ui_ux/materi/'. $product->training_id);
    }
    
    public function materi_destroy(string $id)
    {
        $training = Materi::find($id);
        $image_path = $training->mater;
        File::delete($image_path);
        $training->delete();
        Session::flash('success', 'Data berhasil dihapus.');

        return redirect()->back();
    }
    public function video($id)
    {
        $this->data['currentAdminSubMenu'] = 'ui_ux_meteri';
        $this->data['id'] = $id;
        $this->data['materis'] = Materi::where('training_id', $id)->orderBy('training_id', 'ASC')->paginate(10);

        return view('admin.ui_ux.materi.video.index', $this->data);
    } 
    public function video_create($id)
    {
        $this->data['currentAdminSubMenu'] = 'ui_ux_meteri';
        $this->data['id'] = $id;
       
        return view('admin.ui_ux.materi.video.form', $this->data);
    }
    public function video_store(Request $request ,$id)
    {
        $request->validate([ 
            'title' => 'required',
            'video' => 'required',
            'thumbnail' => 'required',

        ]);
        $params = $request->except('_token');
       
        $image = $request->file('thumbnail');
        $name = 'thumbnail' . '_' . time();
        $fileName = $name . '.' . $image->getClientOriginalExtension();
        $folder = '/uploads/images/media/thumbnail';
        $filePath = $image->storeAs($folder, $fileName, 'public');
        
        $params['training_id'] = $id;
        $params['thumbnail'] = $filePath;
       
        if (Materi::create($params)) {
            Session::flash('success', 'Materi has been saved');
        }
        return redirect('admin/ui_ux/materi/video/'.$id);
    }
    public function video_edit(string $id)
    {
        if (empty($id)) {
            return redirect('admin/trainings/create');
        }
        $this->data['currentAdminSubMenu'] = 'ui_ux_meteri';
        $product = Materi::findOrFail($id);
        

        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.ui_ux.materi.video.form', $this->data);

    }
    public function video_update(Request $request, string $id)
    {
        $params = $request->except('_token');
        $product = Materi::findOrFail($id);
        $images = $request->file('thumbnail');
        if ($images == null) {
            
        }else {
        $image_path = $product->thumbnail;
        File::delete($image_path);
        $image = $request->file('thumbnail');
        $name = 'thumbnail' . '_' . time();
        $fileName = $name . '.' . $image->getClientOriginalExtension();
        $folder = '/uploads/images/media/thumbnail';
        $filePath = $image->storeAs($folder, $fileName, 'public');
        $params['thumbnail'] = $filePath;
               
        }
        if ($product->update($params)) {
            Session::flash('success', 'product has been updated.');
        }
        return redirect('admin/ui_ux/materi/video/'. $product->training_id);
    }
}
