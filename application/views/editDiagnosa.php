<?php
$userId = $userInfo->id;
$gejala = $userInfo->gejala;
$bagian_id = $userInfo->bagian_id;
$poin = $userInfo->poin;
/*$email = $userInfo->email;
$mobile = $userInfo->mobile;
$roleId = $userInfo->roleId;*/
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Diagnosa Management
        <small>Add / Edit Diagnosa</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Diagnosa Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>editDiagnosa" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="bagian">Gejala</label>
                                        <input type="text" class="form-control" id="gejala" placeholder="Gejala" name="gejala" value="<?php echo $gejala; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="bagian">Poin Fuzzy</label>
                                        <input type="text" class="form-control" id="poin" placeholder="Gejala" name="poin" value="<?php echo $poin; ?>" maxlength="128">
                                    </div>
                                    
                                </div>
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Bagian Tanaman</label>
										<select name="bagian_id" id="bagian_id" class="form-control required">
										<?php
										for($i=0;$i<count($bagian);$i++)
										{
											echo "<option value='".$bagian[$i]->id."' ".($bagian_id == $bagian[$i]->id ? " selected='selected' " : '' ).">".$bagian[$i]->bagian."</option>";
										}
										?>
										</select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editBagian.js" type="text/javascript"></script>