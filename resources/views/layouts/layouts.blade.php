<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_template/template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/template/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin_template/template/assets/vendors/jvectormap/jquery-jvectormap.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_template/template/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/template/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/template/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/template/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('admin_template/template/assets/css/style.css') }}">
    <style>
    .input-group .btn {
        margin: 0 3px; /* Jarak horizontal antara tombol dan angka */
    }

    .input-group .jumlah-obat {
        margin: 0 10px; /* Jarak horizontal di sekitar angka */
        font-weight: bold; /* Optional: untuk menebalkan angka */
    }
</style>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin_template/template/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('admin_template/template/assets/images/logo.svg') }}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('admin_template/template/assets/images/logo-mini.svg') }}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{ asset('admin_template/template/assets/images/faces/face15.jpg') }}" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.html">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Form Elements</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/icons/mdi.html">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">             
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>                 
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="{{ asset('admin_template/template/assets/images/faces/face15.jpg') }}" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            @yield('content')
         
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin_template/template/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin_template/template/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin_template/template/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/js/todolist.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('admin_template/template/assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('admin_template/template/assets/js/select2.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- Custom js for this page -->
    <script src="{{asset('admin_template/template/assets/js/dashboard.js')  }}"></script>
    <!-- End custom js for this page -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

     <!-- Bootstrap JS -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <!-- Bootstrap Datepicker JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    <script>
        $(document).ready(function () {
            // Aktifkan Datepicker
            $("#datepicker").datepicker({
                dateFormat: "dd-mm-yy", // Format tanggal
                changeMonth: true,     // Pilihan untuk mengubah bulan
                changeYear: true,      // Pilihan untuk mengubah tahun
                yearRange: "1900:2100" // Rentang tahun yang tersedia
            });
        });
    </script>

    <script>
          $(document).ready(function () {

            $("#nomor_rekam_medis").val("");
            $("#nomor_rekam_medis").val("");
            $("#nama_pasien").val("");
            $("#tgl_lahir").val("");
            $("#alamat").val("");
            $(".inputan-pemeriksaan").hide();


            $("#cek_rekam_medis").on("click", function () {
              var nomor_rekam_medis = $("input[name='nomor_rekam_medis']").val();
              if (nomor_rekam_medis.trim() === "") {
                alert("Silakan masukkan nomor rekam medis terlebih dahulu.");
                return;
              }

              $.ajax({
                url: "/carinorekammedis",                 // Ganti dengan endpoint Laravel Anda
                type: "GET",
                data: { nomor_rekam_medis: nomor_rekam_medis },
                dataType: "json",
                success: function (response) {
                  if (response.success) {
                    $("#pasien").val(response.data.pasien);
                    $("#nama_pasien").val(response.data.nama_pasien);
                    $("#tgl_lahir").val(response.data.tgl_lahir);
                    $("#alamat").val(response.data.alamat);
                    $(".inputan-pemeriksaan").show();

                  }else{
                    alert("Data tidak ditemukan.");
                    // Kosongkan input jika data tidak ditemukan
                    $("#pasien").val("");
                    $("#nama_pasien").val("");
                    $("#tgl_lahir").val("");
                    $("#alamat").val("");
                    $(".inputan-pemeriksaan").hide();
                  }
                },
                error: function () {
                    alert("Terjadi kesalahan saat mencari data. Silakan coba lagi.");
                }
              });
            });
          });
    </script>
    <script>
        document.getElementById('cari-obat').addEventListener('click', function () {
            var modalCariObat = new bootstrap.Modal(document.getElementById('modalCariObat'), {});
            modalCariObat.show();
        });

        
    </script>
    <script>
       $(document).ready(function () {
        // Event untuk memilih obat dari tabel
        $('.pilih-obat').on('click', function () {
            // Ambil data nama obat dari atribut data-nama-obat
            var namaObat = $(this).data('nama-obat');
            
            // Isi input dengan nama obat
            $('#cari-obat').val(namaObat);
              
            // Tutup modal
            $('#modalCariObat').modal('hide');
        });
    });
    </script>

<script>
    $(document).ready(function () {
        // Event untuk memilih obat dari tabel
        $('.pilih-obat').on('click', function () {
            // Ambil data dari atribut data pada baris yang dipilih
            var namaObat = $(this).data('nama-obat');
            var kodeObat = $(this).find('td:eq(1)').text();
            var hargaJual = $(this).find('td:eq(3)').text();
            var stok = $(this).find('td:eq(4)').text();
            var idObat= $(this).find('td:eq(0)').text()

             // Periksa apakah kode obat sudah ada di tabel
             var isDuplicate = false;
            $('#tabel-obat-terpilih tbody tr').each(function () {
                var existingKodeObat = $(this).find('td:eq(1)').text();
                if (existingKodeObat === kodeObat) {
                    isDuplicate = true; // Jika ada duplikat, set menjadi true
                    return false; // Hentikan iterasi
                }
            });

            // Jika tidak ada duplikat, tambahkan data ke tabel
            if (!isDuplicate) {
                var rowCount = $('#tabel-obat-terpilih tbody tr').length + 1; // Hitung jumlah baris
                var newRow = `
                    <tr>
                   
                        <td>${rowCount}</td>
                        <td>${kodeObat}</td>
                        <td>${namaObat}</td>
                        <td>${hargaJual}</td>
                        <td>${stok}</td>
                        <td>
                            <div class="input-group">
                                <button type="button" class="btn btn-sm btn-secondary btn-minus"></button>
                                <span class="jumlah-obat">1</span>
                              <button type="button" class="btn  btn-rounded  btn-sm btn-secondary btn-plus"></button>
                            </div>
                        </td>
                        <td>
                                <button type="button" class="btn btn-danger btn-sm btn-hapus">Hapus</button> <!-- Tombol Hapus -->
                        </td>
                    </tr>`;
                $('#tabel-obat-terpilih tbody').append(newRow); // Tambahkan baris baru
                updateTotal(); // Update total setelah menambahkan baris
            } else {
                alert('Obat dengan kode ini sudah ada di tabel!');
            }

            // Tutup modal
            $('#modalCariObat').modal('hide');

           
        });

        // Event untuk tombol - di kolom Jumlah
        $(document).on('click', '.btn-minus', function () {
            var span = $(this).siblings('.jumlah-obat');
            var currentValue = parseInt(span.text());
            if (currentValue > 1) {
                span.text(currentValue - 1); // Mengurangi nilai di span
                updateTotal(); // Update total setelah baris dihapus
            }
        });

        // Event untuk tombol + di kolom Jumlah
        $(document).on('click', '.btn-plus', function () {
            var span = $(this).siblings('.jumlah-obat');
            var currentValue = parseInt(span.text());
            var stok = parseInt($(this).closest('tr').find('td:eq(4)').text()); // Ambil nilai stok dari kolom Stok

            // Periksa apakah jumlah saat ini sudah mencapai stok
            if (currentValue < stok) {
                span.text(currentValue + 1); // Menambah nilai di span
                updateTotal(); // Update total setelah perubahan jumlah
            } else {
                alert('Jumlah tidak boleh lebih dari stok yang tersedia!'); // Peringatan jika jumlah melebihi stok
            }
            
        });


        $(document).on('click', '.btn-hapus', function () {
                $(this).closest('tr').remove(); // Menghapus baris yang sesuai dengan tombol Hapus yang ditekan
                updateTotal(); // Update total setelah baris dihapus
        });

        // Fungsi untuk menghitung total jumlah obat
        function updateTotal() {
                var total = 0;
                $('#tabel-obat-terpilih tbody tr').each(function () {
                  
                    var jumlah = parseInt($(this).find('.jumlah-obat').text()); // Ambil jumlah dari span
                    var hargaJual = parseInt($(this).find('td:eq(3)').text()); // Ambil harga jual dari kolom ke-3
                    total += (jumlah * hargaJual);
                });
                $('#total-jumlah').text(formatRupiah(total));
        }

        // Fungsi untuk memformat angka ke dalam format Rupiah
        function formatRupiah(angka) {
            return 'Rp' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

          $('#beli-obat').on('click', function (event) {
            event.preventDefault(); // Cegah form terkirim otomatis
            var form = $(this).closest('form');

            // Hapus input tersembunyi sebelumnya
            form.find('.hidden-input').remove();

            // Tambahkan input tersembunyi untuk setiap obat yang dipilih
            $('#tabel-obat-terpilih tbody tr').each(function () {
                var kodeObat = $(this).find('td:eq(1)').text();
                var jumlah = $(this).find('.jumlah-obat').text();

                form.append(`
                    <input type="hidden" name="kode_obat[]" value="${kodeObat}" class="hidden-input">
                    <input type="hidden" name="jumlah[]" value="${jumlah}" class="hidden-input">
                `);
            });

            // Submit form
            form.submit();
        });
    
       

            
    });
</script>

<script>
  function handleEnter(event, input, id) {
    // Cek jika tombol yang ditekan adalah "Enter" (key code 13)
    if (event.key === "Enter") {
        event.preventDefault(); // Mencegah perilaku default form

        const harga_pelayanan = input.value;

        // Validasi input
        if (!harga_pelayanan || harga_pelayanan <= 0) {
            alert('Harga pelayanan tidak boleh kosong atau negatif.');
            return;
        }

        // Kirim data ke server melalui AJAX
        fetch(`/updateHargaPelayanan/${id}/`, {

            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ harga_pelayanan: harga_pelayanan })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Harga pelayanan berhasil diperbarui.');
                location.reload(); // Reload halaman agar perubahan terlihat
            } else {
                alert('Gagal memperbarui harga pelayanan.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
</script>

<script>
    $(document).ready(function () {
        $(".updatestok").each(function () {
            let stokTd = $(this).closest("tr").find("td:nth-child(7)"); // Ambil kolom stok
            let stok = parseInt(stokTd.text().trim()); // Ambil nilai stok

            // Jika stok kurang dari atau sama dengan 5, aktifkan tombol
            if (stok <= 5) {
                $(this).prop("disabled", false);
            }
        });

        $(".updatestok").click(function () {
            let stokTd = $(this).closest("tr").find("td:nth-child(7)"); // Kolom stok
            let currentStock = stokTd.text().trim(); // Ambil stok saat ini

            // Ubah teks stok menjadi inputan
            stokTd.html(`<input type="text" class="form-control stok-input" value="${currentStock}">`);

            // // Matikan tombol setelah diklik untuk menghindari duplikasi
            // $(this).prop("disabled", true);

            
            // Fokus ke input stok
            stokTd.find(".stok-input").focus();

        });

         // Event saat menekan tombol Enter di input stok
         $(document).on("keypress", ".stok-input", function (e) {
            if (e.which === 13) { // Cek jika tombol Enter ditekan
                let inputField = $(this);
                let newStock = parseInt(inputField.val().trim()); // Ambil nilai baru
                let stokTd = inputField.closest(".stok-td"); // Kolom stok
                let obatId = stokTd.data("id"); // ID Obat

                // Validasi stok minimal 5
                if (newStock < 5) {
                    alert("Stok kurang dari 5!");
                    return;
                }

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    url: "/updatestok/" + obatId,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        stok: newStock
                    },
                    success: function (response) {
                        // Jika berhasil, update tampilan
                        stokTd.html(newStock);
                        $(".updatestok[data-id='" + obatId + "']").prop("disabled", newStock > 5);
                    },
                    error: function () {
                        alert("Gagal memperbarui stok!");
                    }
                });
            }
        });

    });
</script>

   
  </body>
</html>