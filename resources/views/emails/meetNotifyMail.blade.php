<!DOCTYPE html>
<html>
<head>
    <title>Mail from telehealth.patientconnect.io</title>
    <style>
        .mail-h3 {
            color: cadetblue;
        }
        .mail-span {
            color: black;
        }
        .mail-h2 {
            color: cornflowerblue;
        }
        .container {
            margin-top: 10px;
            margin-bottom:10px;
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="mail-h3">Patient First Name: <span class="mail-span">{{ $details['name'] }}</span></h3>
        <h3 class="mail-h3">Patient Last Name: <span class="mail-span">{{ $details['lname'] }}</span></h3>
        <h3 class="mail-h3">Patient Email: <span class="mail-span">{{ $details['email'] }}</span></h3>
        <h3 class="mail-h3">Patient Address: <span class="mail-span">{{ $details['city'] }}</span></h3>
        <h3 class="mail-h3">Patient Phone: <span class="mail-span">{{ $details['phone'] }}</span></h3>
        <h3 class="mail-h3">Meet URL: <span class="mail-span"><a href="<?php echo $details['meetUrl']; ?>">{{ $details['meetUrl'] }}</a></span></h3>
        <h3 class="mail-h3">Meet Time: <span class="mail-span">{{ $details['time'] }}</span></h3>
        <h2 class="mail-h2">When you are available, Please meet Patient with clicking above Meet URL.</h2>
        <h2>Thank you.</h2>
    </div>
    
</body>
</html>