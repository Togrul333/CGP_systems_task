@extends('_shared.master')
@section('title', $title)
@section('contents')
<form id='save-form' method="POST" action="{{route('companies.store')}}">
    @csrf
    <input type="hidden" name='company_id' value='{{$company ? $company->id : 0}}' />
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Главная страница</a></li>
                        <li class="breadcrumb-item"><a href="{{route('companies.index')}}">Компании</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <button type="submit" class="btn btn-warning btn-flat" title="Yaddaşa ver"><i class="fas fa-save mr-2"></i>Сохранить</button>
                        <a href="{{route('companies.index')}}" class="btn btn-default btn-flat" title="Geriyə"><i class="fas fa-arrow-left"></i></a>
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
                <div class="col-9 col-sm-9">
                    @include('company.p_inputs')
                </div>
                <div class="col-3 col-sm-3">
                </div>
            </div>
        </div>
    </section>

</form>

@endsection
