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
        <nav>
            <h1>Clientes <a href="{{route('addCliente')}}"><i class="fa fa-user-plus" aria-hidden="true"></i></a> </h1>
        </nav>
        <div class="row">
            @foreach ($data as $key )
            <div class="mb-4" style="width: 350px;">
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
                        Endereço: {{ $key->endereco}}
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

                var id = $(this).val();
                var url = '{{ url("/") }}'+'/delete/';

                $.ajax({
                    url: url+id ,
                    method: 'delete' ,
                    success: function(){
                        window.location.href = '/'
                    }
                });
			});

            $('.btn_edit').click(function(){
                // console.log($(this).val());
                var id = $(this).val();
				window.location.href = '/edit/'+id;
			});

                // $('#btn_sair').click(function(){
				// 	window.location.href = '/sair';
				// });



		});
    </script>
</body>
</html>


