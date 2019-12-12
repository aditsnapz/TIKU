<?php $this->load->view('header.php') ?>
    <h2 align="center">Pesan Kursi</h2>
    <div class="content">
    <?php 
        if( count($data['kursi_booked'] ) == 20) {
    ?>
        <div class="alert alert-danger blink_me">
            <a href="<?php echo base_url();?>index.php/WelcomeTIKU/" class="btn btn-xs btn-primary pull-right">Kembali</a>
            <strong>Danger:</strong> Tempat duduk sudah penuh.
        </div>
    <?php
        }
    ?>
    
    <form action="<?php echo base_url(); ?>index.php/WelcomeTIKU/pesanan" method="post">
        <div class="row">
            <div class="col-md-6">
                <label for="nama">Nama</label>
                <input class="form-control" type="text" name="nama" id="nama" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="no_ktp">No KTP</label>
                <input class="form-control" type="text" name="no_ktp" id="no_ktp" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="umur">Umur</label>
                <input class="form-control" type="number" min="0" name="umur" id="umur" required>
            </div>
        </div>
        <br>
        <b>Film : </b>
        <?php echo $this->session->userdata("judul"); ?>
        <br>
        <b>Tanggal/Jadwal : </b>
        <?php $tn = $this->session->userdata("tanggal_nonton");
        echo date('l', strtotime($tn)).", ".$tn."/ ".$this->session->userdata("jadwal"); ?>
        <br>
        <b>Tempat dodol : </b>
        <table id="seatsBlock">
            <tr>
                <td></td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
            </tr>
            <tr>
                <?php $k=0;
                for($i='A'; $i<='E'; $i++){ ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <?php for($j=1; $j<=4; $j++){
                            $ij = $data['kursi'][$k]['nokur']; ?>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" value="<?php echo $ij; ?>"  
                            <?php
                                
                                for($x=0; $x<count($data['kursi_booked']); $x++){
                                    if($ij==$data['kursi_booked'][$x]['nokur']) {
                                        echo "disabled checked";
                                        
                                    }
                                    
                                    
                                } 
                            ?> >
                        </td>
                        <?php $k++;} ?>
                    </tr>
                <?php } ?>
            </tr>
            <tr><td><br><br><br><br><br><br></td></tr>
            <tr>
                <td>Kursi yang dipesan : </td>
                <td><?= count($data['kursi_booked']) ?></td>
            </tr>
        </table>
        <br>

        Harga Rp 60.000,00/tiket
        <br><br>
        <?php 
        if( count($data['kursi_booked'] ) != 20) {
        ?>
        <button type="submit" class="btn">Submit</button>
        <?php } ?>
    </form>
    </div>
</body>
</html>
<!-- End price Area -->
<script>
    function blinker() {
    $('.blink_me').fadeOut(500);
    $('.blink_me').fadeIn(500);
}

setInterval(blinker, 1000);
</script>