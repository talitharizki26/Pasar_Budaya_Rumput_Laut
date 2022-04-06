 <!-- ***** Reservation Us Area Starts ***** -->
 <section class="section" id="reservation">
   <div class="container">
     <div class="row">
       <div class="col-lg-6 align-self-center">
         <div class="left-text-content">
           <div class="section-heading">
             <h6>Kontak Kami</h6>
             <h2>Hubungi Admin dan Dinas Perikanan dan Kelautan Kab. Bantaeng untuk info lebih lanjut</h2>
           </div>
           <p>Nomor Telepon dan Email yang tertera bertujuan untuk keperluan pembangunan website Pasar Budaya Rumput Laut</p>
           <div class="row">
             <div class="col-lg-6">
               <div class="phone">
                 <i class="fa fa-phone"></i>
                 <h4>Nomor Telepon</h4>
                 <span><a href="#">0413 - 21283 (Kantor)</a><br><a href="#">+6285396316768 (Didi)</a></span>
               </div>
             </div>
             <div class="col-lg-6">
               <div class="message">
                 <i class="fa fa-envelope"></i>
                 <h4>Email dan Website</h4>
                 <span><a href="diskanlutbantaeng@yahoo.co.id">diskanlutbantaeng@yahoo.co.id</a><br><a href="www.diskanlutbantaeng.com">www.diskanlutbantaeng.com</a></span>
               </div>
             </div>
           </div>
         </div>
       </div>


       <div class="col-lg-6">
         <div class="contact-form">
           <form id="contact" action="{{url('reservation')}}" method="post">

             @csrf

             <div class="row">
               <div class="col-lg-12">
                 <h4>Tambahkan Metode Pembayaran Anda</h4>
               </div>
               <div class="col-lg-12">
                 <fieldset>

                   <select name="nama_alatbayar" id="nama_alatbayar">
                     <option value="-">Pilih Alat Bayar</option>
                     <option value="BRI">Bank BRI</option>
                     <option value="BNI">Bank BNI</option>
                     <option value="Mandiri">Bank Mandiri</option>
                     <option value="DANA">DANA</option>
                   </select>
                 </fieldset>
               </div>
               <div class="col-lg-12">
                 <fieldset>
                   <input name="norek_alatbayar" id="norek_alatbayar" placeholder="Nomor Rekening" required></input>
                 </fieldset>
               </div>
               <div class="col-lg-12">
                 <fieldset>
                   <input name="pemilik_alatbayar" id="pemilik_alatbayar" placeholder="Pemilik Rekening" required></input>
                 </fieldset>
               </div>
               <div class="col-lg-12">
                 <fieldset>
                   <button type="submit" id="form-submit" class="main-button-icon" style="margin-top: 10px;;">Tambah ALat Bayar</button>
                 </fieldset>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- ***** Reservation Area Ends ***** -->