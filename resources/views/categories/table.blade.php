<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Título</th>
                <th>Slug</th>
                <th>Descripción</th>
                <th>Activo</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td> {!!  substr($category->description,0,20) . '...' !!}</td>
                <td>
                    <label class="switch">
                        <input type="checkbox" x-on:change="changeActive({{ $category->id }},event)"  {{ $category->is_active == '1' ? 'checked' : null }} value="{{$category->is_active}}">
                        <span class="slider"></span>
                    </label>
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('categories.show', [$category->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('categories.edit', [$category->id]) }}" class='btn btn-default btn-xs'>
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

    {{ $categories->links() }}
</div>

@push('page_scripts')
    <script type="text/javascript">
        function changeActive(id, $event) {
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

            fetch("{{ route('categories.change-active') }}",
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
