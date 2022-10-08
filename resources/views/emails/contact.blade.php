<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body style="background-color: #fafafa;font-family: arial">

    <div style="background-color: #fff;border: 2px solid #e5e5e5;width:600px;margin: 50px auto;padding: 30px">
        <h3>Dear Admin</h3>
        <p>Hope this email finds you well</p>
        <br>
        <p>There is new contact us message with this information:</p>
        <p><b>Name</b>: {{ $info['name'] }}</p>
        <p><b>Email</b> {{ $info['email'] }}</p>
        <p><b>Phone</b> {{ $info['phone'] }}</p>
        <p><b>Subject</b> {{ $info['subject'] }}</p>
        <p><b>Message</b> {{ $info['message'] }}</p>

        <br>
        <br>
        <h4>Best Regards</h4>
    </div>

</body>
</html>
