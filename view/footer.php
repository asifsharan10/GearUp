 <?php
echo '
{%load static%} {% include \'importcss.html\'%}
<div class="footer-basic" style="height: 180px">
    <footer style="height: 150px">
        <div style="padding-bottom: 5%">
            <a href="{% url \'contact\' %}">
                <button class="btn btn-outline-light" type="button">
                    Contact Us for Query
                </button>
            </a>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="{% url \'index\' %}">Gear Up© 2020&nbsp;</a>
            </li>
            <li class="list-inline-item" style="width: 50px">
                <a href="{% url \'contact\' %}">Contact </a>
            </li>
            <li class="list-inline-item">
                <a href="{% url \'about-us\' %}" style="width: 0px">About Us</a>
            </li>
        </ul>
    </footer>
</div>
';
?>