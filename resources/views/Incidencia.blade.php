@extends('templates.master3')
@section('titulo')NOVA INCIDENCIA @endsection
@section('principal')

<div class="card card-formulari">
    <div class="card-header card-header-formulari ">
        <h2>INCIDENCIA</h2>
    </div>
    <div id="accordion" class="card-body card-body-formulari">

        {{-- **************Dades incidencia******************** --}}
        <div>
            <div class="card-subheader card-subheader-formulari" id="headingOne" data-toggle="collapse"
                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h3 class="mb-0">Dades de la incidencia</h3>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-subbody card-subbody-formulari">
                    <p>Lorem, ipsum.</p>
                    <p>Lorem, ipsum.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti veritatis corrupti quasi
                        incidunt, esse quis animi accusamus consequuntur voluptatum tempora hic mollitia ratione facere
                        modi maiores, iusto libero fugit nesciunt sapiente commodi assumenda, illo beatae? Voluptates
                        voluptatum, quam facere nulla optio vitae saepe odio pariatur commodi, modi et quaerat quia.</p>
                </div>
            </div>
        </div>

        {{-- **************Dades alertant******************** --}}
        <div>
            <div class="card-subheader card-subheader-formulari" id="headingTwo" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <h3 class="mb-0">Dades de l'alertant</h3>
            </div>

            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-subbody card-subbody-formulari">
                    <p>Lorem, ipsum.</p>
                    <p>Lorem, ipsum.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti veritatis corrupti quasi
                        incidunt, esse quis animi accusamus consequuntur voluptatum tempora hic mollitia ratione facere
                        modi maiores, iusto libero fugit nesciunt sapiente commodi assumenda, illo beatae? Voluptates
                        voluptatum, quam facere nulla optio vitae saepe odio pariatur commodi, modi et quaerat quia.</p>
                </div>
            </div>
        </div>

        {{-- **************Dades afectats******************** --}}
        <div>
            <div class="card-subheader card-subheader-formulari" id="headingThree" data-toggle="collapse"
                data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <h3 class="mb-0">Dades dels afectats</h3>
            </div>

            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-subbody card-subbody-formulari">
                    <p>Lorem, ipsum.</p>
                    <p>Lorem, ipsum.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti veritatis corrupti quasi
                        incidunt, esse quis animi accusamus consequuntur voluptatum tempora hic mollitia ratione facere
                        modi maiores, iusto libero fugit nesciunt sapiente commodi assumenda, illo beatae? Voluptates
                        voluptatum, quam facere nulla optio vitae saepe odio pariatur commodi, modi et quaerat quia.</p>
                </div>
            </div>
        </div>

        {{-- **************Dades recursos mobils******************** --}}
        <div>
            <div class="card-subheader card-subheader-formulari" id="headingFour" data-toggle="collapse"
                data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <h3 class="mb-0">Dades dels recursos mobils</h3>
            </div>

            <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-subbody card-subbody-formulari">
                    <p>Lorem, ipsum.</p>
                    <p>Lorem, ipsum.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti veritatis corrupti quasi
                        incidunt, esse quis animi accusamus consequuntur voluptatum tempora hic mollitia ratione facere
                        modi maiores, iusto libero fugit nesciunt sapiente commodi assumenda, illo beatae? Voluptates
                        voluptatum, quam facere nulla optio vitae saepe odio pariatur commodi, modi et quaerat quia.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary">Guardar</button>
        <button class="btn btn-primary">Cancelar</button>
    </div>
</div>
@endsection