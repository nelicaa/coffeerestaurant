<div class="ms-panel col-9 m-auto">
            <div class="ms-panel-header">
              <h6>Glavni <?php  echo $_GET['admin'];?></h6>
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
                                                <th>Naziv</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <hr/>
                                        <tbody class="glMeni">
                                      
                                    
                                        </tbody>
                                        <tr>
                                            
                                            <td></td>
                                            <td class="input-group">
                  <input type="text" class="form-control textInsertAdmin" placeholder="Meni Name"></td>
                                            <td colspan="3"><a  data-tabela="meni" class="m-auto d-flex justify-content-center insertAdminKat" href="">INSERT</a></td>
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

           
            <div class="ms-panel-body">
            <div class="ms-panel-header mt-3">
              <h6>Stranice <?php  echo $_GET['admin'];?>ja</h6>
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
                                                <th>Glavna kategorija</th>
                                                <!-- <th>Update</th> -->
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        
                                        <hr/>
                                        <tbody class="podMeni">

                                       
                                    
                                        </tbody>
                                        <tr>
                                            
                                            <td></td>
                                            <td class="input-group">
                                            <input type="text" class="form-control textInsertAdminPodKat"  id="insertJeloName" placeholder="Meni Name"></td>
                                            <td colspan="2" class=""><select  id="podKatAdmin" class="form-control">
                                            </select></td>
                                            <td ><a data-tabela="meni" id="podMeni" class="m-auto d-flex justify-content-center" href="">INSERT</a></td>
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

        </div>

      </div>
    </div>

