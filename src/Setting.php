<?php

namespace TyrantG\BraftEditor;

use Dcat\Admin\Extend\Setting as Form;

class Setting extends Form
{
    public function title()
    {
        return '编辑器基础设置';
    }

    protected function formatInput(array $input)
    {
        $input['upload_url'] = $input['upload_url'] ?: '/admin/tyrantg/braft/upload';
        $input['upload_path'] = $input['upload_path'] ?: 'public/braft-files';

        return $input;
    }

    public function form()
    {
        $this->text('upload_url', '上传URL')->default('/admin/tyrantg/braft/upload');
        $this->text('upload_path', '上传路径')->default('public/braft-files');
    }
}
