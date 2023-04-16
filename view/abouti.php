<?php
echo '
{% load static %}
<!DOCTYPE html>
<html>

<head>
    {% include \'navbar.html\' %}
    <link rel="stylesheet" href="{% static \'css/single-product.css\' %}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</head>

<body class="body">
    <div class="container">
        <h2 style="border-bottom: 5px solid rgb(255,255,255); padding-bottom: 20px;">Site Developers</h2>
        <div class="container" style="padding-left:20px; margin-top: -4px;">
            <div class="row">
                <div class="card card-hov"
                    style="background-color: black; border-radius: 30px; align-items:center; padding:40px">
                    <div>
                        <img style="border-radius:30px; height:300px; width: 280px"
                            src="static/img/developers/nayeem.jpg" alt="Nayeem Rafsan">
                        <p style="text-align: center; font-size:12px"><span
                                style="color: white; font-weight: bold; font-size: large">Nayeem
                                Rafsan</span><br>Undergraduate Student,<br>Department of Computer Science and
                            Engineering,<br>BRAC University.</p>
                    </div>
                </div>
                <div class="card card-hov"
                    style="background-color: black; border-radius: 30px; align-items:center; padding:40px">
                    <div>
                        <img style="border-radius:30px; height:300px; width: 280px"
                            src="static/img/developers/shafi.jpg" alt="Shafi Ahmed">
                        <p style="text-align: center; font-size:12px"><span
                                style="color: white; font-weight: bold; font-size: large">Shafi
                                Ahmed</span><br>Undergraduate Student,<br>Department of Computer Science and
                            Engineering,<br>BRAC University.</p>
                    </div>
                </div>
                <div class="card card-hov"
                    style="background-color: black; border-radius: 30px; align-items:center; padding:40px">
                    <div>
                        <img style="border-radius:30px; height:300px; width: 280px"
                            src="static/img/developers/aditya.jpg" alt="Aditya Roy">
                        <p style="text-align: center; font-size:12px"><span
                                style="color: white; font-weight: bold; font-size: large">Aditya
                                Roy</span><br>Undergraduate Student,<br>Department of Computer Science and
                            Engineering,<br>BRAC University.</p>
                    </div>
                </div>
            </div>

            <div class="row" style="padding-left: 180px;">
                <div class="card card-hov"
                    style="background-color: black; border-radius: 30px; align-items:center; padding:40px">
                    <div>
                        <img style="border-radius:30px; height:300px; width: 280px"
                            src="static/img/developers/sakib.jpg" alt="Sakib Anwar Rieyan">
                        <p style="text-align: center; font-size:12px"><span
                                style="color: white; font-weight: bold; font-size: large">Sakib Anwer
                                Rieyan</span><br>Undergraduate Student,<br>Department of Computer Science and
                            Engineering,<br>BRAC University.</p>
                    </div>
                </div>
                <div class="card card-hov"
                    style="background-color: black; border-radius: 30px; align-items:center; padding:40px">
                    <div>
                        <img style="border-radius:30px; height:300px; width: 280px" src="static/img/developers/esha.jpg"
                            alt="Lamia Tasnova Esha">
                        <p style="text-align: center; font-size:12px"><span
                                style="color: white; font-weight: bold; font-size: large">Lamia Tasnova
                                Esha</span><br>Undergraduate Student,<br>Department of Computer Science and
                            Engineering,<br>BRAC University.</p>
                    </div>
                </div>
            </div>
        </div>
        {%include \'footer.html\'%}
    </div>
</body>

</html>
';
?>