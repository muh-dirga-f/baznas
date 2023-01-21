@extends('layouts.main')

@section('container')
  <section class="section colored" id="pricing-plans">
    <div class="container">
      <!-- ***** Section Title Start ***** -->
      <div class="row pt-5">
        <div class="col-lg-12">
          <div class="center-heading">
            <h2 class="section-title">Kalkulator Zakat</h2>
          </div>
        </div>
        <div class="offset-lg-3 col-lg-6">
          <div class="center-text">
            <p>Kalkulator zakat adalah layanan untuk mempermudah perhitungan jumlah zakat yang harus ditunaikan oleh
              setiap umat muslim sesuai ketetapan syariah. Oleh karena itu, bagi Anda yang ingin mengetahui berapa jumlah
              zakat yang harus ditunaikan, silahkan gunakan fasilitas Kalkulator Zakat BAZNAS dibawah ini.</p>
          </div>
        </div>
      </div>
      <!-- ***** Section Title End ***** -->

      <div class="row">
        <!-- ***** Pricing Item Start ***** -->
        <div class="offset-lg-2 col-lg-8 offset-md-1 col-md-10 col-sm-12"
          data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" data-scroll-reveal-id="6"
          data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
          <div class="pricing-item p-3">
            <div class="pricing-header">
              <h3 class="pricing-title">Kalkulator Zakat</h3>
            </div>
            <div class="pricing-body">
              <div class="form-group">
                <label for="form_post" class="font-weight-bold">Jenis Zakat</label>
                <select id="jenis" name="form_post" class="form-control required">
                  <option value=""></option>
                  <!-- <option value="zakatfitrah">Zakat Fitrah</option> -->
                  <option value="zakatpenghasilan" data-container="containerHitungZakatPenghasilan">Zakat Penghasilan
                  </option>
                  <option value="zakatmaal" data-container="containerHitungZakatMaal">Zakat Maal</option>
                </select>
                <div id="containerHitungZakatPenghasilan" class="d-none">
                  <p class="py-3 text-justify">
                    Zakat penghasilan atau yang dikenal juga sebagai zakat profesi adalah bagian dari zakat maal yang
                    wajib
                    dikeluarkan atas harta yang berasal dari pendapatan / penghasilan rutin dari pekerjaan yang tidak
                    melanggar syariah. Nishab zakat penghasilan sebesar 85 gram emas per tahun. Kadar zakat penghasilan
                    senilai 2,5%. Dalam praktiknya, zakat penghasilan dapat ditunaikan setiap bulan dengan nilai nishab
                    per
                    bulannya adalah setara dengan nilai seperduabelas dari 85 gram emas, dengan kadar 2,5%. Jadi apabila
                    penghasilan setiap bulan telah melebihi nilai nishab bulanan, maka wajib dikeluarkan zakatnya sebesar
                    2,5% dari penghasilannya tersebut. (Sumber: Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri
                    Agama
                    Nomer 31 Tahun 2019, Fatwa MUI Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf Qardawi).
                  </p>
                  <form id="formHitungZakatPenghasilan">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="pendapatan" class="font-weight-bold">Jumlah pendapatan per bulan</label>
                          <input name="pendapatan" class="form-control" type="number" id="pendapatan" required
                            placeholder="Masukkan nominal tanpa titik." aria-required="true">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="bonus" class="font-weight-bold">Bonus, THR dan lainnya</label>
                          <input name="bonus" class="form-control" type="number" id="bonus" required
                            placeholder="Masukkan nominal tanpa titik." aria-required="true">
                        </div>
                      </div>
                    </div>
                    {{-- <p class="text-justify">Informasi yang Anda masukkan ke dalam kalkulator zakat
                      akan dibagikan ke BAZNAS untuk tujuan perhitungan zakat dan diproses oleh BAZNAS sesuai dengan
                      kebijakan privasi BAZNAS.</p> --}}
                    <div class="form-group text-center pt-3">
                      <button id="hitungZakatPenghasilan" type="submit" class="btn btn-success btn-lg">Hitung
                        Zakat</button>
                    </div>
                  </form>
                </div>
                <div id="containerHasilZakatPenghasilan" class="d-none">
                  <p class="py-3 text-justify">
                  <table class="w-100">
                    <tr>
                      <td colspan="2" class="text-center">Jumlah zakat penghasilan Anda:</td>
                    </tr>
                    <tr>
                      <td colspan="2" class="text-center">
                        <h1><span id="hasilZakatPenghasilan"></span></h1>
                      </td>
                    </tr>
                    <tr>
                      <td>Pendapatan per bulan:</td>
                      <td class="text-right"><span id="hasilPendapatan"></span></td>
                    </tr>
                    <tr>
                      <td>Bonus, THR dan lainnya:</td>
                      <td class="text-right"><span id="hasilBonus"></span></td>
                    </tr>
                  </table>
                  <div class="form-group text-center pt-3">
                    <button id="hitungUlangZakatPenghasilan" type="submit" class="btn btn-warning btn-lg">Hitung
                      Ulang</button>
                  </div>
                  </p>
                </div>
                <div id="containerHitungZakatMaal" class="d-none">
                  <p class="pt-3 text-justify">
                    Zakat maal yang dimaksud dalam perhitungan ini adalah zakat yang dikenakan atas uang, emas, surat
                    berharga, dan aset yang disewakan. Tidak termasuk harta pertanian, pertambangan, dan lain-lain yang
                    diatur dalam UU No.23/2011 tentang pengelolaan zakat. Zakat maal harus sudah mencapai nishab (batas
                    minimum) dan terbebas dari hutang serta kepemilikan telah mencapai 1 tahun (haul). Nishab zakat maal
                    sebesar 85 gram emas. Kadar zakatnya senilai 2,5%. (Sumber: Al Qur'an Surah Al Baqarah ayat 267,
                    Peraturan Menteri Agama Nomer 31 Tahun 2019, Fatwa MUI Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf
                    Qardawi)
                  </p>
                  <p class="pb-3 pt-2 text-justify">
                    Standar harga emas yg digunakan untuk 1 gram nya adalah Rp938.099,-. Sementara nishab yang digunakan
                    adalah sebesar 85 gram emas.
                  </p>
                  <form id="formHitungZakatMaal">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="nilai_emas" class="font-weight-bold">Nilai emas, perak, dan/atau permata</label>
                          <input name="nilai_emas" class="form-control" type="number" id="nilai_emas" required
                            placeholder="Masukkan nominal tanpa titik." aria-required="true">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="uang_tunai" class="font-weight-bold">Uang tunai, tabungan, deposito</label>
                          <input name="uang_tunai" class="form-control" type="number" id="uang_tunai" required
                            placeholder="Masukkan nominal tanpa titik." aria-required="true">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="kendaraan" class="font-weight-bold">Kendaraan, rumah, aset lain</label>
                          <input name="kendaraan" class="form-control" type="number" id="kendaraan" required
                            placeholder="Masukkan nominal tanpa titik." aria-required="true">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="hutang" class="font-weight-bold">Jumlah hutang/cicilan (optional)</label>
                          <input name="hutang" class="form-control" type="number" id="hutang" required
                            placeholder="Masukkan nominal tanpa titik." aria-required="true">
                        </div>
                      </div>
                    </div>
                    {{-- <p class="text-justify">Informasi yang Anda masukkan ke dalam kalkulator zakat
                      akan dibagikan ke BAZNAS untuk tujuan perhitungan zakat dan diproses oleh BAZNAS sesuai dengan
                      kebijakan privasi BAZNAS.</p> --}}
                    <div class="form-group text-center pt-3">
                      <button id="hitungZakatMaal" type="submit" class="btn btn-success btn-lg">Hitung
                        Zakat</button>
                    </div>
                  </form>
                </div>
                <div id="containerHasilZakatMaal" class="d-none">
                  <p class="py-3 text-justify">
                  <table class="w-100">
                    <tr>
                      <td colspan="2" class="text-center">Jumlah zakat penghasilan Anda:</td>
                    </tr>
                    <tr>
                      <td colspan="2" class="text-center">
                        <h1><span id="hasilZakatMaal"></span></h1>
                      </td>
                    </tr>
                    <tr>
                      <td>Pendapatan per bulan:</td>
                      <td class="text-right"><span id="hasilPendapatan"></span></td>
                    </tr>
                    <tr>
                      <td>Bonus, THR dan lainnya:</td>
                      <td class="text-right"><span id="hasilBonus"></span></td>
                    </tr>
                  </table>
                  <div class="form-group text-center pt-3">
                    <button id="hitungUlangZakatMaal" type="submit" class="btn btn-warning btn-lg">Hitung
                      Ulang</button>
                  </div>
                  </p>
                </div>
              </div>

            </div>
            {{-- <div class="pricing-footer pb-3">
              <a href="#" class="main-button">Hitung Zakat</a>
            </div> --}}
          </div>
        </div>
        <!-- ***** Pricing Item End ***** -->
      </div>
    </div>
  </section>
  <script>
    $(document).ready(function() {
      $('#jenis').on('change', function() {
        let container = $(this).find(":selected").data('container');
        selectContainer(container);
      });

      $('#hitungZakatPenghasilan').on('click', function(e) {
        e.preventDefault();
        let form = $('#formHitungZakatPenghasilan')[0];
        let formData = new FormData(form);
        // console.log(...formData);
        let pendapatan = (formData.get('pendapatan')) ? formData.get('pendapatan') : 0;
        let bonus = (formData.get('bonus')) ? formData.get('bonus') : 0;
        // let total = (parseInt(pendapatan) + parseInt(bonus)) * (0.025);
        let total = ((parseInt(pendapatan) + parseInt(bonus)) / 100) * 2.5;
        console.log(pendapatan, bonus);
        console.log(total);
        if (parseInt(pendapatan) + parseInt(bonus) >= 6828806) {
          $('#hasilZakatPenghasilan').text(formatter.format(total) + ',-');
        } else {
          $('#hasilZakatPenghasilan').html('Rp. 0,-<br/><h3>Penghasilan Anda belum mencapai nishab</h3>');
        }
        $('#hasilPendapatan').text(formatter.format(pendapatan) + ',-');
        $('#hasilBonus').text(formatter.format(bonus) + ',-');

        selectContainer('containerHasilZakatPenghasilan');
      });


      $('#hitungUlangZakatPenghasilan').on('click', function() {
        selectContainer('containerHitungZakatPenghasilan');
      });

      $('#hitungUlangZakatMaal').on('click', function() {
        selectContainer('containerHitungZakatMaal');
      });


      $('#hitungZakatMaal').on('click', function(e) {
        e.preventDefault();
        let form = $('#formHitungZakatMaal')[0];
        let formData = new FormData(form);
        // console.log(...formData);
        let nilai_emas = (formData.get('nilai_emas')) ? formData.get('nilai_emas') : 0;
        let uang_tunai = (formData.get('uang_tunai')) ? formData.get('uang_tunai') : 0;
        let kendaraan = (formData.get('kendaraan')) ? formData.get('kendaraan') : 0;
        let hutang = (formData.get('hutang')) ? formData.get('hutang') : 0;

        let total_maal = parseInt(nilai_emas) + parseInt(uang_tunai) + parseInt(kendaraan);
        let total = Math.ceil(((parseInt(nilai_emas) + parseInt(uang_tunai) + parseInt(kendaraan)) - parseInt(
          hutang)) * (
          0.025));
        // console.log(total_maal, total);

        if (total_maal < 79738415) {
          $('#hasilZakatMaal').html('Rp. 0,-<br/><h3>Penghasilan Anda belum mencapai nishab</h3>');
        } else {
          $('#hasilZakatMaal').text(formatter.format(total) + ',-');
        }

        selectContainer('containerHasilZakatMaal');
      });

    });

    function selectContainer(container) {
      let array_container = ['containerHitungZakatPenghasilan', 'containerHasilZakatPenghasilan',
        'containerHitungZakatMaal', 'containerHasilZakatMaal'
      ];
      var filteredArray = array_container.filter(e => e !== container);
      filteredArray.forEach((v, i) => {
        $('#' + v).addClass('d-none');
      });
      $('#' + container).removeClass('d-none');
    }

    const formatter = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      maximumFractionDigits: 0,
    });
  </script>
@endsection
