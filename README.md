# cURL Cek Ongkir TIKI dan JNE
Script untuk mengambil ongkir Tiki dan JNE langsung melalui web tiki-online.com dan jne.co.id dengan menggunakan cURL dan simple html dom.
<h2>Install</h2>
<pre>&lt;form method="GET"&gt;
    &lt;select name="dari"&gt;
        &lt;option value="bandung"&gt;Bandung&lt;/option&gt;
        &lt;option value="medan"&gt;Medan&lt;/option&gt;
    &lt;/select&gt;
    &lt;select name="ke"&gt;
        &lt;option value="jakarta"&gt;Jakarta&lt;/option&gt;
        &lt;option value="surabaya"&gt;surabaya&lt;/option&gt;
    &lt;/select&gt;
    &lt;select name="berat"&gt;
        &lt;option value="1"&gt;1&lt;/option&gt;
        &lt;option value="2"&gt;2&lt;/option&gt;
        &lt;option value="3"&gt;3&lt;/option&gt;
        &lt;option value="4"&gt;4&lt;/option&gt;
        &lt;option value="5"&gt;5&lt;/option&gt;
    &lt;/select&gt;
    &lt;select name="service"&gt;
        &lt;option value="tiki"&gt;TIKI&lt;/option&gt;
        &lt;option value="jne"&gt;JNE&lt;/option&gt;
    &lt;/select&gt;
    &lt;button&gt;CEK&lt;/button&gt;
&lt;/form&gt;

&lt;?php

    // Memanggil fungsi
    require("ongkir.php");

    if(!empty($_GET['service'])&amp;&amp;!empty($_GET['dari'])&amp;&amp;!empty($_GET['ke'])&amp;&amp;!empty($_GET['berat'])){
        $service = $_GET['service'];
        $dari = $_GET['dari'];
        $ke = $_GET['ke'];
        $kg = $_GET['berat'];
        $user_agent = "Googlebot/2.1 (http://www.googlebot.com/bot.html)";
        if($service == 'tiki'){
            // menampilkan ongkir TIKI
            echo "&lt;p&gt;Dari: $dari&lt;br&gt;Ke: $ke&lt;br&gt;Berat (Kg): $kg&lt;/p&gt;".tiki($dari,$ke,$kg,$user_agent);
        }else if($service == 'jne'){
            // menampilkan ongkir JNE
            echo kota($dari,$ke,$kg,$user_agent);
        }
    }

?&gt;</pre>

<p><ahref="http://ibacor.com/demo/cek-ongkir-tiki-jne" target="_BLANK">DEMO HTML</a> - <ahref="http://ibacor.com/api#bcr-ongkir" target="_BLANK">DEMO JSON</a></p>
