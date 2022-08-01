<div class="ms-panel col-9 m-auto">
            <div class="ms-panel-header">
              <h6>Glavne <?php  echo $_GET['admin'];?></h6>
            </div>
            <div class="ms-panel-body mb-3">
            <div class="d-flex col-6 m-auto flex-row align-items-center">
                <form class="d-flex col-12 m-auto flex-row align-items-center" action="models/adminPanel/downloadExcel.php" method="POST">
<p class="col-9">Download to excel:</p>
<button type="submit" class="form-control mb-3 badge" name="dugme" value="dugme" type="submit">Download</button>
</form>
</div>
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
                                                <th>Naziv</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <hr/>
                                        <tbody class="prikaziUloge">
                                      
                                    
                                        </tbody>
                                        <tr>
                                            
                                            <td></td>
                                            <td class="input-group">
                  <input type="text" class="form-control textInsertAdmin" placeholder="Roll Name"></td>
                                            <td colspan="3"><a  data-tabela="uloge" class="m-auto d-flex justify-content-center insertAdminKat" href="">INSERT</a></td>
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