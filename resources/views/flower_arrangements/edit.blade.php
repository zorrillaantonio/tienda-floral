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

            {!! Form::model($flowerArrangements, ['route' => ['flower-arrangements.update', $flowerArrangements->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

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
        var upload = new FileUploadWithPreview("mySecondImage");

        window.addEventListener("fileUploadWithPreview:imageDeleted", function (e) {
            // e.detail.uploadId
            // e.detail.cachedFileArray
            // e.detail.addedFilesCount
            // Use e.detail.uploadId to match up to your specific input
            if (e.detail.uploadId === "mySecondImage") {
                console.log(e.detail.uploadId);
            }
        });

        function deleteFile(arrangement_id, media_id) {

           let res = confirm('Desea eliminar la foto?');

           if (res == false) { return 0}

           const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

            fetch("{{ route('flower-arrangements.delete-file') }}",
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": csrfToken
                    },
                    method: "post",
                    body: JSON.stringify({
                        "media_id": media_id,
                        "arrangement_id": arrangement_id
                    })
                }
            )
            .then(response => response.json())
            .then(function(json){
                if (json.status) {
                    document.querySelector('div#media_' + media_id).remove();
                }
            });
        }

    </script>
@endpush

@push('page_css')

    <link
        rel="stylesheet"
        type="text/css"
        href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"
    />
    <style type="text/css">
        .row2{
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px;
        }
    </style>
@endpush
