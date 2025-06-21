<!-- Hash Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hash', 'Hash:') !!}
    {!! Form::text('hash', null, ['class' => 'form-control', 'required', 'maxlength' => 36, 'maxlength' => 36]) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Expires At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expires_at', 'Expires At:') !!}
    {!! Form::text('expires_at', null, ['class' => 'form-control','id'=>'expires_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#expires_at').datepicker()
    </script>
@endpush

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_active', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_active', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_active', 'Is Active', ['class' => 'form-check-label']) !!}
    </div>
</div>