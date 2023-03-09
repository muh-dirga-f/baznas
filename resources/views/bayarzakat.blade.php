@extends('layouts.main')

@section('container')
  <!-- ***** Contact Us Start ***** -->
  <section class="section colored" id="contact-us">
    <div class="container">
      <!-- ***** Section Title Start ***** -->
      <div class="row">
        <div class="col-lg-12">
          <div class="center-heading">
            <h2 class="section-title">Bayar Zakat</h2>
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
              </div>
            @endif
            @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
              </div>
            @endif
          </div>
        </div>
        <div class="col-lg-12">
          <div class="center-text">
            <div class="zakat" id="zakat">
              <div class="note">
                <h5>Instruksi</h5>
                <table class="table" width="100%">
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td style="text-align:left;">Salin nomor rekening sesuai jenis dana (zakat, infak/sedekah, sedekah
                        untuk operasional BAZNAS, program tematik). <button class="btn btn-sm btn-success"
                          data-toggle="modal" data-target="#exampleModal">Tampilkan Nomor Rekening</button></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td style="text-align:left;">Transfer dari ATM, M-banking, i-banking, SMS-banking, dan atau teller
                        bank. </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td style="text-align:left;">Simpan bukti transfer,kemudian lengkapi form dibawah ini.</td>
                    </tr>
                    {{-- <tr>
                      <td>4.</td>
                      <td style="text-align:left;">Untuk mengecek data pembayaran melalui halaman ini. <a
                          href="/konfirmasi-pembayaran" class="btn btn-sm btn-primary">Konfirmasi Pembayaran</a></td>
                    </tr> --}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ***** Section Title End ***** -->

      <div class="row">
        <!-- ***** Contact Form Start ***** -->
        <div class="col-lg-12">
          <div class="contact-form">
            <form id="bayarZakat" action="/bayar-zakat/store" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="sapaan">Sapaan</label>
                    <select name="sapaan" class="form-control" id="sapaan" required>
                      <option value="bapak">Bapak</option>
                      <option value="ibu">Ibu</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="nama_pengirim">Nama Lengkap</label>
                    <input name="nama_pengirim" type="text" class="form-control" id="nama_pengirim"
                      placeholder="Nama Lengkap" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="zis">Pilih ZIS</label>
                    <select name="zis" class="form-control" id="zis" required>
                      <option value="zakat">Zakat</option>
                      <option value="kurban">Kurban</option>
                      <option value="infaq">Infaq</option>
                      <option value="sedekah">Sedekah</option>
                      <option value="fadiyah">Fadiyah</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="jenis_zis">Jenis ZIS</label>
                    <select name="jenis_zis" class="form-control" id="jenis_zis" required>
                      <option value="zakat_penghasilan">zakat_penghasilan</option>
                      <option value="zakat_maal">zakat_maal</option>
                      <option value="zakat_fitrah">zakat_fitrah</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="no_pengirim">No. Handphone</label>
                    <input name="no_pengirim" type="text" class="form-control" id="no_pengirim"
                      placeholder="No. Handphone" required>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="email_pengirim">Email</label>
                    <input name="email_pengirim" type="email" class="form-control" id="email_pengirim"
                      placeholder="pengguna@email.com" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="nama_bank">Bank Pengirim</label>
                    <select name="nama_bank" class="form-control" id="nama_bank" required>
                      <option value="BRI">BRI</option>
                      <option value="BCA">BCA</option>
                      <option value="MANDIRI">MANDIRI</option>
                      <option value="MANDIRI">Sulselbar</option>
                      <option value="MANDIRI">Sulselbar Syariah</option>
                      <option value="MANDIRI">BSI</option>
                    </select>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="nama_rek_bank">Bank Tujuan</label>
                    <select name="nama_rek_bank" class="form-control" id="nama_rek_bank" required>
                      <option value="sulselbar">Sulselbar</option>
                      <option value="sulselbarsyariah">Sulselbar Syariah</option>
                      <option value="bsi">BSI</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="no_rek_bank">Bank Tujuan</label>
                    <input name="no_rek_bank" type="text" class="form-control" id="no_rek_bank"
                      placeholder="Nomor Rekening Tujuan" readonly value="050-202-0000002735-2" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                      </div>
                      <input name="nominal" type="text" class="form-control" placeholder="Input Nominal"
                        aria-label="Nominal" aria-describedby="basic-addon1" value="0" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control-file" id="bukti_pembayaran"
                      required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="main-button">Simpan Data</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- ***** Contact Form End ***** -->
      </div>
    </div>
  </section>
  <!-- ***** Contact Us End ***** -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Daftar Nomor Rekening</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table-responsive center" style="border:none !important;">
            <thead>
              <tr>
                <th style="width:5% !important;">NO.</th>
                <th style="width:35% !important; text-align: center;">BANK</th>
                <th style="width:40% !important;">NOMOR REKENING</th>
                <th style="width:10% !important;">SALIN</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tab-no"><b>1.</b></td>
                <td style="text-align: center;"><a target="_blank" href="https://banksulselbar.co.id/"><img
                      class="img-bank" src="img/sulselbar.png"></a></td>
                <td style="text-align: center;"><span class="norek"><b>050-202-0000002735-2</b></span></td>
                <td style="text-align: center;"><i title="Salin nomor rekening"
                    class="fa fa-copy text-theme-colored btn-xl btn btn-colored"
                    onclick="getBaznasRekening('050-202-0000002735-2');return false;"></i></td>
              </tr>
              <tr>
                <td class="tab-no"><b>2.</b></td>
                <td style="text-align: center;"> <a target="_blank" href="https://banksulselbar.co.id/"><img
                      class="img-bank" src="img/sulselbarsyariah.png"></a></td>
                <td style="text-align: center;"><span class="norek"><b>538-261-000000003-2</b></span></td>
                <td style="text-align: center;"><i title="Salin nomor rekening"
                    class="fa fa-copy text-theme-colored btn-xl btn btn-colored"
                    onclick="getBaznasRekening('538-261-000000003-2');return false;"></i></td>
              </tr>
              <tr>
                <td class="tab-no"><b>3.</b></td>
                <td style="text-align: center;"><a target="_blank"
                    href="https://www.bankbsi.co.id/"><img class="img-bank"
                      src="img/bsi.png"></a></td>
                <td style="text-align: center;"><span class="norek"><b>1024715643</b></span></td>
                <td style="text-align: center;"><i title="Salin nomor rekening"
                    class="fa fa-copy text-theme-colored btn-xl btn btn-colored"
                    onclick="getBaznasRekening('1024715643');return false;"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
