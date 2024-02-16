<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "ttg");
//baca isi tempat sampah
$sql = mysqli_query($konek, "SELECT * FROM tb_volume");
$berat = mysqli_fetch_array($sql);


//persentas tinggi sampah
//$persentase_berat_sampah = ($berat['berat']/200); //hasil persen

//$berat_max = 40; //berat dalam kg 
// ukur tinggi sampah
//$tinggi_sampah = $tinggi_max - $data['tinggi'];
//persentas berat sampah
// $persentase_berat_sampah = ($berat_sampah/$berat_max)*100; //hasil persen
//hitung volume sampah
?>



<div class="rectangle-10">
        <div class="gauge" style=" text-center">
            <div class="gauge__body">
            <?php
if ($berat['berat'] == 40) {
    echo '<div class="gauge__fill" style="transform: rotate(0.50turn);"></div>';
    echo '<div class="gauge__cover">' . $berat['berat'] . '/40kg</div>';
    echo '<p class="empatpuluh">/40kg</p>';
} else if($berat['berat'] < 40) {
    echo '<div class="gauge__fill" style="transform: rotate(0.25turn);"></div>';
    echo '<div class="gauge__cover">' . $berat['berat'] . '/40kg</div>';
    
} else if($berat['berat'] < 20) {
        echo '<div class="gauge__fill" style="transform: rotate(0.10turn);"></div>';
        echo '<div class="gauge__cover">' . $berat['berat'] . '/40kg</div>';
} else {
    echo '<div class="gauge__fill" style="transform: rotate(0turn);"></div>';
    echo '<div class="gauge__cover">' . $berat['berat'] . '/40kg</div>';
    
}
?>

            </div>
        </div>
        </div>

        <p class="massa">Massa</p>
        <p class="sampah2">Sampah</p>
        <p class="kilogram"><?php echo $berat['berat'];?> kilogram</p>

        <script type="text/javascript">
            const gaugeElement = document.querySelector(".gauge");

            function setGaugeValue(gauge, value){
                if(value<0|| value>1){
                    return;
                }
                gauge.querySelector(".gauge__fill").style.transform=rotate(${value / 2}turn);
                gauge.querySelector(".gauge__cover").textContent =${Math.round(value * 100 )}%;
            }

            setGaugeValue(gaugeElement, 0.5) 
        </script>