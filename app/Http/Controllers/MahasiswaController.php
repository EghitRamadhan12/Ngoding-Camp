<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    public function getAllData(){
        $data = MahasiswaModel::all();
        return view('index')->with('data', $data);
    }

    public function createData(Request $request) {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required',
            'address' => 'required'
        ]);

        if($validation->fails()){
            $errors = $validation->errors()->first();
            Alert::error('Error', $errors);
            return redirect()->back();
        }

        $data = new MahasiswaModel();
        $data->name = $request->name;
        $data->nim = $request->nim;
        $data->address = $request->address;
        $data->save();
        Alert::succes('Succes tambah data');
        return redirect()->back();
    }
}
