<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>MaterialFlow</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;800&display=swap');
        *{
            padding: 0px;
            margin: 0px;
        }
        body{
          font-family:'Poppins', sans-serif;
        }
        .landing-page{
            height: 500px;
            background-image: url("{{asset('truck1.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .landing-page h1{
            font-size: 4rem;
            color: #ff8e36;
        }
        .landing-page h6{
            font-size: 2rem;
        }
        h1{
            font-size: 3rem;
        }
        p{
            font-size: 1.3rem;
        }
        img{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .contact{
            background-color: #123640;
        }
        .top{
            background-image: url("{{asset('footer.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
            height: 350px;
        }
        @media screen and (max-width: 576px) {
            .nav-link:hover{
                text-align: center;
                background-color: #F38630;
                color: #FFFFFF !important;
            }
        }
        
    </style>
</head>
<body>
    <div style="background-color:  #FBFBFB;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg nav-underline">
            <div class="container-fluid">
                <a class="navbar-brand fs-3 fw-bold" href="#" data-aos="zoom-in-down" data-aos-delay="100">MaterialFlow</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" data-aos="zoom-in-down" data-aos-delay="100">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto text-center" data-aos="zoom-in-down" data-aos-delay="100">
                        <a class="nav-link" aria-current="page" href="#home">Home</a>
                        <a class="nav-link" href="#aboutus">About Us</a>
                        <a class="nav-link" href="#services">Services</a>
                        <a class="nav-link" href="#contact">Contact</a>
                        <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                        <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Home -->
         <div class="landing-page d-flex flex-row flex-wrap align-items-center" id="home">
            <div class="container text-wrap">
                <h1 class="fw-bold" data-aos="fade-right" data-aos-delay="200">MaterialFlow</h1>
                <h6 class="text-white "  data-aos="fade-right" data-aos-delay="200">Filling the gaps in the supply chain requirements.</h6><br>
                <p class="text-white"  data-aos="fade-right" data-aos-delay="200">we look after your supply chain & logistic challanges,<br> so you can focus on your core business to achieve your objective</p>
            </div>
         </div>

        <!-- About Us -->
         <div class="container">
             <div class="row min-vh-100" id="aboutus">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex flex-column justify-content-center align-items-start" >
                    <h4 class="mb-2 mt-5" data-aos="zoom-in" data-aos-delay="200">Who are we?</h4>
                    <h1 class="fw-bold mb-5 mt-3" style="color: #F38630;" data-aos="zoom-in" data-aos-delay="200">MaterialFlow</h1>
                    <p class="text-dark" data-aos="zoom-in" data-aos-delay="200">MaterialFlow is a platform that connects suppliers and customers in a simple and efficient way.<br>
                            Our platform provides a platform that connects suppliers and customers in a simple and efficient way.<br>
                            MaterialFlow is a platform that connects suppliers and customers in a simple and efficient way.</p>
                </div>
    
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex flex-row justify-content-center align-items-center mt-5" data-aos="zoom-in" data-aos-delay="500">
                    <img src="{{asset('truck3.png') }}" alt="" class="img-fluid rounded text-center" style="max-height: 500px; width: 100%;">
                </div>
             </div>
         </div>

        <!-- Our Commitment -->
        <div class="d-flex justify-content-center my-3" style="background-color: #F38630;">
            <div class="text-center my-3" data-aos="zoom-in">
                <h4 class="text-white fw-bold">Our Commitment</h4>
                <h1 class="fw-bold text-dark">Vision & Mission</h1>
            </div>
        </div>
        <div class="min-vh-100" style="background-color: #123640;">
            <div class="container">
                <div class="row g-3 pt-5 w-100 align-items-center">
                    <div class="col-12 col-sm-12 col-md-6  p-2 d-flex flex-column justify-content-center align-items-center">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDBweCIgaGVpZ2h0PSIzMDBweCIgdmlld0JveD0iMCAwIDI1NiAyNTYiPjxwYXRoIGZpbGw9IiNGMzg2MzAiIGQ9Im0yNDkuOTQgMTIwLjI0bC0yNy4wNS02Ljc2YTk1Ljg2IDk1Ljg2IDAgMCAwLTgwLjM3LTgwLjM3bC02Ljc2LTI3YTggOCAwIDAgMC0xNS41MiAwbC02Ljc2IDI3LjA1YTk1Ljg2IDk1Ljg2IDAgMCAwLTgwLjM3IDgwLjM3bC0yNyA2Ljc2YTggOCAwIDAgMCAwIDE1LjUybDI3LjA1IDYuNzZhOTUuODYgOTUuODYgMCAwIDAgODAuMzcgODAuMzdsNi43NiAyNy4wNWE4IDggMCAwIDAgMTUuNTIgMGw2Ljc2LTI3LjA1YTk1Ljg2IDk1Ljg2IDAgMCAwIDgwLjM3LTgwLjM3bDI3LjA1LTYuNzZhOCA4IDAgMCAwIDAtMTUuNTJabS05NS40OSAyMi45TDEzOS4zMSAxMjhsMTUuMTQtMTUuMTRMMjE1IDEyOFptLTUyLjkgMEw0MSAxMjhsNjAuNTctMTUuMTRMMTE2LjY5IDEyOFptMTA0LjIyLTMzLjk0TDE1OC42IDk3LjRsLTExLjgtNDcuMTdhNzkuODggNzkuODggMCAwIDEgNTguOTcgNTguOTdtLTYyLjYzLTcuNjVMMTI4IDExNi42OWwtMTUuMTQtMTUuMTRMMTI4IDQxWk0xMDkuMiA1MC4yM0w5Ny40IDk3LjRsLTQ3LjE3IDExLjhhNzkuODggNzkuODggMCAwIDEgNTguOTctNTguOTdtLTU5IDk2LjU3bDQ3LjIgMTEuOGwxMS44IDQ3LjE3YTc5Ljg4IDc5Ljg4IDAgMCAxLTU4Ljk3LTU4Ljk3Wm02Mi42MyA3LjY1TDEyOCAxMzkuMzFsMTUuMTQgMTUuMTRMMTI4IDIxNVptMzMuOTQgNTEuMzJsMTEuOC00Ny4xN2w0Ny4xNy0xMS44YTc5Ljg4IDc5Ljg4IDAgMCAxLTU4Ljk0IDU4Ljk3WiIvPjwvc3ZnPg==" alt="" class="img-fluid mb-3" data-aos="zoom-in" data-aos-delay="500">

                        <h4 class="text-white text-center fw-bold" data-aos="zoom-in" data-aos-delay="500">Vision</h4>                            
                        <p class="text-white text-center" data-aos="zoom-in" data-aos-delay="500">To become the "Supply Chain & Logistics Department" for every business entity in the world.</p>
                    </div> 
            
                    <div class="col-12 col-sm-12 col-md-6  p-2 d-flex flex-column justify-content-center align-items-center pt-4">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MDBweCIgaGVpZ2h0PSI0MDBweCIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBmaWxsPSIjRjM4NjMwIiBkPSJNMTEuNjkxIDEuMDM4QS41LjUgMCAwIDEgMTIgMS41VjRoMi41YS41LjUgMCAwIDEgLjM1NC44NTRsLTIgMkEuNS41IDAgMCAxIDEyLjUgN0g5LjcwN2wtLjc0Ljc0MUExIDEgMCAwIDEgOCA5YTEgMSAwIDAgMS0xLTFsLjAwMS0uMDQ2YTEgMSAwIDAgMSAxLjI1OC0uOTJMOSA2LjI5M1YzLjVhLjUuNSAwIDAgMSAuMTQ2LS4zNTRsMi0yYS41LjUgMCAwIDEgLjU0NS0uMTA4TTEyLjI5MyA2bDEtMUgxMS41YS41LjUgMCAwIDEtLjUtLjVWMi43MDdsLTEgMVY2em0xLjY1MiAxLjE3NnEuMDU2LjQwNS4wNTYuODI1YTYgNiAwIDEgMS01LjE3OC01Ljk0NWwtLjM4My4zODNhMS41IDEuNSAwIDAgMC0uMzU0LjU2Mkw4IDNhNSA1IDAgMSAwIDUgNC45MTRhMS41IDEuNSAwIDAgMCAuNTYtLjM1M3pNOCA0LjVBMy41IDMuNSAwIDEgMCAxMS41IDhoLTFBMi41IDIuNSAwIDEgMSA4IDUuNXoiLz48L3N2Zz4="  class="img-fluid mb-4" alt="" style=" width: 300px; height: 300px;" data-aos="zoom-in" data-aos-delay="500">
                        
                        <h4 class="text-white text-center fw-bold" data-aos="zoom-in" data-aos-delay="500">Mission</h4>
                         <p class="text-white text-center" data-aos="zoom-in" data-aos-delay="500">To "add value" to every business by providing Innovative Supply Chain Solutions on time and in a cost-effective manner.</p>
                    </div>
                </div>
            </div>
        </div>


         <!-- Services -->
          <div class="d-flex justify-content-center py-3" style="background-color: #F38630;">
            <div class="text-center my-3" data-aos="zoom-in">
                <h4 class="fw-bold text-white">Services</h4>
                <h1 class="fw-bold">Explore Our Services</h1>
            </div>
          </div>
         <div class="min-vh-100" style="background-color: #FBFBFB;" id="services">
            <div class="container">
                <div class="row g-3">
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="card shadow" data-aos="zoom-in" data-aos-delay="500">
                            <img src="https://cdn.pixabay.com/photo/2017/09/25/21/25/container-2786842_1280.jpg" class="card-img-top" alt="" style="height: 350px;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">International Freight & Transportation </h5>
                                <hr class="text-dark">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatum? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, et libero animi eius rem fugiat accusantium quam blanditiis repellat maxime, ea sint reiciendis esse vero magnam illo culpa. Harum, atque.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="card shadow" data-aos="zoom-in" data-aos-delay="500" style="height: 100%;">
                            <img src="https://img.freepik.com/free-photo/medium-shot-woman-logistic-center_23-2148902604.jpg?t=st=1732916719~exp=1732920319~hmac=8cacb48e9aabbb97ea638a59696bc5390c592a8ebf1727dbb6e2b4d17a66129a&w=1060" class="card-img-top" alt="" style="height: 350px;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Custom Clearance</h5>
                                <hr class="text-dark">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatum? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt doloribus corrupti aut! Maiores iste ea ipsam reiciendis inventore eos, ipsum nesciunt libero, quibusdam in voluptatum dicta. Quia, nostrum voluptatum! Perferendis!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="card shadow" data-aos="zoom-in" data-aos-delay="500">
                            <img src="https://img.freepik.com/free-photo/warehouse-storage-interior-with-shelves-loaded-with-goods_342744-1484.jpg?t=st=1732917038~exp=1732920638~hmac=be011b7756ed30625f41dfde2cab9afe5e6f4457f4566b2c85ce9530eb702f70&w=996" class="card-img-top" alt="" style="height: 350px;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Warehousing</h5>
                                <hr class="text-dark">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, voluptas nulla a illo suscipit voluptatum repellendus natus sunt molestiae eum odio ea. Quo ea rem, voluptates excepturi quasi ex vel!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="card shadow" data-aos="zoom-in" data-aos-delay="500">
                            <img src="https://cdn.pixabay.com/photo/2024/03/19/18/17/truck-8643864_960_720.jpg" class="card-img-top" alt="" style="height: 350px;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Distribution</h5>
                                <hr class="text-dark">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, pariatur laboriosam magnam, dolorem magni voluptates nulla iusto quos, maiores esse ducimus quis? Illo ad necessitatibus inventore veniam temporibus, animi excepturi!</p>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
         </div>

         <!-- Contact -->
          <div class="contact min-vh-100 mt-3" id="contact">
            <div class="top d-flex flex-row justify-content-start align-items-center">
                <div class="container">
                    <h1 class="fw-bold text-white"  data-aos="fade-right" data-aos-delay="200">Chat With Us</h1>
                    <p class="text-white"  data-aos="fade-right" data-aos-delay="200">Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br>Ullam, eius! Dolorem molestias placeat minus neque quo, <br>
                     sapiente odio sed hic autem quasi, debitis amet itaque iusto facere eligendi optio cupiditate.</p>
                </div>
            </div>
            <div class="bottom mt-5 d-flex flex-column">
                <div class="container d-flex flex-row  justify-content-between mt-5 flex-wrap">
                    <h1 class="fw-bold" style="color: #F38630;"  data-aos="fade-right" data-aos-delay="200">MaterialFlow</h1>
                    <p class="text-white"  data-aos="fade-left" data-aos-delay="200">(+62) 123 456 789 <br><span>materialflow@gmail.com</span></p>
                </div>
                
                <hr class="container text-white">
                <div class="container d-flex flex-row flex-wrap justify-content-between align-items-center">
                    <p class="text-white fs-6"  data-aos="fade-right" data-aos-delay="200">Copyright MaterialFlow 2024</p>
                    <div class="d-flex flex-row"  data-aos="fade-left" data-aos-delay="200">
                        <a href=""><i class="bi bi-facebook" style="font-size: 2rem; color: #F38630;"></i></a>
                        <a href=""><i class="bi bi-twitter ms-3" style="font-size: 2rem; color: #F38630;"></i></a>
                        <a href=""><i class="bi bi-whatsapp ms-3" style="font-size: 2rem; color: #F38630;"></i></a>
                        <a href=""><i class="bi bi-instagram ms-3" style="font-size: 2rem; color: #F38630;"></i></a>
                    </div>
                    
                </div>
            </div>
        </div>          
    </div>
       
       


    </div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>