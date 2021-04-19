<?php

namespace TyrantG\BraftEditor;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class DcatAdminBraftEditorServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function init()
    {
        parent::init();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'braft');

        $this->jsLoader();

        Admin::booting(function () {
            Form::extend('braftEditor', BraftEditor::class);
        });
    }

    public function settingForm()
    {
        return new Setting($this);
    }

    // 强制加载 js 文件以解决 vue 不挂载的情况
    public function jsLoader()
    {
        if (
            strtoupper(request()->method()) === 'GET' &&
            request()->path() != config('admin.route.prefix').'/auth/login'
        ) {
            Admin::script(<<<JS
$('#braft-script').remove()
$(document.body).append('<'+'script'+` id='braft-script' src='/vendor/dcat-admin-extensions/tyrantg/dcat-admin-braft-editor/js/braft-editor.min.js'>`+'<'+'/script>');
JS
            );
        }
    }
}
