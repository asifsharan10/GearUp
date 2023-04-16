 <?php
echo '
{%load static%}
<!DOCTYPE html>

<head>
    <title>Gear Up</title>
    {% include \'importcss.html\' %}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{% static \'css/enquiry.css\' %}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <nav class="navbar navbar-light navbar-expand-md" style="background: rgba(0, 0, 0, 0.6)">
        <div class="container-fluid"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span
                    class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1" style="padding-left: 0;padding-right: 30px;">
                <a href="{% url \'index\' %}"
                    style="color: rgb(255, 255, 255);font-size: 26px;font-style: normal;font-weight: bold;font-family: Montserrat, sans-serif;text-align: center; text-decoration: none;">GEAR
                    UP</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav mx-auto">
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                    </ul>
                    <style>
                        button#searchButton i {
                            opacity: 0.7;
                        }

                        button#searchButton i:hover {
                            opacity: 1;
                        }
                    </style>
                    <form class="form-inline" action="/s/">
                        <input class="form-control form-control-sm ml-3 w-90" style="border-radius: 15px;" type="text"
                            name="search" placeholder="Search products" aria-label="Search"> &nbsp;&nbsp;
                        <button id="searchButton" class="btn" style="color: white;">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    <ul class="nav navbar-nav navbar">
                        <style>
                            li#navbar a {
                                opacity: 0.7;
                                font-size: 13px;
                            }

                            li#navbar a:hover {
                                opacity: 1;
                                font-size: 15px;
                            }
                        </style>
                        <li id="navbar" class="nav-item"><a style="color: white; padding: 10px; text-decoration: none;"
                                href="{% url \'car-products\' %}">Cars</a></li>
                        <li id="navbar" class="nav-item"><a style="color: white; padding: 10px; text-decoration: none;"
                                href="{% url \'accessories\' %}">Accessories</a></li>
                        {% if user.is_authenticated %}
                        <!-- <li id="navbar" class="nav-item"><img style="border-radius: 40px; height: 40px;  width: 40px" src="{{customer.profile_pic}}" alt=""></li> -->
                        <li id="navbar" class="nav-item"><a href="{% url \'profile\' %}"
                                style="color: white; padding: 10px; text-decoration: none;"><img
                                    style="border-radius: 40px; height: 30px;  width: 30px"
                                    src="{{customer.profile_pic}}" alt=""></a></li>
                        <li id="navbar" class="nav-item">
                            <form action="logout" method="POST">{% csrf_token %}<a
                                    style="color: white; padding: 10px; text-decoration: none;"
                                    href="{% url \'logout\' %}">Logout</a></form>
                        </li>
                        {% else %}
                        <li id="navbar" class="nav-item"><a style="color: white; padding: 10px; text-decoration: none;"
                                href="{% url \'signup\' %}">Sign Up</a></li>
                        <li id="navbar" class="nav-item"><a style="color: white; padding: 10px; text-decoration: none;"
                                href="{% url \'login\' %}">Login</a></li>
                        {% endif %}
                    </ul>
                </div>
    </nav>
</body>
';
?>