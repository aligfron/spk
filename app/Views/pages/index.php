   <?= $this->extend('layout/tamplate'); ?>
   <!-- Home section -->
   <?= $this->section('content'); ?>
   <section class="home" id="home">
       <div class="home-text">
           <?php if (session()->getFlashdata('logout')) : ?>
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <?= session()->getFlashdata('logout'); ?>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
           <?php endif ?>
           <h1>SELAMAT <br> DATANG</h1>
           <p>DI SISTEM PENDUKUNG KEPUTUSAN <br> Dinas Kebudayaan & Pariwisata Kab. Bangkalan, Jawa Timur</p>
           <a href="/Login" class="home-btn">Lets gooooo</a>
       </div>
   </section>
   </div>

   <?= $this->endSection(); ?>