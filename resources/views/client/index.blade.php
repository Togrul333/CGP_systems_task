@extends('_shared.master')
@section('title', $title)
@section('contents')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Главная страница</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a
                        href="{{route('clients.create')}}"
                        class="btn btn-warning btn-block btn-flat"
                        title="Новый клиент">
                        <i class="fas fa-plus-square mr-2"></i>Создать
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list-ol mr-2"></i>Список Клиентов</h3>
                    </div>
                    <div class="card-body">
                        @include('client.p_table', ['rows' => $data])
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <label>Общее количество:</label> {{ $total_count }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="delete-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title">Вы уверены, что хотите удалить?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body…</p>
                <form id='delete-form' action="{{ route('clients.destroy') }}" method="post">
                    @csrf
                    <input type="hidden" id="elem_id" name="id">
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-sm btn-danger" id="delete-submit-button">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(function () {
            $(document).on('click', '#delete-submit-button', function (e) {
                e.preventDefault();
                $('.error').html('');
                let form = $('#delete-form');
                let url = form.attr('action');
                let data = {};

                data['id'] = $('#elem_id').val();

                $.post(url, data, function (resp) {
                    if (resp.result == "success") {
                        $('#delete-modal').modal('hide');
                        setTimeout(()=>{
                            document.location = "{{ route('clients.index') }}";
                        },1000 * 2)
                        toastr.info('Данные удалены')
                    } else {
                        toastr.error('Произошла ошибка.')
                    }
                }).fail(function (data, status, msg) {
                    if (data.status == 422) {
                        for (let error of data.responseJSON.data) {
                            let field = error['field'];
                            let error_msg = error['errors'][0];
                            let elem = '#' + field + "_error_message";
                            $(elem).empty().html(error_msg);
                        }
                    }
                    toastr.error(data.status + " : " + data.responseJSON.message);
                });
            });
        });
    </script>
@endsection
