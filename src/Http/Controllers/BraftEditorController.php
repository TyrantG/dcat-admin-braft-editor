<?php

namespace TyrantG\BraftEditor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TyrantG\BraftEditor\DcatAdminBraftEditorServiceProvider;

class BraftEditorController extends Controller
{
    public function upload(Request $request)
    {
        $upload_path = DcatAdminBraftEditorServiceProvider::setting('upload_path') ?: 'public/braft-files';

        $file = $request->file('file')->store($upload_path);

        $url = '/storage/'.str_replace('public/', '', $file);

        return response()->json([
            'return_code' => '200',
            'result_code' => 'SUCCESS',
            'msg' => '上传成功',
            'url' => $url,
        ]);
    }
}
