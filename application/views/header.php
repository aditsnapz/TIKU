<!DOCTYPE html>
<html lang="en">
<head>
    <title>TIKU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <script src="<?= base_url('assets/templates/');?>js/libs/jquery-3.2.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        body{
            margin: 0;
        }
        ul.navbar{
            list-style-type: none;
            margin:0;
            padding:0;
            background-color:#f8f9fa;
            overflow: auto;
            width:100%;
            height:auto;
            position:relative;
        }
        ul.navbar li a {
            display: block;
            color: #000;
            text-decoration:none;
            float:left;
            padding:15px;
        }
        ul.navbar li a.logo.hover{
            background-color:#f8f9fa;
        }
        ul.navbar li a:hover{
            background-color: #007bff;
            color: white;
        }
        div.content{
            padding: 1px 16px;
            margin: 0;
        }
        div.content td{
            padding-left: 50px;
            padding-right: 50px;
        }
        button.btn{
            background-color:#007bff;
            border:none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration:none;
            display:inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        @media screen and (max-width: 400px){
            ul.navbar li a{
                text-align: center;
                float: none;
            }
        }
        .txt-center{
            text-align: center;
        }
        input[type=checkbox]{
            width: 25px;
            margin: 20px;
            cursor:pointer;
        }
        input[type=checkbox]:before {
            content: "";
            width: 50px;
            height: 50px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            display: inline-block;
            vertical-align: center;
            text-align: center;
            border:3px solid #ff9800;
            background-color: #cfa8a8;
        }
        input[type=checkbox]:checked:before{
            background-color: Green;
        }
        input[type=checkbox]:disabled:before{
            background-color: red;
        }
        button.btn.hapus{
            background-color: red;
        }
        button.btn.edit{
            background-color: green;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/tiku_slider.css" media="screen">
</head>
<body>
    <ul class="navbar">
        <li>
            <a href="#" class="logo" style="padding: 7px" >
                <img src="<?= base_url(); ?>assets/images/tiku.png" alt="">
            </a>
        </li>
        <li>
            <a href="<?= base_url(); ?>">Home</a>
        </li>
        <li>
            <a href="<?= base_url(); ?>index.php/WelcomeTIKU/tentang_kami"><font color="red" class="blink_me">Tentang Kami</font></a>
        </li>
    </ul>
<!-- End price Area -->
<script>
    function blinker() {
    $('.blink_me').fadeOut(500);
    $('.blink_me').fadeIn(500);
}

setInterval(blinker, 1000);
</script>