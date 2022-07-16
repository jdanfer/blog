@extends('master')

@section('titulos')
    Blog de Hack Academy
@endsection

@section('content')
<div class="container">

    <h1 class="mt-4 mb-3">Contacto</h1>

    <hr class="mb-4">

    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3>Envianos un mensaje</h3>
            <form name="sentMessage" id="contactForm">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Nombre Completo:</label>
                        <input type="text" class="form-control" id="name">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Teléfono:</label>
                        <input type="tel" class="form-control" id="phone">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Email:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Mensaje:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" maxlength="999" style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Enviar mensaje</button>
            </form>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
            <h3>Datos de Contacto</h3>
            <p>
                21 de Setiembre 2281 esq. Blvr. España.
                <br>Parque Rodó, Montevideo, Uruguay.
            </p>
            <p>
                <abbr title="Teléfono">P</abbr>: +598 2412 9991.
            </p>
            <p>
                <abbr title="Celular">M</abbr>: +598 96 110 111.
            </p>
            <p>
                <abbr title="Email">E</abbr>:
                <a href="mailto:hola@ha.edu.uy">hola@ha.edu.uy</a>.
            </p>
            <p>
                <abbr title="Horario">H</abbr>: Lunes - Viernes: 08:30 hs a 22:00 hs.
            </p>
        </div>
    </div><!-- /.row -->

    <!-- Contact Form -->
    <div class="row">
        <div class="col-lg-8 mb-4">

        </div>

    </div><!-- /.row -->

</div><!-- /.container -->


@endsection