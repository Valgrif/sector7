<x-layout>
    <x-layout-public.header />
    <main>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ url('/images/marcas.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('/images/comentarios.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('/images/especialidad.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Marketing messaging and featurettes
    ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <br>
        <!--ligera trampa -->
        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row" id="services">
                <div class="col-lg-4">
                    <img src="{{ url('/images/asesoramiento.png') }}" class="bd-placeholder-img rounded-circle"
                        width="140" height="140" alt="...">
                    <h2>Aseroramiento</h2>
                    <p>Realizamos estudios ténicos sobre las necesidades de tu empresa, ofreciendote así el mejor de los
                        equipos informáticos para tu trabajo.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="{{ url('/images/maintance.png') }}" class="bd-placeholder-img rounded-circle"
                        width="140" height="140" alt="...">
                    <h2>Mantenimiento</h2>
                    <p>Con nuestro equipo, contarás con el merjor serivicio de mantenimiento y prevención sobre tus
                        equipos informáticos.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="{{ url('/images/repair.png') }}" class="bd-placeholder-img rounded-circle" width="140"
                        height="140" alt="...">
                    <h2>Reparación</h2>
                    <p>Si un equipo falla dejanoslo en nuestras manos y será reparado en tiempo record</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->

            <br><br><br><br>
            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">
            <br><br><br><br>


            <div class="row featurette" id="aboutUs">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Somos una empresa nacida en el año 2011. <br><span
                            class="text-muted">
                            Con más de 10 años de experiencia</span></h2>
                    <p class="lead">Sector 7 nace para ofertar el mejor de los servicios de aseramiento,
                        mantenimiento y reparacón de equipos informáticos y eletrónicos. <br><br>
                        La empresa cuenta con un equipo de ocho técnicos, todos ellos con mas de 10 años de experiencia
                        en el sector.
                        <br><br>
                        Nuestro equipo lo conforman:
                    <ul class="lead">
                        <li>Técnicos Electrónicos</li><br>
                        <li>Técnicos Informáticos</li><br>
                        <li>Administradores de redes</li><br>
                        <li>Programadores web</li>
                    </ul>
                    <br>

                    </p>
                </div>
                <div class="col-md-5">
                    <img src="{{ url('/images/mac.png') }}" alt=""
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        width="auto" height="20%">
                </div>
            </div>
            <br><br><br><br>
            <hr class="featurette-divider">
            <br><br><br><br>


            <div class="row featurette" id="contact">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Contacta con nosotros!! <span class="text-muted">Estaremos encantados
                            de poder ayudarte.</span></h2>
                    <p class="lead">
                        <br> Teléfono: +34 922 10 20 30
                        <br> <br> Móvil: +34 666 333 666
                        <br> <br> email: sector7@gmail.com
                    <p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="{{ url('/images/contact.png') }}" alt=""
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        width="auto" height="20%">
                </div>
            </div>

            <br><br><br><br>
            <hr class="featurette-divider">

            <div class="row featurette" id="location">
                <div class="col-md-12">
                    <h2 class="featurette-heading">Donde estamos
                    </h2>
                    <p class="lead">Nos puedes encontrar en la C/Subida al Mayorazgo.</p>
                    <!--Google map-->
                    <x-layout-public.googleMaps />
                    <!--Google Maps-->
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->

    </main>

    <x-layout-public.footer />

</x-layout>
