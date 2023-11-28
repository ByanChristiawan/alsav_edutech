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

class CodekidzController extends Controller
{
    public function __construct() {
        $this->data['currentAdminMenu'] = 'codekidz';
    }
    public function index()
    {
        $this->data['currentAdminSubMenu'] = 'codekidz-materi';
        $user =  \Auth::user();
        $this->data['trainings'] = Training::where('type_training', 'codekidz')->orderBy('tahun', 'ASC')->paginate(10);

        return view('admin.codekidz.index', $this->data); 
    }
    public function create()
    {
        $this->data['currentAdminSubMenu'] = 'codekidz-materi';
        $tahunSekarang = date('Y');
        for ($i = $tahunSekarang; $i <= ($tahunSekarang + 3); $i++) {
            $this->data['tahunOptions'][$i] = $i;
        }
       
        return view('admin.codekidz.form', $this->data);
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
        $params['type_training'] = "codekidz";
 
        if (Training::create($params)) {
            Session::flash('success', 'Seminar has been saved');
        }
        return redirect('admin/codekidz');
    }
    public function edit(string $id)
    {
        if (empty($id)) {
            return redirect('admin/codekidz/create');
        }
        $this->data['currentAdminSubMenu'] = 'codekidz-materi';
        $tahunSekarang = date('Y');
        for ($i = $tahunSekarang; $i <= ($tahunSekarang + 3); $i++) {
            $this->data['tahunOptions'][$i] = $i;
        }
        $product = Training::findOrFail($id);

        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.codekidz.form', $this->data);
    }
    public function update(Request $request, string $id)
    {
        $params = $request->except('_token');
        $product = Training::findOrFail($id);
    
        $params['user_id'] = "2";
   
        if ($product->update($params)) {
            Session::flash('success', 'product has been updated.');
        }
        return redirect('admin/codekidz');
    }
    public function destroy(string $id)
    {
        $training = Training::find($id);
        $training->delete();
        Session::flash('success', 'Data berhasil dihapus.');

        return redirect('admin/codekidz');
    }
    public function materi_index($id)
    {
        $this->data['currentAdminSubMenu'] = 'codekidz-materi';
        $this->data['id'] = $id;
        $this->data['materis'] = Materi::where('training_id', $id)->orderBy('training_id', 'ASC')->paginate(10);

        return view('admin.codekidz.materi.index', $this->data);
    } 
    public function materi_create($id)
    {
        $this->data['currentAdminSubMenu'] = 'codekidz-materi';
        $this->data['id'] = $id;
       
         return view('admin.codekidz.materi.form', $this->data);
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
        return redirect('admin/codekidz/materi/'.$id);
    }
    public function materi_edit(string $id)
    {
        if (empty($id)) {
            return redirect('admin/codekidz/create');
        }
        $this->data['currentAdminSubMenu'] = 'codekidz-meteri';
        $product = Materi::findOrFail($id);
        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.codekidz.materi.form', $this->data);

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
        return redirect('admin/codekidz/materi/'. $product->training_id);
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
        $this->data['currentAdminSubMenu'] = 'codekidz-meteri';
        $this->data['id'] = $id;
        $this->data['materis'] = Materi::where('training_id', $id)->orderBy('training_id', 'ASC')->paginate(10);

        return view('admin.codekidz.materi.video.index', $this->data);
    } 
    public function video_create($id)
    {
        $this->data['currentAdminSubMenu'] = 'codekidz-meteri';
        $this->data['id'] = $id;
       
        return view('admin.codekidz.materi.video.form', $this->data);
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
        return redirect('admin/codekidz/materi/video/'.$id);
    }
    public function video_edit(string $id)
    {
        if (empty($id)) {
            return redirect('admin/trainings/create');
        }
        $this->data['currentAdminSubMenu'] = 'codekidz-meteri';
        $product = Materi::findOrFail($id);
        

        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.codekidz.materi.video.form', $this->data);

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
        return redirect('admin/codekidz/materi/video/'. $product->training_id);
    }
}
