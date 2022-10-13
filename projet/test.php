
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
</head>
<body>

<div class="background">
    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<style>

    /* Fond dynamique made by https://wweb.dev/resources/animated-css-background-generator/ */
    @keyframes animate {
        0%{
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }
        100%{
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
        }
    }

    .background {
        position: fixed;
        width: 100vw;
        height: 100vh;
        top: 0;
        left: 0;
        margin: 0;
        padding: 0;
        background: #4e54c8;
        overflow: hidden;
    }
    .background li {
        position: absolute;
        display: block;
        list-style: none;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.2);
        animation: animate 16s linear infinite;
    }




    .background li:nth-child(0) {
        left: 77%;
        width: 177px;
        height: 177px;
        bottom: -177px;
        animation-delay: 1s;
    }
    .background li:nth-child(1) {
        left: 3%;
        width: 156px;
        height: 156px;
        bottom: -156px;
        animation-delay: 4s;
    }
    .background li:nth-child(2) {
        left: 52%;
        width: 68px;
        height: 68px;
        bottom: -68px;
        animation-delay: 7s;
    }
    .background li:nth-child(3) {
        left: 80%;
        width: 142px;
        height: 142px;
        bottom: -142px;
        animation-delay: 13s;
    }
    .background li:nth-child(4) {
        left: 28%;
        width: 81px;
        height: 81px;
        bottom: -81px;
        animation-delay: 6s;
    }
    .background li:nth-child(5) {
        left: 62%;
        width: 86px;
        height: 86px;
        bottom: -86px;
        animation-delay: 6s;
    }
    .background li:nth-child(6) {
        left: 51%;
        width: 166px;
        height: 166px;
        bottom: -166px;
        animation-delay: 16s;
    }
    .background li:nth-child(7) {
        left: 77%;
        width: 41px;
        height: 41px;
        bottom: -41px;
        animation-delay: 13s;
    }
    .background li:nth-child(8) {
        left: 64%;
        width: 108px;
        height: 108px;
        bottom: -108px;
        animation-delay: 24s;
    }
    .background li:nth-child(9) {
        left: 16%;
        width: 48px;
        height: 48px;
        bottom: -48px;
        animation-delay: 22s;
    }
    .background li:nth-child(10) {
        left: 25%;
        width: 88px;
        height: 88px;
        bottom: -88px;
        animation-delay: 8s;
    }
    .background li:nth-child(11) {
        left: 30%;
        width: 134px;
        height: 134px;
        bottom: -134px;
        animation-delay: 11s;
    }
    .background li:nth-child(12) {
        left: 60%;
        width: 146px;
        height: 146px;
        bottom: -146px;
        animation-delay: 15s;
    }
    .background li:nth-child(13) {
        left: 6%;
        width: 150px;
        height: 150px;
        bottom: -150px;
        animation-delay: 58s;
    }
    .background li:nth-child(14) {
        left: 33%;
        width: 57px;
        height: 57px;
        bottom: -57px;
        animation-delay: 40s;
    }
    .background li:nth-child(15) {
        left: 24%;
        width: 48px;
        height: 48px;
        bottom: -48px;
        animation-delay: 27s;
    }
    .background li:nth-child(16) {
        left: 45%;
        width: 100px;
        height: 100px;
        bottom: -100px;
        animation-delay: 13s;
    }
    .background li:nth-child(17) {
        left: 53%;
        width: 147px;
        height: 147px;
        bottom: -147px;
        animation-delay: 77s;
    }
    .background li:nth-child(18) {
        left: 67%;
        width: 174px;
        height: 174px;
        bottom: -174px;
        animation-delay: 7s;
    }
    .background li:nth-child(19) {
        left: 19%;
        width: 79px;
        height: 79px;
        bottom: -79px;
        animation-delay: 27s;
    }
    .background li:nth-child(20) {
        left: 58%;
        width: 87px;
        height: 87px;
        bottom: -87px;
        animation-delay: 10s;
    }
    .background li:nth-child(21) {
        left: 1%;
        width: 163px;
        height: 163px;
        bottom: -163px;
        animation-delay: 49s;
    }
    .background li:nth-child(22) {
        left: 19%;
        width: 87px;
        height: 87px;
        bottom: -87px;
        animation-delay: 56s;
    }
    .background li:nth-child(23) {
        left: 35%;
        width: 56px;
        height: 56px;
        bottom: -56px;
        animation-delay: 41s;
    }
    .background li:nth-child(24) {
        left: 53%;
        width: 163px;
        height: 163px;
        bottom: -163px;
        animation-delay: 31s;
    }
    .background li:nth-child(25) {
        left: 79%;
        width: 131px;
        height: 131px;
        bottom: -131px;
        animation-delay: 91s;
    }
    .background li:nth-child(26) {
        left: 24%;
        width: 127px;
        height: 127px;
        bottom: -127px;
        animation-delay: 37s;
    }
    .background li:nth-child(27) {
        left: 51%;
        width: 166px;
        height: 166px;
        bottom: -166px;
        animation-delay: 132s;
    }
    .background li:nth-child(28) {
        left: 46%;
        width: 123px;
        height: 123px;
        bottom: -123px;
        animation-delay: 44s;
    }
    .background li:nth-child(29) {
        left: 60%;
        width: 180px;
        height: 180px;
        bottom: -180px;
        animation-delay: 137s;
    }
    .background li:nth-child(30) {
        left: 30%;
        width: 135px;
        height: 135px;
        bottom: -135px;
        animation-delay: 68s;
    }
    .background li:nth-child(31) {
        left: 87%;
        width: 181px;
        height: 181px;
        bottom: -181px;
        animation-delay: 45s;
    }
    .background li:nth-child(32) {
        left: 60%;
        width: 56px;
        height: 56px;
        bottom: -56px;
        animation-delay: 36s;
    }
    .background li:nth-child(33) {
        left: 38%;
        width: 47px;
        height: 47px;
        bottom: -47px;
        animation-delay: 132s;
    }
    .background li:nth-child(34) {
        left: 34%;
        width: 117px;
        height: 117px;
        bottom: -117px;
        animation-delay: 20s;
    }
    .background li:nth-child(35) {
        left: 65%;
        width: 169px;
        height: 169px;
        bottom: -169px;
        animation-delay: 159s;
    }
    .background li:nth-child(36) {
        left: 58%;
        width: 127px;
        height: 127px;
        bottom: -127px;
        animation-delay: 53s;
    }
    .background li:nth-child(37) {
        left: 44%;
        width: 120px;
        height: 120px;
        bottom: -120px;
        animation-delay: 12s;
    }
    .background li:nth-child(38) {
        left: 49%;
        width: 92px;
        height: 92px;
        bottom: -92px;
        animation-delay: 46s;
    }
    .background li:nth-child(39) {
        left: 80%;
        width: 41px;
        height: 41px;
        bottom: -41px;
        animation-delay: 9s;
    }
    .background li:nth-child(40) {
        left: 28%;
        width: 154px;
        height: 154px;
        bottom: -154px;
        animation-delay: 61s;
    }
    .background li:nth-child(41) {
        left: 61%;
        width: 62px;
        height: 62px;
        bottom: -62px;
        animation-delay: 154s;
    }
    .background li:nth-child(42) {
        left: 48%;
        width: 59px;
        height: 59px;
        bottom: -59px;
        animation-delay: 48s;
    }
    .background li:nth-child(43) {
        left: 36%;
        width: 97px;
        height: 97px;
        bottom: -97px;
        animation-delay: 17s;
    }
</style>
</body>
</html>