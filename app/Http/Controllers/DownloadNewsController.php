<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DownloadRequest;
use Illuminate\Support\Facades\Storage;

class DownloadNewsController extends Controller
{
    public function index(){
      return view('admin.download');
    }

    public function submit(DownloadRequest $request){
      $date =$this->getDate();
      $data = $request->except('_token','submit');
      $data['date publish'] =date("Y-m-d H:i");
      $this->formatAndSave($data);
      return view('output',['req' => $data]);
    }

    private function formatAndSave(array $data){
      $putContent = '';
      foreach ($data as $key => $value) {
        $putContent .= $key.":".$value."\n";
      }
      Storage::disk('public')->put('admin.txt', $putContent);
    }
}
