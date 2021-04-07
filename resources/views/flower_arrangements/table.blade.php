<div class="table-responsive">
    <table class="table" id="flowerArrangements-table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Slug</th>
                <th>Precio</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($flowerArrangements as $flowerArrangement)
            <tr>
                <td>{{ $flowerArrangement->title }}</td>
                <td>{{ $flowerArrangement->description }}</td>
                <td>{{ $flowerArrangement->slug }}</td>
                <td>{{ $flowerArrangement->price }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['flower-arrangements.destroy', $flowerArrangement->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('flower-arrangements.show', [$flowerArrangement->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('flower-arrangements.edit', [$flowerArrangement->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $flowerArrangements->links() }}
</div>
