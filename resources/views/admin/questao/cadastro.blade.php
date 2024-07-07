@extends('index')

@section('content')

<main>
    <form action="{{ route('inserir-questao') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Cadastro de Questão</h1>
        <h2>Digite o Enunciado da Questão</h2>
        <textarea name="enunciado" id="enunciado" cols="64" rows="16" autofocus></textarea>
        <div class="campo-de-digitacao">
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" id="imagem" accept="image/png,image/jpeg" oninput="escreverImagem(event)">
            <input type="text" id="nome-da-imagem" title="Cole o nome da imagem onde deseja que apareça no texto." readonly>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</main>

<script>
    function escreverImagem(event) {
        const imagemElement = document.getElementById("imagem");
        const imagem = imagemElement.files[0];
        document.getElementById("nome-da-imagem").value = imagem.name;
        imagemElement.value = URL.createObjectURL(imagem);
    }
</script>

@endsection