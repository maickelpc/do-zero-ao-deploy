<p>Olá {{$usuario->nome}}, recebemos os dados do seu cadastro no sistema de leilão!</p>

<p>Se você não fez esse cadastro, desconsidere este email!</p>

<br>

<p>Para confirmar seu email, clique no link abaixou, ou informe use o código de confirmação no site</p>

<p> <a href="{{ route('confirmar-email-get', [ 'codigo' => $usuario->codigo_confirmacao, 'idUsuario' => $usuario->id ]) }}">Clique aqui para confirmar seu email</a> </p>

<h4>Código de confirmação: {{$usuario->codigo_confirmacao}}</h4>

<p>Sistema de Leilão</p>
