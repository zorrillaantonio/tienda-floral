<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Titulo:') !!}
    <p>{{ $flowerArrangements->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{{ $flowerArrangements->description }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $flowerArrangements->slug }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Precio:') !!}
    <p>{{ $flowerArrangements->price }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('photoe', 'Fotos:') !!}
    <ul class="pgwSlideshow">
        @foreach($flowerArrangements->getMedia() as $media)
            <li><img src="{{asset($media->getFullUrl())}}" ></li>
        @endforeach
    </ul>
</div>
