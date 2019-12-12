<?php $this->load->view('header.php') ?>
<div class="content">
    <h2 align="center">Edit Kursi</h2>
    <form action="<?= base_url(); ?>index.php/WelcomeTIKU/pesanan" method="post">
        <b>Film</b>
        <?= $this->session->userdata("judul"); ?>
        <br>
        <b>Tanggal/Jadwal</b>
        <?php $tn = $this->session->userdata("tanggal_nonton");
        echo date('l', strtotime($tn)).", ".$tn."/ ".$this->session->userdata("jadwal"); ?>
        <br>
        <b>Tempat Duduk</b>
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
                        <?php echo $ij; ?>
                            <input name="pilihKursi[]" type="checkbox" value="<?php echo $ij; ?>"  
                            <?php foreach($data['kursi_checked'] as $kursi){
                                if($ij == $kursi)
                                    echo "checked";
                            } ?>
                            <?php
                                for($x=0; $x<count($data['kursi_booked']); $x++){
                                    if($ij==$data['kursi_booked'][$x]['nokur'])
                                    echo "disabled";
                                } 
                            ?> >
                        </td>
                        <?php $k++;} ?>
                    </tr>
                <?php } ?>
            </tr>
        </table>
        <br>
        Harga Rp 60.000,00/tiket
        <br><br>
        <button type="submit" class="btn">Submit</button>
    </form>
</div>
</body>
</html>