<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $category->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Título:') !!}
    <p>{{ $category->title }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $category->slug }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{!! $category->description !!}</p>
</div>

<!-- Bol Activo Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Activo:') !!}
    <p>
    @if ($category->is_active == true)
      <span class="badge badge-primary">Activo</span>
    @else
      <span class="badge badge-secondary">Desactivo</span>
    @endif
    </p>
</div>
