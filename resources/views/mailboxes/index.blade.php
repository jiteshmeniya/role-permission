@extends('layouts.appmailbox')
@section('content')
    <div id="cetak" class="card-body">
            <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active ms-2" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Memo Internal</button>
                <button class="nav-link ms-2" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Perlu Diproses</button>
                <button class="nav-link ms-2" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Disposisi</button>
            </div>

            </nav>
    </div>

    <main>

    <div class="container-fluid px-4 mt-2">
        <!-- <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active mt-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Memo Internal</button>
            <button class="nav-link mt-3" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Perlu Diproses</button>
            <button class="nav-link mt-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Disposisi</button>
        </div>
        </nav> -->
        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>2011/04/25</td>
                                <td><a class="memo-item" href="view.html">System Architect</a></td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td><a class="memo-item" href="view.html"></a>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td><a class="memo-item" href="view.html">Junior Technical Author</a></td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td><a class="memo-item" href="view.html">Senior Javascript Developer</a></td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td><a class="memo-item" href="view.html">Accountant</a></td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td><a class="memo-item" href="view.html">Integration Specialist</a></td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td><a class="memo-item" href="view.html">Sales Assistant</a></td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td><a class="memo-item" href="view.html">System Architect</a></td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td><a class="memo-item" href="view.html"></a>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td><a class="memo-item" href="view.html">Junior Technical Author</a></td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td><a class="memo-item" href="view.html">Senior Javascript Developer</a></td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td><a class="memo-item" href="view.html">Accountant</a></td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td><a class="memo-item" href="view.html">Integration Specialist</a></td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td><a class="memo-item" href="view.html">Sales Assistant</a></td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td><a class="memo-item" href="view.html">System Architect</a></td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td><a class="memo-item" href="view.html"></a>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td><a class="memo-item" href="view.html">Junior Technical Author</a></td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td><a class="memo-item" href="view.html">Senior Javascript Developer</a></td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td><a class="memo-item" href="view.html">Accountant</a></td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td><a class="memo-item" href="view.html">Integration Specialist</a></td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td><a class="memo-item" href="view.html">Sales Assistant</a></td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td><a class="memo-item" href="view.html">System Architect</a></td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td><a class="memo-item" href="view.html"></a>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td><a class="memo-item" href="view.html">Junior Technical Author</a></td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td><a class="memo-item" href="view.html">Senior Javascript Developer</a></td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td><a class="memo-item" href="view.html">Accountant</a></td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td><a class="memo-item" href="view.html">Integration Specialist</a></td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td><a class="memo-item" href="view.html">Sales Assistant</a></td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td><a class="memo-item" href="view.html">System Architect</a></td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td><a class="memo-item" href="view.html"></a>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td><a class="memo-item" href="view.html">Junior Technical Author</a></td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td><a class="memo-item" href="view.html">Senior Javascript Developer</a></td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td><a class="memo-item" href="view.html">Accountant</a></td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td><a class="memo-item" href="view.html">Integration Specialist</a></td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td><a class="memo-item" href="view.html">Sales Assistant</a></td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td><a class="memo-item" href="view.html">System Architect</a></td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td><a class="memo-item" href="view.html"></a>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td><a class="memo-item" href="view.html">Junior Technical Author</a></td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td><a class="memo-item" href="view.html">Senior Javascript Developer</a></td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td><a class="memo-item" href="view.html">Accountant</a></td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td><a class="memo-item" href="view.html">Integration Specialist</a></td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td><a class="memo-item" href="view.html">Sales Assistant</a></td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td><a class="memo-item" href="view.html">System Architect</a></td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td><a class="memo-item" href="view.html"></a>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td><a class="memo-item" href="view.html">Junior Technical Author</a></td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td><a class="memo-item" href="view.html">Senior Javascript Developer</a></td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td><a class="memo-item" href="view.html">Accountant</a></td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td><a class="memo-item" href="view.html">Integration Specialist</a></td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td><a class="memo-item" href="view.html">Sales Assistant</a></td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td><a class="memo-item" href="view.html">System Architect</a></td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td><a class="memo-item" href="view.html"></a>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td><a class="memo-item" href="view.html">Junior Technical Author</a></td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td><a class="memo-item" href="view.html">Senior Javascript Developer</a></td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td><a class="memo-item" href="view.html">Accountant</a></td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td><a class="memo-item" href="view.html">Integration Specialist</a></td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td><a class="memo-item" href="view.html">Sales Assistant</a></td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td><a class="memo-item" href="view.html">System Architect</a></td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td><a class="memo-item" href="view.html"></a>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td><a class="memo-item" href="view.html">Junior Technical Author</a></td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td><a class="memo-item" href="view.html">Senior Javascript Developer</a></td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td><a class="memo-item" href="view.html">Accountant</a></td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td><a class="memo-item" href="view.html">Integration Specialist</a></td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td><a class="memo-item" href="view.html">Sales Assistant</a></td>
                                <td>Herrod Chandler</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple1">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Accountant</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Junior Technical Author</td>
                                <td>Ashton Cox</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Senior Javascript Developer</td>
                                <td>Cedric Kelly</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Accountant</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Integration Specialist</td>
                                <td>Brielle Williamson</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Sales Assistant</td>
                                <td>Herrod Chandler</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple2">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pengirim</th>
                                <th>isi Disposisi</th>
                                <th>Perihal</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pengirim</th>
                                <th>isi Disposisi</th>
                                <th>Perihal</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>2011/04/25</td>
                                <td>Tiger Nixon</td>
                                <td>Untuk dilaksanakan</td>
                                <td>System Architect</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>Ashton Cox</td>
                                <td>Untuk dilaksanakan</td>
                                <td>Junior Technical Author</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>Cedric Kelly</td>
                                <td>Untuk dilaksanakan</td>
                                <td>Senior Javascript Developer</td>
                            </tr>
                            <tr>
                                <td>2008/11/28</td>
                                <td>Cedric Kelly</td>
                                <td>Untuk dilaksanakan</td>
                                <td>Accountant</td>
                            </tr>
                            <tr>
                                <td>2012/12/02</td>
                                <td>Brielle Williamson</td>
                                <td>Untuk dilaksanakan</td>
                                <td>Integration Specialist</td>
                            </tr>
                            <tr>
                                <td>2012/08/06</td>
                                <td>Herrod Chandler</td>
                                <td>Untuk dilaksanakan</td>
                                <td>Sales Assistant</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>Tiger Nixon</td>
                                <td>Untuk dilaksanakan</td>
                                <td>System Architect</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

    </div>
    </main>

@endsection
