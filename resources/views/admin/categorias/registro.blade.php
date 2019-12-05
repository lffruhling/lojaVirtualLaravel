@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="row">
            <div class="col-md-6">
                <h1>{!! ($title)??null !!}</h1>
            </div>
            <div class="col-md-6 text-right ">
                <button type="button" class="btn btn-primary btn-sm btn-listagem">Listagem</button>
            </div>
        </div>
    </section>


    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Registro</h3>
        </div>
        <div class="card-body">
            {!!Form::model($model, array('url' => Request::segment(1).'/'.Request::segment(2), 'class' => 'form-vertical frm-ajax'))!!}
            {!!Form::hidden('id')!!}

            <div class="row">
                <div class="col-md-12">
                    {!! Form::cText('nome', 'Nome') !!}
                </div>
            </div>

            <hr/>

            <div class="row">
                <div class="offset-8 col-md-2">
                    {!! Form::cCancelar('Cancelar') !!}
                </div>
                <div class="col-md-2">
                    {!! Form::cSubmmit('Salvar') !!}
                </div>
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@stop

@section('javascript')
    getDestinosCapa();
    getPrazosCapa();
    getParcelasCapa();
@endsection

<script>
    function getDestinosCapa() {
        var capa = $("input[name=spc_co_numero]").val();
        if (capa > 0) {
            $.ajax({
                url: "/admin/capas/destinos/listagem/" + capa,
                type: "GET",
                success: function (html) {
                    $(".box-destino-listagem").html(html);
                }
            });
        }

        return true;
    }
</script>
