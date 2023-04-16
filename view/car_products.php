 <?php
echo '
{%load static%}
<!DOCTYPE html>
<html>

<head>
    {% include \'importcss.html\' %}
    <link rel="stylesheet" href="{% static \'bootstrap/css/bootstrap2.min.css\' %}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700" />
    <link rel="stylesheet" href="{% static \'fonts/ionicons.min.css\' %}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css" />
</head>
<style>
    .card-hov:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
    }
</style>

<body>
    {% include \'navbar.html\' %}
    <div class="row" style="color: black">
        <div class="col">
            <div class="card text-white bg-dark mb-3 card-body">
                <form method="GET">
                    <div>
                        {{myFilter.form}}
                        <button class="btn btn-info" type="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <main class="page lanidng-page">
        <section style="background: rgb(13, 13, 13); color: rgb(13, 13, 13)">
            <div class="container" style="padding-top: 20px">
                <div class="row">
                    {% for car in cars %}
                    <div class="col-lg-4" style="padding-bottom: 30px">
                        <div class="card card-hov" style="
                  background-color: #214252;
                  border-radius: 8px;
                  height: 380px;
                ">
                            <a href="{% url \'car\' car.id %}">
                                <img class="card-img-top" width="288px" height="230px"
                                    style="border-radius: 8px 8px 0px 0px" src="{{car.image_url1}}" alt="" />
                            </a>
                            <div class="card-body">
                                <a href="{% url \'car\' car.id %}" style="color: white; text-decoration: none">
                                    <h5 class="card-title">{{car.name}}</h5>
                                </a>
                                <p class="card-text" style="color: white">
                                    Model: {{car.year}}
                                </p>
                            </div>
                        </div>
                    </div>
                    {% endfor %}
                </div>
            </div>
        </section>
        <section class="portfolio-block skills" style="color: rgb(13, 13, 13); background: rgb(13, 13, 13)">
            <div class="container">
                <div class="heading"></div>
                <h2 style="text-align: center; color: rgb(255, 255, 255)">
                    Our Services
                </h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-hov special-skill-item border-0">
                            <div class="card-header bg-transparent border-0">
                                <i class="icon ion-ios-star-outline"></i>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Authentic Brands</h3>
                                <p class="card-text">
                                    Authentic accessories and new models are updated. Quality is
                                    our first priority.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-hov special-skill-item border-0">
                            <div class="card-header bg-transparent border-0">
                                <i class="icon ion-ios-lightbulb-outline"></i>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Best Deals</h3>
                                <p class="card-text">
                                    We provide the best deals in the country you can get to buy
                                    your dream car.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-hov special-skill-item border-0">
                            <div class="card-header bg-transparent border-0">
                                <i class="icon ion-ios-gear-outline"></i>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Secure Payment</h3>
                                <p class="card-text">
                                    we provide 100% security with EMI system available to make
                                    smooth transaction.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="{% static \'assets/js/jquery.min.js\' %}"></script>
    <script src="{% static \'bootstrap/js/bootstrap2.min.js\' %}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    {%include \'footer.html\'%}
</body>

</html>
';
?>