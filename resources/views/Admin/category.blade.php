<title>Category Page</title>
@extends('Admin.blank_page')

    @section('admincontent')
<div class=" row mt-3 pt-2 pb-2 bg-white" id="emplodiv">
    <div class="col-sm-9 text-center align-self-center"><h6>Category</h6></div>
    <div class="col-sm-3 d-flex justify-content-md-end"> 
        <button class="btn btn-outline-primary" id="empcnclbtn" type="button" class="" data-bs-toggle="collapse" data-bs-target="#emps" aria-expanded="false" aria-controls="collapseExample"><i class="icon-outline fa-solid fa-share fa-flip-horizontal mx-1"></i><b>Cancel</b></button> 
    </div>

    <div class="collapse" id="emps">
        <form id="empform" class="needs-validation" novalidate method="post" enctype="multipart/form-data">

            <div class="row  ">
                <div class="col-sm-6 mt-3 form-floating">
                    <input type="text" name="cat_name" id="cat_name" placeholder="Category Name" class="form-control">
                    <label for="cat_name" class=" ms-2">Brand Name</label>
                </div>


                <div class="col-sm-6 mt-3 form-floating">
                    <textarea class="form-control" id="empabt" name="empabt" placeholder="Enter details"></textarea>
                    <label for="empabt" class=" ms-2">About Person</label>
                </div>
            </div>

<div class="row">
    
    <div class="col-sm-6 mt-3 form-floating">
        <select id="parent" name="parent" class="form-control form-select" required> 

        </select>
        <label for="parent"  class=" text-dark ms-2">Department</label>
    </div>
    <div class="col-sm-6 mt-3 form-floating">
        <select id="subcat" name="subcat" class="form-select" required>  

        </select>
        <label for="subcat" class=" ms-2">Designation</label>
    </div>


        
</div>

<div class="row mb-3">
   
<div class="col-sm-4 mt-3 d-flex align-items-center"> 
    <legend style="width: 30%;">Status</legend>
    <div class="form-check form-check-inline">
        <input class="form-check-input m-0" type="radio" name="rdbtn" id="rdbtn1" value="1" checked>
        <label class="form-check-label" for="rdbtn1">Active</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input m-0" type="radio" name="rdbtn" id="rdbtn2" value="2">
        <label class="form-check-label" for="rdbtn2">Inactive</label>
    </div>
</div>

        <div class="col-sm-4 mt-3 ">
            <label for="fileimgs">Image</label>
            <input type="file" name="fileimgs" id="fileimgs" placeholder="Choose Image" class="form-control">
            <input type="hidden" name="imgupdate" id="imgupdate">
        </div>
        <div class="col-sm-4 mt-3 ">
                <img src="#" id="imgpre" name="imgpre"  class="img-thumbnail" alt="pic">
                <input type="hidden" name="imgupdate" id="imgupdate">
        </div>
</div>


            <div class="row mt-3">
                <div class="col-sm-4">
                    <input type="hidden" name="catid" id="catid" value="">
                    <input type="hidden" name="action" id="action" value="cainsert">
                </div> 
                <div class="col-sm-4"> 
                    <button type="submit" id="emplosub" class="btn col-sm-6 btn-outline-primary btn-style-pill cust-btns rounded-pill">Submit</button>
                
                </div> 
                <div class="col-sm-4"></div>
                
            </div>
        </form>

</div>

</div>
<div class="row mt-2 pt-2 pb-2 bg-white">
        <table id="tabemp" class="table table-striped table-hover nowrap" width="100%">
            <thead>
                <tr>
                <th>Action</th> 
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Joining Date</th>
                <th>Image</th>
                <th>Status</th>
                



                </tr>
            </thead>

        </table>
    </div>

    @endsection