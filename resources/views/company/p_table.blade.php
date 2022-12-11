<table class="table table-striped table-hovered">
    <thead>
        <tr>
            <th class="th-lg-1">No</th>
{{--            <th class="th-lg-1">Logo</th>--}}
            <th class="th-lg-2">Названия</th>
            <th class="th-lg-1">Адрес</th>
            <th class="th-lg-2">Число клиентов</th>
            {{-- <th class="th-lg-2">Əlaqə məlumatı</th> --}}
{{--            <th class="th-lg-1">Məhsul sayı</th>--}}
            {{-- <th class="th-lg-1">Qoşulma tarixi</th> --}}
{{--            <th class="th-lg-1">Status</th>--}}
            <th class="th-lg-1"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $item)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->clients->count()}}</td>
            <td>
                <div class="btn-group float-right">
                    <a
                        href="{{route('companies.edit', ['id' => $item->id])}}"
                        class="btn btn-warning btn-xs btn-flat pl-2 pr-2"
                        title="Редактировать">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a
                        href='#'
                        class="btn btn-danger btn-xs btn-flat  pl-2 pr-2 show-delete-modal-button"
                        title='Sil'
                        onclick="document.getElementById('elem_id').value='{{ $item->id }}';">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(function() {
        $(document).on('click', '.show-delete-modal-button', function() {
            $('#delete-modal').modal('show');
        });
    });
</script>
