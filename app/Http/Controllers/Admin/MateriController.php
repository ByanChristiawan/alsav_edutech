<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Session;


class MateriController extends Controller
{
    public function __construct() {
        $this->data['currentAdminMenu'] = 'catalog';
    }
    public function index($id)
    {
        $this->data['currentAdminSubMenu'] = 'product';
        $this->data['id'] = $id;
        $this->data['materis'] = Materi::where('training_id', $id)->orderBy('training_id', 'ASC')->paginate(10);

        return view('admin.trainings.materi.index', $this->data);
    }
    public function create($id)
    {
        $this->data['currentAdminSubMenu'] = 'product';
        $this->data['id'] = $id;
       
        return view('admin.trainings.materi.form', $this->data);
    }
    public function store(Request $request ,$id)
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
        return redirect('admin/trainings/materi/'.$id);
    }
    public function edit(string $id)
    {
        if (empty($id)) {
            return redirect('admin/trainings/create');
        }
        $this->data['currentAdminSubMenu'] = 'product';
        $product = Materi::findOrFail($id);

        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.trainings.materi.form', $this->data);

    }
    public function update(Request $request, string $id)
    {
        $params = $request->except('_token');
        $product = Materi::findOrFail($id);
        $convertedUrl = $this->convertDriveUrl($params['materi']);
        $params['materi'] = $convertedUrl;
        if ($product->update($params)) {
            Session::flash('success', 'product has been updated.');
        }
        return redirect('admin/trainings/materi/'. $product->training_id);
    }
    public function destroy(string $id)
    {
        $training = Materi::find($id);
        $training->delete();
        Session::flash('success', 'Data berhasil dihapus.');

        return redirect()->back();
    }

    //-------------------------------------------------------------------
    public function index2($id)
    {
        $this->data['currentAdminSubMenu'] = 'teacher';
        $this->data['id'] = $id;
        $this->data['materis'] = Materi::where('training_id', $id)->orderBy('training_id', 'ASC')->paginate(10);

        return view('admin.teachers.materi.index', $this->data);
    }
    public function create2($id)
    {
        $this->data['currentAdminSubMenu'] = 'teacher';
        $this->data['id'] = $id;
       
        return view('admin.teachers.materi.form', $this->data);
    }
    public function store2(Request $request ,$id)
    {
        $request->validate([ 
            'materi' => 'required', 
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
        return redirect('admin/trainings/materi-tc/'.$id);
    }
    public function edit2(string $id)
    {
        if (empty($id)) {
            return redirect('admin/trainings/create');
        }
        $this->data['currentAdminSubMenu'] = 'teacher';
        $product = Materi::findOrFail($id);

        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.teachers.materi.form', $this->data);

    }
    public function update2(Request $request, string $id)
    {
        $params = $request->except('_token');
        $product = Materi::findOrFail($id);
        $convertedUrl = $this->convertDriveUrl($params['materi']);
        $params['materi'] = $convertedUrl;
        if ($product->update($params)) {
            Session::flash('success', 'product has been updated.');
        }
        return redirect('admin/trainings/materi-tc/'. $product->training_id);
    }
    public function destroy2(string $id)
    {
        $training = Materi::find($id);
        $training->delete();
        Session::flash('success', 'Data berhasil dihapus.');

        return redirect()->back();
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

public function video2($id)
{
    $this->data['currentAdminSubMenu'] = 'teacher';
    $this->data['id'] = $id;
    $this->data['materis'] = Materi::where('training_id', $id)->orderBy('training_id', 'ASC')->paginate(10);

    return view('admin.teachers.materi.video.index', $this->data);
} 
public function video_create2($id)
    {
        $this->data['currentAdminSubMenu'] = 'teacher';
        $this->data['id'] = $id;
       
        return view('admin.teachers.materi.video.form', $this->data);
    } 

    public function video_store2(Request $request ,$id)
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
        return redirect('admin/trainings/materi-tc/video/'.$id);
    }

    public function video_edit2(string $id)
    {
        if (empty($id)) {
            return redirect('admin/trainings/create');
        }
        $this->data['currentAdminSubMenu'] = 'teacher';
        $product = Materi::findOrFail($id);
        

        $this->data['products'] = $product;
        $this->data['productID'] = $product->id;

        return view('admin.teachers.materi.video.form', $this->data);

    }

    public function video_update2(Request $request, string $id)
    {
        $params = $request->except('_token');
        $product = Materi::findOrFail($id);
        $images = $request->file('thumbnail');
        if ($images == null) {
            
        }else {
       
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
        return redirect('admin/trainings/materi-tc/video/'. $product->training_id);
    }

    
}
