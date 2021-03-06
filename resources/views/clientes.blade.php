<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Document</title>
</head>
<body>

    <div class="container-fluid p-5 ">
        <div class="row">
            <div class="col-lg-10">
                <h1>Clientes <a href="{{route('addCliente')}}"><i class="fa fa-user-plus" aria-hidden="true"></i></a> </h1>
            </div>
            <div class="col-lg-2 mb-3">
                <div class="input-group  ">
                    <input type="text" id="input_busca" class="form-control" placeholder="Buscar por CPF">
                    <div class="input-group-append">
                      <button class="btn btn-success btn_busca" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($data as $key )
            <div class="mb-4" style="width: 368px;">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="">
                                {{ $key->nome}}
                            </div>
                            <div class="">
                                <button class="btn btn-warning btn-sm btn_edit" value="{{$key->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                <button class="btn btn-danger btn-sm btn_del" value="{{$key->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="height:200px" >
                        CPF: {{ $key->CPF}} <br>
                        Telefone: {{ $key->telefone}} <br>
                        E-mail: {{ $key->email}} <br>
                        Endere??o: {{ $key->endereco}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- paginacao --}}
        {{ $data->links()}}
    </div>


    <script  type="text/javascript">
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

        $(document).ready(function(){
            $('.btn_del').click(function(){
                var resposta = confirm("Deseja remover esse registro?");
                if (resposta == true) {

                var id = $(this).val();
                var url = '{{ url("/") }}'+'/delete/';

                    $.ajax({
                        url: url+id ,
                        method: 'delete' ,
                        success: function(){
                            window.location.href = '/'
                        }
                    });

                }
			});

            $('.btn_edit').click(function(){
                var id = $(this).val();
				window.location.href = '/edit/'+id;
			});

            $('.btn_busca').click(function(){
                var s = $('#input_busca').val();
                if(s !== ''){
                    window.location.href = '/busca/'+s;
                }else{
                    window.location.href = '/';
                }
			});

		});
    </script>
</body>
</html>


