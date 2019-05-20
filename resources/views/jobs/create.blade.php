@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-tokenfield.min.css">
    <style type="text/css">
        .ui-autocomplete { 
       height: 150px;
       overflow-y: scroll;
       overflow-x: hidden;
     }
    </style>


@endsection
@section('content')

  <div class="container m-t-65 recrutier">
            <div class="row">


                <div class="col-xs-12">
                    <div class="sub sub-l sub-xs-t">

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                            
                                <h3 style="margin-bottom: 25px; text-align: center;">Create new Job</h3>
                                 @include('layouts.messages')

                                <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                    
                                
                                <div class="form-group">
                                    <label for="name">Job Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Job Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Job Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Job Title" required>
                                </div>

                               
                                  <div class="form-group">
                                    <label for="description">Job Description</label>
                                    <textarea class="form-control" type="textarea" id="description" placeholder="Job Description ... "  name="description" rows="5"></textarea>
                                    <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                                </div> 
                                <div class="form-group">
                                    <label for="requirements">Job requirements</label>
                                    <textarea class="form-control" type="textarea" id="requirements" placeholder="Job requirements ... "  name="requirements" rows="5"></textarea>
                                    <span class="help-block">                  
                                </div>

                                <div class="form-group">
                                    <label for="job_type">Job Type</label>
                                    <select class="form-control" id="job_type" name="job_type" required>
                                        <option disabled selected>Pleae Select Your Job Type </option>
                                        <option value="Full-Time">Full Time</option>
                                        <option value="Part-Time">Part Time</option>
                                        <option value="Freelance">Freelance</option>
                                        <option value="Internship">Internship</option>

                                    </select>
                                </div>

                                  <div class="form-group">
                                    <label for="experience">Years Of Experiance Needed</label>
                                    <input type="Number" class="form-control" id="experience" name="experience" value= "{{ old('experience') }}" placeholder="Number Of Experiance Years" required>
                                </div>


                                <div class="form-group">
                                    <label for="location">Job Location</label>
                                    <select class="form-control" id="location" name="location" required></select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Job Address</label>
                                    <input type="text" class="form-control" id="address" value= "{{ old('address') }}" name="address" placeholder="Job Address" required>
                                </div>

                                     <div class="form-group">
                                    <label for="career_level">Career Level</label>
                                    <select class="form-control" id="career_level" name="career_level" required>
                                        <option disabled selected>Pleae Select Career Level</option>
                                        <option value="Student">Student</option>
                                        <option value="Entry-Level">Entry Level</option>
                                        <option value="Junior">Junior</option>
                                        <option value="Experienced">Experienced</option>
                                        <option value="Senior">Senior</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="education">Education Level</label>
                                    <input type="text" class="form-control" id="education" value= "{{ old('education') }}" name="education" placeholder="Education Level" required>
                                </div>

                                <div class="form-group">
                                    <label for="skills">Job Skills</label>
                                    <input type="text" class="form-control" id="skills" placeholder="Type Job Skill and hit enter" name="skills"  value= "{{ old('skills') }}"  />

                                </div>

                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" list="companynames" name="company_name" placeholder="Company Name" required>
                                    <datalist id="companynames" >

                                        @foreach(App\Company::all() as $company)
                                      <option value="{{ $company->name }}" >
                                        @endforeach
                                      
                                    </datalist>
                                </div>

                                <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="text" class="form-control" id="salary" name="salary" placeholder="Salary" required>
                                </div>

                                <div class="form-group">
                                    <label for="keywords">Job Keywords</label>
                                    <input type="text" class="form-control" id="keywords" placeholder="Type keyword and hit enter" name="keywords"  value= "{{ old('keywords') }}"  />

                                </div>

                               <button type="submit" id="submit" class="btn btn-primary pull-right">Create</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
@endsection
@section('script')
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-tokenfield.min.js"></script>
    <script type="text/javascript">
       $('#skills').tokenfield({
              autocomplete: {
                source: ['WordPress','Microsoft','Office','Adobe','Photoshop','Adobe Photoshop','Adobe Illustrator','Adobe Indesign','Interface Design','Information Technology (IT)','Graphic Design','Web Design','HTML','CSS','jQuery','Bootstrap Framework','Testing','Animation','Human Resources (HR)','Recruitment','Interviews','Employee Relations','Employment Law','IT/Software Development','Marketing/PR/Advertising','Project/Program Management','Startup','magento','HTML5','CSS3','PostgreSQL','GitPlus','Angular','TypeScript','React','Computer Science','Software Engineering','Python','Web Development','Software Development','Linux','Diango','REST','Shell Scripting','Software Technologies','API'],
                 delay: 100
               
              },
              showAutocompleteOnFocus: true
            });
       $('#keywords').tokenfield();
       
    </script>
@endsection     