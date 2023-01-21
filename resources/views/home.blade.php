@extends('layouts.main')

@section('container')
  <!-- ***** Welcome Area Start ***** -->
  <div id="welcome">
    <div style="background-color:#F1EFED; height:100px"></div>
    <div class="welcome-area"></div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
      <path fill="#F1EFED" fill-opacity="1"
        d="M0,128L40,144C80,160,160,192,240,181.3C320,171,400,117,480,101.3C560,85,640,107,720,112C800,117,880,107,960,101.3C1040,96,1120,96,1200,106.7C1280,117,1360,139,1400,149.3L1440,160L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
      </path>
    </svg>
  </div>
  <!-- ***** Welcome Area End ***** -->


  {{-- <!-- ***** Features Small Start ***** -->
  <section class="section home-feature">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <!-- ***** Features Small Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12"
              data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
              <div class="features-small-item">
                <div class="icon">
                  <i><img src="images/featured-item-01.png" alt=""></i>
                </div>
                <h5 class="features-title">Modern Strategy</h5>
                <p>Customize anything in this template to fit your website needs</p>
              </div>
            </div>
            <!-- ***** Features Small Item End ***** -->

            <!-- ***** Features Small Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12"
              data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
              <div class="features-small-item">
                <div class="icon">
                  <i><img src="images/featured-item-01.png" alt=""></i>
                </div>
                <h5 class="features-title">Best Relationship</h5>
                <p>Contact us immediately if you have a question in mind</p>
              </div>
            </div>
            <!-- ***** Features Small Item End ***** -->

            <!-- ***** Features Small Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12"
              data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
              <div class="features-small-item">
                <div class="icon">
                  <i><img src="images/featured-item-01.png" alt=""></i>
                </div>
                <h5 class="features-title">Ultimate Marketing</h5>
                <p>You just need to tell your friends about our free templates</p>
              </div>
            </div>
            <!-- ***** Features Small Item End ***** -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Features Small End ***** --> --}}

  <!-- ***** Features Big Item Start ***** -->
  <section class="section padding-top-70 padding-bottom-0" id="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12 align-self-center"
          data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
          <img src="img/logo_baznas_mobile.png" width="100%" class="rounded img-fluid d-block mx-auto" alt="App">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
          <div class="left-heading">
            <h2 class="section-title">Tentang BAZNAS</h2>
          </div>
          <div class="left-text">
            <p class="text-justify">Badan Amil Zakat Nasional (BAZNAS) merupakan badan resmi dan satu-satunya yang
              dibentuk oleh pemerintah
              berdasarkan Keputusan Presiden RI No. 8 Tahun 2001 yang memiliki tugas dan fungsi menghimpun dan menyalurkan
              zakat, infaq, dan sedekah (ZIS) pada tingkat nasional. Lahirnya Undang-Undang Nomor 23 Tahun 2011 tentang
              Pengelolaan Zakat semakin mengukuhkan peran BAZNAS sebagai lembaga yang berwenang melakukan pengelolaan
              zakat secara nasional. Dalam UU tersebut, BAZNAS dinyatakan sebagai lembaga pemerintah nonstruktural yang
              bersifat mandiri dan bertanggung jawab kepada Presiden melalui Menteri Agama.</p>

            <p class="text-justify"> demikian, BAZNAS bersama Pemerintah bertanggung jawab untuk mengawal pengelolaan
              zakat yang berasaskan:
              syariat Islam, amanah, kemanfaatan, keadilan, kepastian hukum, terintegrasi dan akuntabilitas.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="hr"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Features Big Item End ***** -->

  <!-- ***** Features Big Item Start ***** -->
  <section class="section padding-bottom-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
          <div class="left-heading">
            <h2 class="section-title">Visi BAZNAS</h2>
          </div>
          <div class="left-text">
            <p class="bg-success text-white p-2 text-center rounded">“Menjadi lembaga utama menyejahterakan ummat.”</p>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big"
          data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
          <img src="images/visi.png" class="rounded img-fluid d-block mx-auto" alt="App">
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Features Big Item End ***** -->
  <!-- ***** Features Big Item Start ***** -->
  <section class="section padding-top-70 padding-bottom-0" id="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12 align-self-center"
          data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
          <img src="images/misi.png" class="rounded img-fluid d-block mx-auto" alt="App">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
          <div class="left-heading">
            <h2 class="section-title">Misi BAZNAS</h2>
          </div>
          <div class="left-text">
            <table class="w-100 align-top">
              <tr>
                <td class="align-text-top">1. </td>
                <td class="text-justify">Membangun BAZNAS yang kuat, terpercaya, dan modern sebagai lembaga pemerintah
                  non-struktural yang
                  berwenang dalam pengelolaan zakat;</td>
              </tr>
              <tr>
                <td class="align-text-top">2. </td>
                <td class="text-justify">Memaksimalkan literasi zakat nasional dan peningkatan pengumpulan ZIS-DSKL secara
                  masif dan terukur;
                </td>
              </tr>
              <tr>
                <td class="align-text-top">3. </td>
                <td class="text-justify">Memaksimalkan pendistribusian dan pendayagunaan ZIS-DSKL untuk mengentaskan
                  kemiskinan, meningkatkan
                  kesejahteraan ummat, dan mengurangi kesenjangan sosial;</td>
              </tr>
              <tr>
                <td class="align-text-top">4. </td>
                <td class="text-justify">Memperkuat kompetensi, profesionalisme, integritas, dan kesejahteraan amil zakat
                  nasional secara
                  berkelanjutan;</td>
              </tr>
              <tr>
                <td class="align-text-top">5. </td>
                <td class="text-justify">Modernisasi dan digitalisasi pengelolaan zakat nasional dengan sistem manajemen
                  berbasis data yang
                  kokoh dan terukur;</td>
              </tr>
              <tr>
                <td class="align-text-top">6. </td>
                <td class="text-justify">Memperkuat sistem perencanaan, pengendalian, pelaporan, pertanggungjawaban, dan
                  koordinasi pengelolaan
                  zakat secara nasional;</td>
              </tr>
              <tr>
                <td class="align-text-top">7. </td>
                <td class="text-justify">Membangun kemitraan antara muzakki dan mustahik dengan semangat tolong menolong
                  dalam kebaikan dan
                  ketakwaan;</td>
              </tr>
              <tr>
                <td class="align-text-top">8. </td>
                <td class="text-justify">Meningkatkan sinergi dan kolaborasi seluruh pemangku kepentingan terkait untuk
                  pembangunan zakat
                  nasional; dan</td>
              </tr>
              <tr>
                <td class="align-text-top">9. </td>
                <td class="text-justify">Berperan aktif dan menjadi referensi bagi gerakan zakat dunia.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="hr"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Features Big Item End ***** -->

  <!-- ***** Home Parallax Start ***** -->
  <section class="mini" id="work-process">
    <div class="mini-content">
      <div class="container">

        <!-- ***** Section Title Start ***** -->
        <div class="row">
          <div class="col-lg-12">
            <div class="center-heading">
              <h2 class="section-title">Apa itu Zakat?</h2>
            </div>
          </div>
          <div class="offset-lg-1 col-lg-10">
            <div class="center-text">
              <p class="text-dark">Zakat adalah bagian tertentu dari harta yang wajib dikeluarkan oleh setiap muslim
                apabila telah mencapai
                syarat yang ditetapkan. Sebagai salah satu rukun Islam, Zakat ditunaikan untuk diberikan kepada golongan
                yang berhak menerimanya (asnaf).</p>

              <p class="text-dark">Zakat berasal dari bentuk kata "zaka" yang berarti suci, baik, berkah, tumbuh, dan
                berkembang. Dinamakan
                zakat, karena di dalamnya terkandung harapan untuk memperoleh berkah, membersihkan jiwa dan memupuknya
                dengan berbagai kebaikan (Fikih Sunnah, Sayyid Sabiq: 5)</p>

              <p class="text-dark">Makna tumbuh dalam arti zakat menunjukkan bahwa mengeluarkan zakat sebagai sebab adanya
                pertumbuhan dan
                perkembangan harta, pelaksanaan zakat itu mengakibatkan pahala menjadi banyak. Sedangkan makna suci
                menunjukkan bahwa zakat adalah mensucikan jiwa dari kejelekan, kebatilan dan pensuci dari dosa-dosa.</p>

              <p class="text-dark">Dalam Al-Quran disebutkan, “Ambillah zakat dari sebagian harta mereka, dengan zakat itu
                kamu membersihkan
                dan menyucikan mereka” (QS. at-Taubah [9]: 103).</p>
              <p class="text-dark">Menurut istilah dalam kitab al-Hâwî, al-Mawardi mendefinisikan zakat dengan nama
                pengambilan tertentu dari
                harta tertentu, menurut sifat-sifat tertentu dan untuk diberikan kepada golongan tertentu. Orang yang
                menunaikan zakat disebut Muzaki. Sedangkan orang yang menerima zakat disebut Mustahik.
              </p>
              <p class="text-dark">Sementara menurut Peraturan Menteri Agama No 52 Tahun 2014, Zakat adalah harta yang
                wajib dikeluarkan oleh
                seorang muslim atau badan usaha yang dimiliki oleh orang Islam untuk diberikan kepada yang berhak
                menerimanya sesuai dengan syariat Islam.</p>
              <p class="text-dark">Zakat dikeluarkan dari harta yang dimiliki. Akan tetapi, tidak semua harta terkena
                kewajiban zakat. Syarat
                dikenakannya zakat atas harta di antaranya:</p>
              <p class="text-left offset-lg-2 text-dark">
                1) harta tersebut merupakan barang halal dan diperoleh dengan cara yang halal;<br />
                2) harta tersebut dimiliki penuh oleh pemiliknya;<br />
                3) harta tersebut merupakan harta yang dapat berkembang;<br />
                4) harta tersebut mencapai nishab sesuai jenis hartanya;<br />
                5) harta tersebut melewati haul; dan<br />
                6) pemilik harta tidak memiliki hutang jangka pendek yang harus dilunasi.<br />
              </p>
            </div>
          </div>
        </div>
        <!-- ***** Section Title End ***** -->
      </div>
    </div>
  </section>
  <!-- ***** Home Parallax End ***** -->

  <!-- ***** Testimonials Start ***** -->
  <section class="section" id="testimonials">
    <div class="container">
      <div class="pb-5 text-center">
        <h1>Secara umum Zakat terdiri dari 2 yaitu : </h1>
      </div>
      <div class="row">
        <!-- ***** Testimonials Item Start ***** -->
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="team-item">
            <div class="team-content" style="min-height: 260px">
              <h2 class="text-center pt-3">Zakat Fitrah</h2>
              <p class="text-center">Zakat Fitrah (zakat al-fitr) adalah zakat yang diwajibkan atas setiap jiwa baik
                lelaki dan perempuan muslim yang dilakukan pada bulan Ramadhan.</p>
            </div>
          </div>
        </div>
        <!-- ***** Testimonials Item End ***** -->

        <!-- ***** Testimonials Item Start ***** -->
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="team-item">
            <div class="team-content" style="min-height: 260px">
              <h2 class="text-center pt-3">Zakat Maal</h2>
              <p class="text-center">Zakat mal adalah zakat yang dikenakan atas segala jenis harta, yang secara zat
                maupun substansi perolehannya, tidak bertentangan dengan ketentuan agama. Sebagai contoh, zakat mal
                terdiri atas uang, emas, surat berharga, penghasilan profesi, dan lain-lain.</p>
            </div>
          </div>
        </div>
        <!-- ***** Testimonials Item End ***** -->

        <!-- ***** Testimonials Item Start ***** -->
        {{-- <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="team-item">
            <div class="team-content">
              <i><img src="images/testimonial-icon.png" alt=""></i>
              <p>Quisque diam odio, maximus ac consectetur eu, auctor non lorem. Cras quis est non ante
                ultrices molestie. Ut vehicula et diam at aliquam.</p>
              <div class="user-image">
                <img src="http://placehold.it/60x60" alt="">
              </div>
              <div class="team-info">
                <h3 class="user-name">David Martin</h3>
                <span>Website Manager</span>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- ***** Testimonials Item End ***** -->
      </div>
    </div>
  </section>
  <!-- ***** Testimonials End ***** -->

  <!-- ***** Counter Parallax Start ***** -->
  <section class="counter">
    <div class="content">
      <div class="container">
        <div class="row" style="margin-top: 200px;">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="count-item decoration-bottom">
              <strong>34</strong>
              <span>BAZNAS Provinsi</span>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="count-item decoration-top">
              <strong>436</strong>
              <span>BAZNAS Kabupaten/Kota</span>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="count-item decoration-bottom">
              <strong>28</strong>
              <span>Lembaga Amil Zakat Nasional</span>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="count-item">
              <strong>23</strong>
              <span>Lembaga Zakat Internasional</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Counter Parallax End ***** -->

  {{-- <!-- ***** Blog Start ***** -->
  <section class="section" id="blog">
      <div class="container">
          <!-- ***** Section Title Start ***** -->
          <div class="row">
              <div class="col-lg-12">
                  <div class="center-heading">
                      <h2 class="section-title">Blog Entries</h2>
                  </div>
              </div>
              <div class="offset-lg-3 col-lg-6">
                  <div class="center-text">
                      <p>Integer molestie aliquam gravida. Nullam nec arcu finibus, imperdiet nulla vitae, placerat
                          nibh. Cras maximus venenatis molestie.</p>
                  </div>
              </div>
          </div>
          <!-- ***** Section Title End ***** -->

          <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="blog-post-thumb">
                      <div class="img">
                          <img src="images/blog-item-01.png" alt="">
                      </div>
                      <div class="blog-content">
                          <h3>
                              <a href="#">Vivamus ac vehicula dui</a>
                          </h3>
                          <div class="text">
                              Cras aliquet ligula dui, vitae fermentum velit tincidunt id. Praesent eu finibus nunc.
                              Nulla in sagittis eros. Aliquam egestas augue.
                          </div>
                          <a href="#" class="main-button">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="blog-post-thumb">
                      <div class="img">
                          <img src="images/blog-item-02.png" alt="">
                      </div>
                      <div class="blog-content">
                          <h3>
                              <a href="#">Phasellus convallis augue</a>
                          </h3>
                          <div class="text">
                              Aliquam commodo ornare nisl, et scelerisque nisl dignissim ac. Vestibulum finibus urna
                              ut velit venenatis, vel ultrices sapien mattis.
                          </div>
                          <a href="#" class="main-button">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="blog-post-thumb">
                      <div class="img">
                          <img src="images/blog-item-03.png" alt="">
                      </div>
                      <div class="blog-content">
                          <h3>
                              <a href="#">Nam gravida purus non</a>
                          </h3>
                          <div class="text">
                              Maecenas eu erat vitae dui convallis consequat vel gravida nulla. Vestibulum finibus
                              euismod odio, ut tempus enim varius eu.
                          </div>
                          <a href="#" class="main-button">Read More</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- ***** Blog End ***** --> --}}
@endsection
