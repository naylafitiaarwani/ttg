<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "ttg");
//baca isi tempat sampah
$sql = mysqli_query($konek, "SELECT * FROM tb_volume");
$berat = mysqli_fetch_array($sql);
?>



<div class="rectangle-10">
        <div class="gauge" style=" text-center">
            <div class="gauge__body">
            <?php
        $gauge=0;

for($i=1; $i <= $berat['berat']; $i++){
$gauge += 0.0125;

}
    ?>
    <div class="gauge__fill" style="transform: rotate(<?php echo $gauge?>turn);"></div>;
    <div class="gauge__cover"> <?php echo $berat['berat']?>/40kg</div>;


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