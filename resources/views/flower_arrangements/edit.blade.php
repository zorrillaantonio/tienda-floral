@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar Arreglo Floral</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($flowerArrangements, ['route' => ['flower-arrangements.update', $flowerArrangements->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('flower_arrangements.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('flower-arrangements.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
@push('page_scripts')
   <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>

    <script>
        var imgs = @json($imgs);
        var upload = new FileUploadWithPreview("mySecondImage", {
            presetFiles: imgs
        });

        window.addEventListener("fileUploadWithPreview:imageDeleted", function (e) {
            // e.detail.uploadId
            // e.detail.cachedFileArray
            // e.detail.addedFilesCount
            // Use e.detail.uploadId to match up to your specific input
            if (e.detail.uploadId === "mySecondImage") {
                console.log(e.detail.uploadId);
            }
        });
    </script>
@endpush

@push('page_css')

    <link
        rel="stylesheet"
        type="text/css"
        href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"
    />
@endpush
