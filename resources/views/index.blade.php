<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>San Judas Tadeo</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

 
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

 
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  
  <link href="assets/css/main.css" rel="stylesheet">


<script src="{{url ('plugins/jquery/jquery.min.js')}}"></script>

  
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">cesaludsjt@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+58 412-5456446</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          
          <a href="https://www.facebook.com/centrosaludsjt" class="facebook"><i class="bi bi-facebook"></i></a>
          
        </div>
      </div>
    </div>

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{url ('/')}}" class="logo d-flex align-items-center me-auto">
          
          <h1 class="sitename">San Judas Tadeo</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Inicio<br></a></li>
            <li><a href="#about">Sobre Nosotros</a></li>
            <li><a href="#services">Servicios</a></li>
            <li><a href="#departments">Departamentos</a></li>
            <li><a href="#contact">Contacto</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="cta-btn d-none d-sm-block" href="{{url ('login')}}">Ingresar</a>

      </div>

    </div>

  </header>

  <main class="main">

    
    <section id="hero" class="hero section light-background">

      <img src="assets/img/hero.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative">

        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
          <h2>Bienvenido</h2>
          <p>Al Centro De Salud San Judas Tadeo</p>
        </div>

        <div class="content row gy-4">
          <div class="col-lg-4 d-flex align-items-stretch">
            
          </div>

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="d-flex flex-column justify-content-center">
              <div class="row gy-4">

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                    <i class="bi bi-clipboard-data"></i>
                    <h4>Respeto: La Base de Nuestra Atención</h4>
                    <p>Tratamos a cada persona con dignidad, porque creemos que el respeto es esencial para una atención médica de calidad. Aquí, todos importan</p>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                    <i class="bi bi-gem"></i>
                    <h4>Integridad: Confianza en lo que Hacemos</h4>
                    <p>Actuamos con ética y profesionalismo, guiados por principios que priorizan el bienestar y la autonomía de nuestros pacientes</p>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                    <i class="bi bi-inboxes"></i>
                    <h4>Compasión y Equipo: Cuidar Juntos</h4>
                    <p>Con empatía y colaboración, ofrecemos atención médica cálida y eficiente, porque la salud se construye en equipo</p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

    <br><br>

    <div class="container">


        <div class="col-md-12">
            <div class="card card-outline card-primary">
              
              <div class="card-header">
                <div class="row">
                  <div class="col-md-4">
                    <h3 class="card-title">Calendario de atención de doctores</h3>
                  </div>
                  <div class="col-md-4">
                    <div style="float: right">
                      <label for="consultorio_select">Consultorios</label>
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <select name="consultorio_id" id="consultorio_select" class="form-control">
                      <option value="">Seleccionar Consultorio</option>
                      @foreach ($consultorios as $consultorio)
                      <option value="{{$consultorio->id}}">{{$consultorio->nombre." -Capacidad: ".$consultorio->capacidad}}</option>
                      @endforeach
                     </select>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                
                <script>
                  $('#consultorio_select').on('change', function(){
                    var consultorio_id = $('#consultorio_select').val();
                    var url = "{{route ('cargar_datos_consultorios', ':id')}}";
                    url = url.replace(':id', consultorio_id);
                    if (consultorio_id){
                      $.ajax({
                        url: url,
                        type: 'GET',
                        success: function (data) {
                          $('#consultorio_info').html(data);
                        }, 
                        error: function (){
                          alert('Error al obtener los datos del consultorio');
                        }
                      });
                    } else{
                      $('#consultorio_info').html('');
                    }
                  });
                </script>
                <hr>
                <div id="consultorio_info">
          
                </div>
                
                
              </div>
            </div>



    </div>

    
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4 gx-5">

          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/sjt.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Sobre nosotros</h3>
            <p>
            En nuestro centro de salud, nos dedicamos a satisfacer las necesidades de la familia falconiana, ofreciendo servicios médicos de atención primaria y especializada con rapidez, calidad y eficiencia. Nos guía la visión de ser líderes en la prestación de servicios médicos, aportando excelencia, confianza y calidez a nuestra comunidad
            </p>
            <ul>
              <li>
                <i class="fa-solid fa-vial-circle-check"></i>
                <div>
                  <h5>El trabajo duro es necesario para obtener resultados</h5>
                  <p>Grandes facilidades y esfuerzos se combinan para rechazar lo innecesario, buscando siempre la libertad y el intercambio justo</p>
                </div>
              </li>
              <li>
                <i class="fa-solid fa-pump-medical"></i>
                <div>
                  <h5>MUna gran solución surge a través del esfuerzo y la práctica constante</h5>
                  <p>Donde el dolor se encuentra, también hay oportunidades para superarlo y encontrar distinción y elogio en la lucha</p>
                </div>
              </li>
              <li>
                <i class="fa-solid fa-heart-circle-xmark"></i>
                <div>
                  <h5>El placer y el esfuerzo van de la mano</h5>
                  <p>Y tanto la verdad como las grandes cosas llegan en su momento, incluso si el dolor aparece, siempre habrá un camino hacia la grandeza</p>
                </div>
              </li>
            </ul>
          </div>

        </div>

      </div>

    </section>

    

    </section>

    
    <section id="services" class="services section">

      
      <div class="container section-title" data-aos="fade-up">
        <h2>Servicios</h2>
       
      </div>

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="fas fa-heartbeat"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Atención Médica</h3>
              </a>
              <p>consulta para evaluación y tratamiento de diferentes condiciones de salud</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-pills"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Medicamentos</h3>
              </a>
              <p>dispensación de medicamentos con indicaciones claras para su uso adecuado</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-hospital-user"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Registro y Control</h3>
              </a>
              <p>gestión de datos médicos y citas para un mejor seguimiento del paciente</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-dna"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Pruebas De Laboratorio</h3>
              </a>
              <p>análisis clínicos para ayudar en el diagnóstico y control de enfermedades</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-wheelchair"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Accesibilidad Y Bienestar</h3>
              </a>
              <p>servicios orientados a garantizar la comodidad y el acceso a la atención médica</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-notes-medical"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Atención De Emergencias</h3>
              </a>
              <p>asistencia rápida y eficiente en casos de urgencia médica</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div>

        </div>

      </div>

    </section>

    

    

    
    <section id="departments" class="departments section">

      
      <div class="container section-title" data-aos="fade-up">
        <h2>Departamentos</h2>
       
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1">Cardiología</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Medicina General</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">Nutrición</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Pediatría</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-5">Fisioterapia</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="departments-tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cardiología</h3>
                    <p class="fst-italic">Nos especializamos en el estudio diagnóstico y tratamiento de enfermedades del corazón y el sistema circulatorio realizamos evaluaciones médicas como electrocardiogramas ecocardiografías y monitoreo de presión arterial para detectar problemas cardiovasculares ofrecemos planes de prevención y tratamiento personalizado para mejorar la salud del corazón y reducir riesgos</p>
                    
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/cardiologia.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="departments-tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Medicina General</h3>
                    <p class="fst-italic">Ofrecemos atención primaria para el diagnóstico y tratamiento de diversas enfermedades desde resfriados comunes hasta afecciones crónicas realizamos chequeos de rutina para la prevención y detección temprana de enfermedades además brindamos seguimiento a pacientes con condiciones médicas que requieren control continuo asegurando su bienestar y calidad de vida</p>
                   
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/generaal.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="departments-tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Nutrición</h3>
                    <p class="fst-italic">Proporcionamos asesoría nutricional personalizada para mejorar la alimentación y la calidad de vida de nuestros pacientes diseñamos planes de alimentación adecuados a las necesidades individuales para el manejo de enfermedades crónicas el control de peso y la promoción de hábitos saludables además educamos sobre la importancia de una buena nutrición en cada etapa de la vida</p>
                    
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/nutriciooon.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="departments-tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Pediatría</h3>
                    <p class="fst-italic">Brindamos atención médica especializada para bebés niños y adolescentes con un enfoque en su crecimiento desarrollo y prevención de enfermedades realizamos controles periódicos vacunación y tratamiento de afecciones pediátricas asegurando que cada niño reciba la mejor atención para un desarrollo saludable y adecuado</p>
                    
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/pediatraaaa.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="departments-tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fisioterapia</h3>
                    <p class="fst-italic">Ofrecemos tratamientos especializados para la rehabilitación y recuperación de lesiones musculares óseas y articulares utilizamos diversas técnicas terapéuticas como ejercicios personalizados masajes terapéuticos y electroterapia para mejorar la movilidad reducir el dolor y ayudar a los pacientes a recuperar su funcionalidad y calidad de vida</p>
                    
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/fisioterapiaaa.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>



    
    <section id="contact" class="contact section">

      
      <div class="container section-title" data-aos="fade-up">
        <h2>Como Contactarnos Y Encontrarnos</h2>
        
      </div>

      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3253.99812809159!2d-69.66499127447607!3d11.414183653602489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e842b0d30aea61f%3A0x65ea0397072a784!2sCentro%20de%20Salud%20San%20Judas%20Tadeo!5e1!3m2!1ses-419!2sus!4v1739937885533!5m2!1ses-419!2sus" width="600" height="450" style="border:0;" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Ubicacion</h3>
                <p>Calle Oswaldo Castellano/Qta San Judas Tadeo entre Avenida Independencia Y Calle Garces.</p>
              </div>
            </div>

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Llamanos</h3>
                <p>+58 412-5456446</p>
              </div>
            </div>

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Nuestro Email</h3>
                <p>cesaludsjt@gmail.com</p>
              </div>
            </div>

          </div>

          
           
          </div>

        </div>

      </div>

    </section>

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">San Judas Tadeo</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Calle Oswaldo Castellano/Qta San Judas Tadeo entre Avenida Independencia Y Calle Garces</p>
            <p>Coro, Edo Falcon 4101</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+58 412-5456446</span></p>
            <p><strong>Email:</strong> <span>cesaludsjt@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
          
            <a href="https://www.facebook.com/centrosaludsjt"><i class="bi bi-facebook"></i></a>
          
          </div>
        </div>


    <div class="container copyright text-center mt-4">


      <p xmlns:cc="http://creativecommons.org/ns#" >Esta obra está licenciada bajo <a href="https://creativecommons.org/licenses/by/4.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" style="display:inline-block;">CC BY 4.0<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt=""></a></p>


       <a href="https://bootstrapmade.com/">Basado En BootstrapMade, Modificado Para Este Proyecto</a>
      
       
      
      </div>
    </div>

  </footer>

  
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <div id="preloader"></div>

  
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


  <script src="assets/js/main.js"></script>

</body>

</html>