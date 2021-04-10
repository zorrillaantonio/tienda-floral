<div class="col-12 col-sm-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                    <a
                    	class="nav-link active"
                    	id="custom-tabs-three-home-tab"
                    	data-toggle="pill"
                    	href="#custom-tabs-three-home"
                    	role="tab"
                    	aria-controls="custom-tabs-three-home"
                    	aria-selected="false"
                    >Arreglo</a>
                </li>
                <li class="nav-item">
                    <a
                    	class="nav-link"
                    	id="custom-tabs-three-profile-tab"
                    	data-toggle="pill"
                    	href="#custom-tabs-three-profile"
                    	role="tab"
                    	aria-controls="custom-tabs-three-profile"
                    	aria-selected="true"
                    >Imágenes</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">

                	<div class="row2">

	                	<!-- Title Field -->
						<div class="form-group col-sm-6">
						    {!! Form::label('category_id', 'Categoria:') !!}
						    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
						</div>

						<!-- Title Field -->
						<div class="form-group col-sm-6">
						    {!! Form::label('title', 'Title:') !!}
						    {!! Form::text('title', null, ['class' => 'form-control', 'onkeyup' => 'slugify(this)']) !!}
						</div>

						<!-- Slug Field -->
						<div class="form-group col-sm-6">
						    {!! Form::label('slug', 'Slug:') !!}
						    {!! Form::text('slug', null, ['class' => 'form-control', 'readonly' => true]) !!}
						</div>

						<!-- Price Field -->
						<div class="form-group col-sm-6">
						    {!! Form::label('price', 'Price:') !!}
						    {!! Form::number('price', null, ['class' => 'form-control']) !!}
						</div>

						<!-- Description Field -->
						<div class="form-group col-sm-12 col-lg-12">
						    {!! Form::label('description', 'Description:') !!}
						    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
						</div>

					</div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                	<div class="row2">
                		<div class="form-group col-sm-5">
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
                	</div>
                	<div class="row2 pt-3" style="background-color: #e2e2e2">
						@if(isset($edit))
							@foreach($flowerArrangements->getMedia() as $media)
								<div class="col-sm-2 mb-3" id="media_{{$media->id}}">
                            		<span
                            			x-on:click="deleteFile({{ $flowerArrangements->id }},'{{$media->id}}')"
                            			class="btn btn-danger btn-xs"
                            			style="position: absolute;"
                            		>
                            			<i class="far fa-trash-alt"></i>
                            		</span>
        							<img src="{{ asset($media->getFullUrl()) }}" width="150" style="max-width: 150px;max-height: 110px;" class="img-fluid img-rounded mx-auto" alt="" />
								</div>
							@endforeach
						@endif
                	</div>
                </div>
            </div>
        </div>
    <!-- /.card -->
    </div>
</div>
