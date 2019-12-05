@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="row">
            <div class="col-md-6">
                <h1>{!! ($title)??null !!}</h1>
            </div>
            <div class="col-md-6 text-right ">
                <button type="button" class="btn btn-primary btn-sm btn-novo-registro">Novo Registro</button>
            </div>
        </div>
    </section>

    @include('layouts.includes.errors')

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Listagem</h3>
        </div>
        <div class="card-body">
            <div class="">
                {!!Form::open(['class' => 'form-vertical form-grid-pesquisa','url'=>route('admin.categorias.listagem')])!!}
                <div class="row">
                    <div class="col-md-6 offset-6">
                        {!! Form::cText('q',  null, null, ['class' => 'form-control ']) !!}
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div id="box-grid"></div>
        </div>
    </div>

@stop

@section('javascript')
    loadingDataGrid();
@stop
