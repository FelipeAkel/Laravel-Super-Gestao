@extends('email.layout.template')

@section('corpo-email')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">
        <!-- START MAIN CONTENT AREA -->
        <tr>
            <td class="wrapper">
            
                <p>Olá, {{ $parametrosEmail['nomeCliente'] }}</p>
                <p>Seu Produto: {{ $parametrosEmail['nomeProduto'] }}</p>

                <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                    class="btn btn-primary">
                    <tbody>
                        <tr>
                            <td align="left">
                                <table role="presentation" border="0" cellpadding="0"
                                    cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td> 
                                            <a href="https://www.linkedin.com/in/felipe-akel-carvalho-florentino-009412135/" target="_blank">
                                                Linkedin: Felipe Akel
                                            </a> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>Este é um modelo de e-mail muito simples. Seu único propósito é fazer com que o destinatário clique no botão sem distrações.</p>
                <p>E-mail automático favor não responder!</p>
            </td>
        </tr>
        <!-- END MAIN CONTENT AREA -->
    </table>
@endsection