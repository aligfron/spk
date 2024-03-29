   <?= $this->extend('layout/tamplate'); ?>
   <!-- Home section -->
   <?= $this->section('content'); ?>
   <section class="home" id="home">
       <div class="container1">
           <div class="home-text">
               <p>Tidak bisa mengakses halaman ini <br> Silahkan Melakukan Login Terlebih Dahulu</p>
               <a href="/Login" class="btn btn-primary">Login</a>
           </div>
       </div>
   </section>
   </div>

   <?= $this->endSection(); ?>