<div class="btn-group" role="group">
    {!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message] ) !!}
        <a class="btn btn-xs btn-warning" href="{{ $edit_url }}"><i class="fa fa-edit"></i></a>
        <button type="submit" onclick="return confirm('Anda Yakin?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
    {!! Form::close()!!}
</div>