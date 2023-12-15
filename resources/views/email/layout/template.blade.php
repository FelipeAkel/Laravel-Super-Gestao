<!doctype html>
<html>

    @include('email.layout._partial.head')

<body>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
            <td>&nbsp;</td>
            <td class="container">
                <div class="content">
                    <!-- START CENTERED WHITE CONTAINER -->
                    <span class="preheader">
                        Este é o texto do pré-cabeçalho. Alguns clientes mostrarão este texto como um visualização.
                    </span>

                    @yield('corpo-email')

                    @include('email.layout._partial.footer')

                    <!-- END CENTERED WHITE CONTAINER -->
                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</body>

</html>
