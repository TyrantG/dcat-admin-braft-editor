<?php

namespace TyrantG\BraftEditor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BraftEditorController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file')->store('public/braft-files');

        $url = '/storage/'.str_replace('public/', '', $file);

        return response()->json([
            'return_code' => '200',
            'result_code' => 'SUCCESS',
            'msg' => '上传成功',
            'url' => $url,
        ]);
    }
}
