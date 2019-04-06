<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

<style>
body{
background: #ADA996;
background: -webkit-linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);
background: linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);
}
#menu {
 position: fixed;
 top: 0;
 left: -300px;
 width: 300px;
 height: 100%;
 padding: 50px 30px;
 -webkit-box-sizing: border-box;
 -moz-box-sizing: border-box;
 box-sizing: border-box;
 -webkit-transition: all .3s ease-in;
 -moz-transition: all .3s ease-in;
 -o-transition: all .3s ease-in;
 transition: all .3s ease-in;
 text-align: center;
 background-color: #fff;
}
#menu .brand {
 height: 51px;
 font-size: 70px;
 font-weight: 900;
 line-height: .6;
 color: #ddd;
}
#menu ul {
 padding: 0;
 margin-top: 30px;
}
#menu ul li {
list-style-type:none;
}
#menu ul li a {
 display: block;
 font-weight: 900;
 line-height: 50px;
 -webkit-transition: all .3s ease;
 -moz-transition: all .3s ease;
 -o-transition: all .3s ease;
 transition: all .3s ease;
 text-decoration: none;
 text-transform: uppercase;
 color: #232629;
 border-top: 1px solid #eee;
}
#menu ul li:last-child a {
 border-bottom: 1px solid #eee;
}
#menu ul li a:hover {
 letter-spacing: 1px;
}
body.open #menu {
 left: 0;
}
/* MAIN PAGE */
.page-wrap { 
 padding: 50px;
 -webkit-box-sizing: border-box;
 -moz-box-sizing: border-box;
 box-sizing: border-box;
 -webkit-transition: all .3s ease-in;
 -moz-transition: all .3s ease-in;
 -o-transition: all .3s ease-in;
 transition: all .3s ease-in;
}
body.open .page-wrap {
 margin-left: 300px;
}
/* MENU TOGGLE ICON */
button:focus {
 outline: none;
}
#menu-toggle {
 position: relative;
 width: 51px;
 height: 51px;
 cursor: pointer;
 border: none;
 -webkit-border-radius: 50px;
 -moz-border-radius: 50px;
 border-radius: 50px;
 background: #fff;
}
#menu-toggle:before,
#menu-toggle:after {
 position: absolute;
 content: "";
 -webkit-transition: all .5s ease;
 -moz-transition: all .5s ease;
 -o-transition: all .5s ease;
 transition: all .5s ease;
 background-color: #232629;
}
#menu-toggle:before {
 top: 12px;
 left: 25px;
 width: 1px;
 height: 27px;
}
#menu-toggle:after {
 top: 25px;
 left: 12px;
 width: 27px;
 height: 1px;
}
body.open button#menu-toggle:before,
body.open button#menu-toggle:after {
 -webkit-transform: rotate(45deg);
 -ms-transform: rotate(45deg);
 transform: rotate(45deg);
}
</style>

 <nav id="menu" role="navigation">
 <div class="brand">&Aopf;</div> 
 <ul>
 <li><a href="#">Item 1</a></li>
 <li><a href="#">Item 2</a></li>
 <li><a href="#">Item 3</a></li>
 </ul>
 </nav>

<div class="page-wrap">

<button id="menu-toggle"></button>

<div class="container-fluid"><div class="row">
<h1 class="text-center">BootstrapTema</h1>
<img src="http://drawings-girls.ucoz.net/2015/04/devushka-ohotnik-s-pilauhei-iskroi.jpg" class="img-responsive" alt="" />
</div></div>

</div>

<script src="js/js.js"></script>