<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
	{!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
	{!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
	{!! Form::label('description', 'Descripción:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
	{!! Form::label('is_active', 'Activo:') !!}
	<label class="checkbox-inline">
		{!! Form::hidden('is_active', 0) !!}
    	{!! Form::checkbox('is_active', 1, isset($category) ? $category->is_active : 1) !!}
    </label>
</div>
