@extends('layouts.admin')


@section('title', 'Dashboard')

@section('content')
    <div class="row">
       <div class="col-lg-12">
          <div class="card">
             <div class="card-body p-0">
                <div class="mm-edit-list usr-edit">
                   <ul class="mm-edit-profile d-flex nav nav-pills">
                      <li class="col-md-6 p-0">
                         <a class="nav-link active" data-toggle="pill" href="#personal-information">
                           Informasi pribadi
                         </a>
                      </li>
                      <li class="col-md-6 p-0">
                         <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                         Ubah Password
                         </a>
                      </li>
                      
                   </ul>
                </div>
             </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="mm-edit-list-data">
             <div class="tab-content">


               {{-- Personal Infromation --}}
                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                   <div class="card">
                      <div class="card-header d-flex justify-content-between">
                         <div class="header-title">
                            <h4 class="card-title">Informasi pribadi</h4>
                         </div>
                      </div>
                      <div class="card-body">
                         <form>
                           @method('patch')
                           @csrf
                           
                            <div class="form-group row align-items-center">
                               <div class="col-md-12">
                                  <div class="profile-img-edit">
                                     <div class="crm-profile-img-edit">
                                        <img class="crm-profile-pic rounded-circle avatar-100" src="../assets/images/user/1.jpg" alt="profile-pic">
                                        <div class="crm-p-image bg-primary">
                                           <i class="las la-pen upload-button"></i>
                                           <input class="file-upload" type="file" accept="image/*">
                                        </div>
                                     </div>                                          
                                  </div>
                               </div>
                            </div>
                            <div class=" row align-items-center">
                               <div class="form-group col-sm-12">
                                  <label for="fname">Nama Lengkap:</label>
                                  <input type="text" class="form-control" id="fname" value="Barry">
                               </div>
                               
                               <div class="form-group col-sm-6">
                                  <label class="d-block">Gender:</label>
                                  <div class="custom-control custom-radio custom-control-inline">
                                     <input type="radio" id="customRadio6" name="customRadio1" class="custom-control-input" checked="">
                                     <label class="custom-control-label" for="customRadio6"> Male </label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                     <input type="radio" id="customRadio7" name="customRadio1" class="custom-control-input">
                                     <label class="custom-control-label" for="customRadio7"> Female </label>
                                  </div>
                               </div>
                               <div class="form-group col-sm-6">
                                  <label for="dob">Date Of Birth:</label>
                                  <input  class="form-control" id="dob" value="1984-01-24">
                               </div>
                               <div class="form-group col-sm-6">
                                  <label>Marital Status:</label>
                                  <select class="form-control" id="exampleFormControlSelect1">
                                     <option selected="">Single</option>
                                     <option>Married</option>
                                     <option>Widowed</option>
                                     <option>Divorced</option>
                                     <option>Separated </option>
                                  </select>
                               </div>
                               <div class="form-group col-sm-6">
                                  <label>Age:</label>
                                  <select class="form-control" id="exampleFormControlSelect2">
                                     <option>12-18</option>
                                     <option>19-32</option>
                                     <option selected="">33-45</option>
                                     <option>46-62</option>
                                     <option>63 > </option>
                                  </select>
                               </div>
                               <div class="form-group col-sm-6">
                                  <label>Country:</label>
                                  <select class="form-control" id="exampleFormControlSelect3">
                                     <option>Caneda</option>
                                     <option>Noida</option>
                                     <option selected="">USA</option>
                                     <option>India</option>
                                     <option>Africa</option>
                                  </select>
                               </div>
                               <div class="form-group col-sm-6">
                                  <label>State:</label>
                                  <select class="form-control" id="exampleFormControlSelect4">
                                     <option>California</option>
                                     <option>Florida</option>
                                     <option selected="">Georgia</option>
                                     <option>Connecticut</option>
                                     <option>Louisiana</option>
                                  </select>
                               </div>
                               <div class="form-group col-sm-12">
                                  <label>Address:</label>
                                  <textarea class="form-control" name="address" rows="5" style="line-height: 22px;"></textarea>
                               </div>
                            </div>
                            <button type="reset" class="btn btn-outline-primary mr-2">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                      </div>
                   </div>
                </div>




                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                   <div class="card">
                      <div class="card-header d-flex justify-content-between">
                         <div class="header-title">
                            <h4 class="card-title">Change Password</h4>
                         </div>
                      </div>
                      <div class="card-body">
                         <form>
                            <div class="form-group">
                               <label for="cpass">Current Password:</label>
                               <a href="javascripe:void();" class="float-right">Forgot Password</a>
                               <input type="Password" class="form-control" id="cpass" value="">
                            </div>
                            <div class="form-group">
                               <label for="npass">New Password:</label>
                               <input type="Password" class="form-control" id="npass" value="">
                            </div>
                            <div class="form-group">
                               <label for="vpass">Verify Password:</label>
                               <input type="Password" class="form-control" id="vpass" value="">
                            </div>
                            <button type="reset" class="btn btn-outline-primary mr-2">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                      </div>
                   </div>
                </div>
                
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
