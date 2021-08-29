  <!-- Footer -->
  <footer class="card-footer bg-gradient-info">
      <div class="container my-auto">
          <div class="copyright text-center text-gray-100 font-weight-light my-auto">
              <span>&copy; Tugas Akhir 2 <?= date('Y'); ?></span>
          </div>
      </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
              </div>
          </div>
      </div>
  </div>

  <!-- Delete Modal
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah kamu yakin untuk menghapus penilaian karyawan ini?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Klik tombol "Delete" jika kamu yakin untuk menghapus penilaian karyawan ini.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-danger" href="<?= base_url('kepala_bagian/delete_penilaian'); ?>">Delete</a>

              </div>
          </div>
      </div>
  </div> -->



  <!-- Load file process.js -->
  <script>
      $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass('selected').html(fileName);
      });

      // JQuery solution!
      $('table').on('click', 'input[type="button"]', function(e) {
          $(this).closest('td').remove();
      })
  </script>


  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets'); ?>/js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('assets'); ?>/js/myscript.js"></script>

  </body>

  </html>