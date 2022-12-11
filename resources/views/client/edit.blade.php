@extends('_shared.master')
@section('title', $title)
@section('contents')
    <form id='save-form' method="POST" action="{{route('clients.store')}}">
        @csrf
        <input type="hidden" name='client_id' id="client_id" value='{{$client ? $client->id : 0}}'/>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная страница</a></li>
                            <li class="breadcrumb-item"><a href="{{route('companies.index')}}">Клиенты</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            <button type="submit" class="btn btn-warning btn-flat" id="save-form-submit-button"
                                    title="Сохранить"><i class="fas fa-save mr-2"></i>Сохранить
                            </button>
                            <a href="{{route('companies.index')}}" class="btn btn-default btn-flat" title="Geriyə"><i
                                    class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="interactive_zone" style="padding: 2px 20px;">
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 col-sm-8">
                        @include('client.p_inputs')
                    </div>
                    <div class="col-4 col-sm-4">
{{--                        @include('client.p_input_companies')--}}
                    </div>
                </div>
            </div>
        </section>

    </form>

@endsection
@section('js')
    <script>
        $(function () {
            $(document).on('click', '#save-form-submit-button', function (e) {
                e.preventDefault();
                $('.error').html('');
                let form = $('#save-form');
                let url = form.attr('action');
                let data = {};

                data['client_id'] = $('#client_id').val();
                data['name'] = $('#name').val();
                data['address'] = $('#address').val();
                data['number'] = $('#number').val();

                $.post(url, data, function (resp) {
                    if (resp.result == "success") {
                        setTimeout(() => {
                            document.location = "{{ route('clients.index') }}";
                        }, 1000 * 2)
                        toastr.info('Данные сохранены')
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
