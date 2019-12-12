<?php $this->load->view('header.php') ?>
<div class="content">
    <h2 align="center">Pesanan Tiket</h2>

    <h5><?= $this->session->userdata("judul"); ?></h5>
    <p><?= $tn = $this->session->userdata("tanggal_nonton"); 
    echo date('l', strtotime($tn)).", ".$tn."/ ".$this->session->userdata("jadwal"); ?></p>
    <hr width="25%" align="left">
    <ul>
        <?php $i=0; foreach($data['kursi'] as $kursi){ ?>
        <li>
            <form method="post" action="<?php echo base_url()."index.php/WelcomeTIKU/hapusKursi/$i"; ?>">
                <?= $kursi; ?>
                <button name="submit" type="submit" class="btn hapus">Hapus </button>
            </form>
        </li>
        <?php $i++;}?>
    </ul>
    <hr width="25%" align="left">
    <p>Total : <?= number_format(count($data['kursi'])*60000,2,',','.');?></p>
    <hr width="25%" align="left">
    <form method="post" action="<?= base_url()."index.php/WelcomeTIKU/edit"; ?>">
            <button type="submit" name="submit" class="btn edit">Edit Kursi </button>
    </form>
    <form method="post" action="<?= base_url(); ?>">
            <button type="submit" name="submit" class="btn hapus">Hapus Semua </button>
    </form>
    <br>
    <form action="<?= base_url()."index.php/WelcomeTIKU/bayar" ?>">
        <button type="submit" class="btn">Bayar</button>
    </form>
</div>
</body>
</html>