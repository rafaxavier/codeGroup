<!DOCTYPE html>
<html lang="en">
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

    <div class="container">
        <h1 class="mt-4">Editar cliente
            <a href="{{route('clientes')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
        </h1>

        <form class="form-group card card-body " action="{{ route('atualizar')}}" method="post" >
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$cliente->id}}">
            <label class="form-inline" for="nome">Nome:</label>
            <input id="nome" class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" value="{{$cliente->nome}}" placeholder="Insira o nome">
                @error('nome')
                    <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
                @enderror
            <br>

            <label for="cpf">CPF:</label>
            <input id="cpf" class="form-control @error('CPF') is-invalid @enderror" type="text" name="CPF" value="{{$cliente->CPF}}" placeholder="Insira o CPF">
                @error('CPF')
                    <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
                @enderror
            <br>

            <label for="email">E-mail:</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="e-mail" name="email" value="{{$cliente->email}}" placeholder="Insira o E-mail">
                @error('email')
                    <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
                @enderror
            <br>

            <label for="telefone">Telefone:</label>
            <input id="telefone" class="form-control @error('telefone') is-invalid @enderror" type="text" name="telefone" value="{{$cliente->telefone}}" placeholder="Insira o número de Telefone">
                @error('telefone')
                    <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
                @enderror
            <br>

            <label for="endereco">Endereço:</label>
            <textarea class="form-control @error('endereco') is-invalid @enderror" name="endereco" id="endereco" cols="30" rows="5">{{$cliente->endereco}}</textarea>
                @error('endereco')
                    <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
                @enderror

            <button class=" btn btn-success btn-lg mt-4" type="submit">Enviar</button>
        </form>
    </div>

</body>
</html>
