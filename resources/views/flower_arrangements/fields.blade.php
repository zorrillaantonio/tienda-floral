<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Categoria:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    <div class="demo-upload-container" role="main">
       <div class="custom-file-container" data-upload-id="mySecondImage">
                <label>
                	Subir Fotos
                	<a
                		href="javascript:void(0)"
                		class="custom-file-container__image-clear"
                		title="Clear Image"
                	>
                		&times;
                	</a>
                </label>
                <label class="custom-file-container__custom-file" >
                    <input
                        type="file"
                        class="custom-file-container__custom-file__custom-file-input"
                        accept="*"
                        multiple
                        aria-label="Elegir Foto"
                        name="photos[]"
                        value="{{ old('photos') }}"
                    >
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>
    </div>
</div>
