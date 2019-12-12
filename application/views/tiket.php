<?php $this->load->view('header') ?>
<div class="content" id="printableArea">
    <h2 align="center">Tiket</h2>
    <br>
    <?php foreach($data['kursi'] as $kursi) { ?>
        <hr width="50%" align="left" >
        <h6>Tiket Bioskop Kampus UDINUS (TIKU)</h6><hr>
        <p><b><?= $this->session->userdata("judul"); ?></b>
        <br>
        <?php $tn=$this->session->userdata("tanggal_nonton");
        echo date('l', strtotime($tn)).", ".$tn."/ ".$this->session->userdata("jadwal"); ?>
        <br>
        Kursi : <?= $kursi ?> </p>

        <small><br><hr width="50%" align="left" style="border-top: 1px dashed;">disobek untuk petugas<br>Tiket Bioskop Kampus UDINUS (TIKU)
        <b><?= $this->session->userdata("judul"); ?> - <?php $tn = $this->session->userdata("tanggal_nonton");
        echo date('l', strtotime($tn)).", ".$tn."/ ".$this->session->userdata("jadwal"); ?> - <?= $kursi; ?></b></small>
        <hr width="50%" align="left" >
    <?php } ?>

    <button class="btn" onclick="print()">Print</button>
</div>
<script>
    function print() {
        $('#printableArea').html2canvas({
            onrendered: function( canvas ){
            var img = canvas.toDataURL()
            window.open(img);
            
        })
    }

</script>
</body>
</html>

