<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exco;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class ExcoController extends Controller
{
    public function dashboard() {
        $excos = Exco::latest()->paginate(10);
        return view('admin.excos.index', compact('excos'));
    }

    public function create() {
        return view('admin.excos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);
$image_url = null;

if ($request->hasFile('image')) {

    Configuration::instance([
        'cloud' => [
            'cloud_name' => config('cloudinary.cloud_name'),
            'api_key'    => config('cloudinary.api_key'),
            'api_secret' => config('cloudinary.api_secret'),
        ],
        'url' => [
            'secure' => true,
        ],
    ]);

    $uploaded = (new UploadApi())->upload(
        $request->file('image')->getRealPath(),
        ['folder' => 'excos']
    );

    $image_url = $uploaded['secure_url'];
}

        Exco::create([
            'name' => $request->name,
            'position' => $request->position,
            'image_url' => $image_url
        ]);

        return redirect()->route('admin.excos.dashboard')->with('success', 'Exco created successfully!');
    }

    public function edit(Exco $exco){
        return view('admin.excos.edit', compact('exco'));
    }

    public function update(Request $request, Exco $exco){
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if($request->hasFile('image')){
            $uploaded = (new UploadApi())->upload($request->file('image')->getRealPath(), [
                'folder' => 'excos'
            ]);
            $exco->image_url = $uploaded['secure_url'];
        }

        $exco->name = $request->name;
        $exco->position = $request->position;
        $exco->save();

        return redirect()->route('admin.excos.dashboard')->with('success', 'Exco updated successfully!');
    }

    public function destroy(Exco $exco){
        $exco->delete();
        return redirect()->route('admin.excos.dashboard')->with('success', 'Exco removed successfully!');
    }
}