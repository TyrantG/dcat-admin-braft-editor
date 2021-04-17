<div class="{{$viewClass['form-group']}}">

    <label class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <braft-editor name="{{$name}}" value="{{$value}}"></braft-editor>

        <input type="hidden" class="braft" name="{{$name}}" value="{{ old($column, $value) }}" />

        @include('admin::form.help-block')

    </div>
</div>
