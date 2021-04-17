<?php


namespace TyrantG\BraftEditor;

use Dcat\Admin\Form\Field;

class BraftEditor extends Field
{
    protected $view = 'braft::braft-editor';

    protected static $js = [
        '/vendor/dcat-admin-extensions/tyrantg/dcat-admin-braft-editor/js/braft-editor.min.js',
    ];
}
