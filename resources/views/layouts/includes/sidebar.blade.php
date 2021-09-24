        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav mt-2">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="btn btn-primary m-2" href="{{ route('mailboxes.compose') }}">
                                Buat Memo Internal
                            </a>

                            <div class="accordion p-2" id="accordionPanelsStayOpenExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Kotak Masuk
                                  </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                  <ol class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                      <div class="ms-2 me-auto">
                                        Memo Masuk
                                      </div>
                                      <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                      <div class="ms-2 me-auto">
                                        Disposisi Masuk
                                      </div>
                                      <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                  </ol>
                                </div>
                              </div>
                              <br>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Kotak Keluar
                                  </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                  <ol class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                      <div class="ms-2 me-auto">
                                        Perlu Diproses
                                      </div>
                                      <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                      <div class="ms-2 me-auto">
                                        Status Memo
                                      </div>
                                      <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                      <div class="ms-2 me-auto">
                                        Konsep Surat
                                      </div>
                                      <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                      <div class="ms-2 me-auto">
                                        Memo Terkirim
                                      </div>
                                      <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                      <div class="ms-2 me-auto">
                                        Disposisi Terkirim
                                      </div>
                                      <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                      <div class="ms-2 me-auto">
                                        Batal
                                      </div>
                                      <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                  </ol>
                                </div>
                              </div>
                            </div>
                            <a class="btn btn-primary m-2" href="index.html">
                                kembali ke eoffice
                            </a>

                        </div>
                    </div>
                    {{-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>

                    </div> --}}
                </nav>
            </div>
            <div id="layoutSidenav_content">
                    @yield('content')
                <footer class="fixed-bottom py-1 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
