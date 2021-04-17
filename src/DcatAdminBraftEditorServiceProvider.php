<?php

namespace TyrantG\BraftEditor;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;

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

        Admin::booting(function () {
            Form::extend('braftEditor', BraftEditor::class);
        });
    }
}
