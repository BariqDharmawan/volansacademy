<!DOCTYPE html>
<html>
<head>
<title>{{ $title }}</title>
</head>
<body>



	{!! $body !!}


<!-- unsubscribe -->
<footer style="border-top: double; border-color: grey;">
  <center style="font-size: 10px; color: grey">Anda mendapat email ini karena anda berlangganan newsletter dari volanseducation. klik link berikut jika ingin berhenti berlangganan <a href="{{ $unsubscribe_link }}">Unsubscribe</a></center>
</footer>

</body>
</html>