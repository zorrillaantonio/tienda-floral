<div class="table-responsive">
    <table class="table" id="flowerArrangements-table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Slug</th>
                <th>Precio</th>
                <th>Activo</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($flowerArrangements as $flowerArrangement)
            <tr>
                <td>{{ $flowerArrangement->title }}</td>
                <td>{!! $flowerArrangement->description !!}</td>
                <td>{{ $flowerArrangement->slug }}</td>
                <td>{{ $flowerArrangement->price }}</td>
                <td>
                    <label class="switch">
                        <input type="checkbox" x-on:change="changeActive({{ $flowerArrangement->id }},event)"  {{ $flowerArrangement->is_active == '1' ? 'checked' : null }} value="{{$flowerArrangement->is_active}}">
                        <span class="slider"></span>
                    </label>
                </td>
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

@push('page_scripts')
    <script type="text/javascript">
        function changeActive(id, $event) {
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

            fetch("{{ route('flower-arrangements.change-active') }}",
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": csrfToken
                    },
                    method: "post",
                    body: JSON.stringify({
                        "id": id,
                        "value": $event.target.value
                    })
                }
            )
            .then(response => response.json())
            .then(function(json){
                if (json.status == false) {
                    return 0;
                }

                $event.target.value = json.value;
            });
        }
    </script>
@endpush
