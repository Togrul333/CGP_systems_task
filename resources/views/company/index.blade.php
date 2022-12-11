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
                        href="{{route('companies.create')}}"
                        class="btn btn-warning btn-block btn-flat"
                        title="Новая компания">
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
                        <h3 class="card-title"><i class="fas fa-list-ol mr-2"></i>Список компаний</h3>
                    </div>
                    <div class="card-body">
                        @include('company.p_table', ['rows' => $data])
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
                <form id='delete-form' action="{{ route('companies.destroy') }}" method="post">
                    @csrf
                    <input type="hidden" id="elem_id" name="id">
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault();document.forms['delete-form'].submit();">Удалить</button>
            </div>
        </div>
    </div>
</div>



@endsection
