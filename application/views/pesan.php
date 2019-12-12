<?php $this->load->view('header.php') ?>
    

    <br><h2 align="center">Pesan Tiket Film</h2><br>

    <form method="post" action="<?php echo base_url(); ?>index.php/WelcomeTIKU/pesan_kursi">
    <div class="content">
    <table>
    <tr>
        <td>
            <img src="<?php echo base_url(); ?>assets/images/<?php echo $data['film'][0]['foto']; ?>">
        </td>
        <td>
            <table border="1">
                <tr>
                    <td><strong>Judul</strong></td>
                    <td><h5><?php echo $data['film'][0]['judul']; ?></h5></td>
                </tr>
                <tr>
                    <td><strong>Sinopsis</strong></td>
                    <td><p><?php echo $data['film'][0]['sinopsis']; ?></p></td>
                </tr>
                <tr>
                    <td><strong>Lama Waktu</strong></td>
                    <td><p><small><?php echo $data['film'][0]['keterangan']; ?></small></p></td>
                </tr>
            

            
            </table>
        </td>
    </tr>
    </table>
    <table>
    <tr>
        <td>
            <b>Tanggal</b>
        </td>
        <td>
            <input type="date" name="tanggal_nonton" required>
        </td>
        <br>
    </tr>
    <tr>
        <td>
            <b>Jadwal</b>
        </td>
        <td>
        <?php $no = 1;
        foreach($data['jadwal'] as $jdw){ ?>
            <input type="radio" id="<?php echo $no; ?>" name="jadwal" value="<?php echo $jdw['id_jadwal']; ?>" required>
            <label for="<?php echo $no; ?>"><?php echo $jdw['jadwal']; ?></label>
        <?php $no++; } ?>
        <br>
        </td>
    <tr>
            <td></td>
            <td>
                <button type="submit" class="btn">Submit</button>
            </td>
    </tr>
    </form>
</body>
</html>