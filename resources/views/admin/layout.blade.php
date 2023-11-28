<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">


  <title>Sleek - Admin Dashboard Template</title>

  <link rel="stylesheet" href="{{ asset('themes/adsl/assets/css/main.css')}}">

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />


<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ URL::asset('admin/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

  
  
  <!-- No Extra plugin used -->
  
  <link href="{{ URL::asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  
  
  
  <link href="{{ URL::asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
  
  
  
  <link href="{{ URL::asset('admin/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" />
  
  

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ URL::asset('admin/assets/css/sleek.css') }}" />

  <link id="bsdp-css" rel="stylesheet" href="{{ URL::asset('admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
  <!-- FAVICON -->
  <link href="{{ URL::asset('admin/assets/img/favicon.png') }}" rel="shortcut icon" />

  

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <script src="{{ URL::asset('admin/assets/plugins/nprogress/nprogress.js') }}"></script>
</head>


<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
  
  <script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
  </script>

  <div class="mobile-sticky-body-overlay"></div>

  
  <div id="toaster"></div>
  

  <div class="wrapper">
    
    
    @include('admin.partials.sidebar')

    <div class="page-wrapper">
        @include('admin.partials.header')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
</div>

  <script src="{{ URL::asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>



<script src="{{ URL::asset('admin/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/jekyll-search.min.js') }}"></script>



<script src="{{ URL::asset('admin/assets/plugins/charts/Chart.min.js') }}"></script>
  


<script src="{{ URL::asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
  


<script src="{{ URL::asset('admin/assets/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
  


<script src="{{ URL::asset('admin/assets/plugins/toastr/toastr.min.js') }}"></script>
  


<script src="{{ URL::asset('admin/assets/js/sleek.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('admin/assets/ckeditor/ckeditor.js') }}"></script>
<script>

$('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});

  $(".delete").on("submit", function () {
    return confirm("Do you want to remove this?");
  });
</script>
<script>
    $(document).ready(function(){
        //active select2
        $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
            theme:'bootstrap4',width:'style',
        });
        //ajax select kota asal
        $('select[name="province_origin"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/admin/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_origin"]').empty();
                        $('select[name="city_origin"]').append('<option value="">-- pilih kota --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_origin"]').append('<option value="">-- pilih kota --</option>');
            }
        });
        //ajax select kota tujuan
        $('select[name="province_destination"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/admin/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append('<option value="">-- pilih kota --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').append('<option value="">-- pilih kota --</option>');
            }
        });
        //ajax check ongkir
        let isProcessing = false;
        $('.btn-check').click(function (e) {
            e.preventDefault();

            let token            = $("meta[name='csrf-token']").attr("content");
            let city_origin      = $('select[name=city_origin]').val();
            let city_destination = $('select[name=city_destination]').val();
            let courier          = $('select[name=courier]').val();
            let weight           = $('#weight').val();

            if(isProcessing){
                return;
            }

            isProcessing = true;
            jQuery.ajax({
                url: "/ongkir",
                data: {
                    _token:              token,
                    city_origin:         city_origin,
                    city_destination:    city_destination,
                    courier:             courier,
                    weight:              weight,
                },
                dataType: "JSON",
                type: "POST",
                success: function (response) {
                    isProcessing = false;
                    if (response) {
                        $('#ongkir').empty();
                        $('.ongkir').addClass('d-block');
                        $.each(response[0]['costs'], function (key, value) {
                            $('#ongkir').append('<li class="list-group-item">'+response[0].code.toUpperCase()+' : <strong>'+value.service+'</strong> - Rp. '+value.cost[0].value+' ('+value.cost[0].etd+' hari)</li>')
                        });

                    }
                }
            });

        });

    });
</script>

<script>

$(document).ready(function(){
    $('.yes').click(function(){
        $('p').slideDown(); //to show
    });
    $('.no').click(function(){
        $('p').slideUp();  //to hide
    });
});

</script>
<script>
    <!-- js start -->
function showHideConfigurableAttributes() {
			var productType = $(".product-type").val();
				
			if (productType == 'point') {
				$(".point-tes").show();
			} else {
				$(".point-tes").hide();
			}

            if (productType == 'voucher') {
				$(".voucher-tes").show();
			} else {
				$(".voucher-tes").hide();
			}
		}

		$(function(){
			showHideConfigurableAttributes();
			$(".product-type").change(function() {
				showHideConfigurableAttributes();
			});
});
<!-- js end -->
</script>
<style>
  /* Menambahkan gaya ke tautan */
  .custom-link {
    font-size: 16px; /* Ubah ukuran teks sesuai yang Anda inginkan */
    color: black; /* Ubah warna teks sesuai yang Anda inginkan */
    text-decoration: none; /* Menghilangkan garis bawah pada tautan */
  }
</style>
<style>
        /* CSS untuk mengatur div menjadi flex container dan menengahkan serta membesarkan gambar */
        .teks-tengah-besar {
            display: flex;
            justify-content: center; /* Untuk mengatur gambar menjadi di tengah horizontal */
            align-items: center; /* Untuk mengatur gambar menjadi di tengah vertikal */
            height: 100vh; /* Untuk mengisi seluruh tinggi layar */
        }

        .teks-tengah-besar img {
            max-width: 100%; /* Maksimum lebar gambar sesuai lebar layar */
            max-height: 100%; /* Maksimum tinggi gambar sesuai tinggi layar */
            width: 60%; /* Menjaga aspek ratio gambar */
            height: auto; /* Menjaga aspek ratio gambar */
            object-fit: contain; /* Untuk menjaga aspek ratio tanpa memotong gambar */
        }
    </style>

</body>

</html>