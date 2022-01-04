@component('mail::message')

<h1>Você recebeu um e-mail do site</h1>

<ul>
    <li><b>Nome:</b> {{ $name }}</li>
    <li><b>E-mail:</b> {{ $email }}</li>
    <li><b>Telefone:</b> {{ $phone }}</li>
    <li><b>Mensagem:</b><br> {{ $description }}</li>
</ul>

<p>E-mail enviado em {{ date('d/m/Y H:i:s') }}</p>

@endcomponent

