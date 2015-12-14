# cURL Cek Ongkir TIKI dan JNE
Script untuk mengambil ongkir Tiki dan JNE langsung melalui web tiki-online.com dan jne.co.id dengan menggunakan cURL dan simple html dom.
<h2>Install</h2>
<pre>&lt;?php

    // Memanggil fungsi
    require("ongkir.php");

    $dari = 'bandung';
    $ke = 'surabaya';
    $berat = 4;

    $user_agent = "Googlebot/2.1 (http://www.googlebot.com/bot.html)";
    
    // menampilkan ongkir TIKI
    echo tiki($dari,$ke,$berat,$user_agent);
     
    // menampilkan ongkir JNE
    echo jne($dari,$ke,$berat,$user_agent);

?&gt;</pre>

<p><a href="http://ibacor.com/demo/cek-ongkir-tiki-jne" target="_BLANK">DEMO HTML</a> - <a href="http://codepen.io/bachors/pen/zrrOpj" target="_BLANK">DEMO JSON</a></p>
