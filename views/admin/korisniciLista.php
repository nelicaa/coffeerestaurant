<div class="ms-panel col-9 m-auto">
            <div class="ms-panel-header">
              <h6>Glavne <?php  echo $_GET['admin'];?></h6>
            </div>
            <div class="ms-panel-body mb-3">
              <div class="table-responsive">
              <div class="body d-flex ">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="mainTable" class="table container-fluid table-hover">
                                        <thead >
                                            <tr>
                                                <th>Id</th>
                                                <th>Ime</th>
                                                <th>Prezime</th>
                                                <th>Email</th>
                                                <th>Adresa</th>

                                                <th>Slika</th>
                                                <th>Uloga</th>
                                                


                                            </tr>
                                        </thead>
                                        <hr/>
                                        <tbody class="users">
                                      
                                    
                                        </tbody>
                                        <tr>
                                            
                                            <td></td>
                                            <td colspan="5" class="input-group"><strong>Add  new user</strong></td>
                                            <td colspan="7"><a  href="index.php?page=Admin%20panel&admin=AddUser" class="m-auto d-flex justify-content-center">INSERT</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              </div>
            </div>
</div>