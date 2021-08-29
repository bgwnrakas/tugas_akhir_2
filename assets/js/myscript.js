const flashData = $('.flash-data').data('flashdata');

if (flashData){
    Swal({
        title: 'Data Penilaian',
        text: flashData,
        type: 'success'
    });
}

//tombol-hapus
$('.tombol-hapus-penilaian').on('click', function(e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu ingin hapus data penilaian ini?',
        text: "Klik tombol delete jika ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
});

$('.tombol-hapus-pengguna').on('click', function(e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu ingin hapus data pengguna ini?',
        text: "Klik tombol delete jika ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
});

$('.tombol-hapus-kriteria').on('click', function(e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu ingin hapus data kriteria ini?',
        text: "Klik tombol delete jika ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
});

$('.tombol-hapus-sub-kriteria').on('click', function(e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu ingin hapus data sub kriteria ini?',
        text: "Klik tombol delete jika ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
});

$('.tombol-hapus-karyawan').on('click', function(e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu ingin hapus data karyawan ini?',
        text: "Klik tombol delete jika ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
});

$('.tombol-hapus-bonus').on('click', function(e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu ingin hapus data bonus ini?',
        text: "Klik tombol delete jika ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
});