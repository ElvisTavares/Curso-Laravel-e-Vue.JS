Fornecedor

{{-- @if/else--}}

{{--@dd($fornecedores)--}}
<hr>
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem menos de 10 fornecedores</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem varios fornecedores</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif
<hr>

{{--unless inversao do if--}}

Fornecedor :  {{ $fornecedores[0]['nome'] }}
<br>
@empty($fornecedores[0]['status'])
    --Vazio
@endempty
<br><br>
<hr>
{{--while--}}

@php $i = 0 @endphp
@while(isset($fornecedores[$i]))
    Fornecedor : {{ $fornecedores[$i]['nome'] }}
    <br>
    Status : {{ $fornecedores[$i]['status'] }}
    <br>
    <hr>
    @php $i++ @endphp
@endwhile

<br><hr><br>

{{--foreach--}}

@foreach($fornecedores as $indice => $fornecedor)
    Fornecedor: {{ $fornecedor['nome']}}
    <br>
    Status: {{ $fornecedor['status']}}
    <br>
@endforeach

{{--foreach--}}