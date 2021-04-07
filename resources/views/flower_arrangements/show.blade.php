@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles del Arreglo Floral</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('flower-arrangements.index') }}">
                        Atrás
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('flower_arrangements.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection

@push('page_css')
    <link rel="stylesheet" href="{{asset('storage/css/pgwslideshow.min.css')}}" />
@endpush
@push('page_scripts')
    <script src="{{asset('storage/js/pgwslideshow.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.pgwSlideshow').pgwSlideshow();
        });
    </script>

@endpush
