<?php $this->load->view('header.php') ?>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="<?= base_url(); ?>assets/images/julien-unsplash.png" style="width:100%" alt="">
        </div>
        <div class="mySlides fade">
            <img src="<?= base_url(); ?>assets/images/jeremyd-unsplash.png" style="width:100%" alt="">
        </div>
        <div class="mySlides fade">
            <img src="<?= base_url(); ?>assets/images/karen-unsplash.png" style="width:100%" alt="">
        </div>
    </div>
    <br>
    <div style="text-align:center" >
        <span class="dot" onclick="currentSlide(1)" ></span>
        <span class="dot" onclick="currentSlide(2)" ></span>
        <span class="dot" onclick="currentSlide(3)" ></span>
    </div>
    <!-- <marquee>Harga Rp 60.000,00/ tiket setiap hari</marquee>
    <br><h2 align="center">Film Terbaru</h2><br> -->
    <div class="content">
        <form method="post" action="<?= base_url(); ?>index.php/WelcomeTIKU/pesan">
            <table>
                <tr>
                    <?php foreach($data as $film){ ?>
                    <td>
                        <center>
                            <img height="450px" src="<?= base_url(); ?>assets/images/<?= $film['foto']; ?>">
                            <h5><?= $film['judul']; ?></h5>
                        </center>
                        <p><?= $film['sinopsis']; ?></p>
                        <button class="btn" name="id_film" value="<?= $film['id_film']; ?>" type="submit">Pesan</button>
                        <small><?= $film['keterangan']; ?></small>
                        <br><br>
                    </td>
                    <?php } ?>
                </tr>
            </table>
        </form>
    </div>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/tiku_slider.js" ></script>
</body>
</html>