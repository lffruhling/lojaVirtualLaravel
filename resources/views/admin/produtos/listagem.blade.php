<div class="panel-body">
    @if(!empty($grid->items()))

        <table class="table table table-striped table-bordered">
            <tr>
                <th class="">#</th>
                <th class="">Categoria</th>
                <th class="">Nome</th>
                <th class="">Preço</th>
                <th class="">Estoque</th>
                <th class=""></th>
            </tr>
            @foreach($grid AS $row)
                <tr>
                    <td>{!! $row->id !!}</td>
                    <td>{!! $row->categorias->nome !!}
                    <td>{!! $row->nome !!}
                    <td nowrap>R$ {!! number_format($row->preco, 2, ",",".") !!}
                    <td>{!! $row->estoque !!}
                    <td class="text-center">
                        <a href="{!! route('admin.produtos.edicao', ['id' => $row->id]) !!}" class=" margin-b-xs "><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $grid->appends($params)->render() !!}
    @else
        <div class='margin alert alert-danger'>Nenhum registro encontrado</div><br/>
    @endif
</div>
