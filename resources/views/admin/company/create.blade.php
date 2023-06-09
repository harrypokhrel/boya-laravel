@extends('layouts.backend')
@section('content')
<section class="content-header">
	<h1>Boya Company</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Company</a></li>
		<li><a href="">Add</a></li>
	</ol>
</section>
<div class="content">
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
<form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Add a company</h3>
				</div>
				<div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="user_id">Assign to owner</label>
                            <select id="user_id" name="user_id" class="w-100">
                                <?php foreach ($users as $row){ ?>
                                    <option value="{{ $row->id }}">{{ $row->name}}</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="title">Company Name</label>
                            <input type="text" id="title" name="title" value="" placeholder="Enter company name" class="w-100">
                        </div>

                        <div class="col-md-6">
                            <label for="comission_percentage">Comission Percentage %</label>
                            <input type="text" id="comission_percentage" name="comission_percentage" class="w-100">
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" id="contact_number" name="contact_number" class='w-100'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="email">Email Address</label>
                                <input type="text" id="email" name="email" class='w-100'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="website">Website</label>
                                <input type="text" id="website" name="website" class='w-100'>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form__wrap" style="display: grid;">
                                <label for="country">Country</label>
                                <input type="text" id="country" name="country" class='w-100'>
                            </div>
                        </div>
                        
                        <div class="col-md-6" id="emirates_field">
                            <label for="emirates">Emirates</label>
                            <select id="emirates" name="emirates" class="w-100">
                                <option value="">-- Select --</option>
                                <option value="Abu Dhabi">Abu Dhabi</option>
                                <option value="Ajman">Ajman</option>
                                <option value="Al Ain">Al Ain</option>
                                <option value="Dubai">Dubai</option>
                                <option value="Fujairah">Fujairah</option>
                                <option value="Sharjah">Sharjah</option>
                                <option value="Ras Al-Khaimah">Ras Al-Khaimah</option>
                                <option value="Umm Al-Quwain">Umm Al-Quwain</option>
                            </select>
                        </div>

                        <div class="col-md-6" id="city_field">
                            <div class="form__wrap">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" class='w-100'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="shift">Enable shift?</label><br>
                                <input type="radio" id="shift_yes" name="shift" value="1">
                                <label for="shift_yes">YES</label>
                                <input type="radio" id="shift_no" name="shift" value="0" checked="checked">
                                <label for="shift_no">NO</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="shift_timing">Shift Timings</label>
                                <div class="shift_timing_div">
                                	<div class="timing_ul_li_col">
                                    	<input type="text" id="st_1_1" class="shift_timings_list" name="st[1][1]" placeholder="Eg: Morning">
                                    	<input type="text" id="st_1_2" class="shift_timings_list timepicker" name="st[1][2]" placeholder="Select Time">
                                    	<input type="text" id="st_1_3" class="shift_timings_list timepicker" name="st[1][3]" placeholder="Select Time">
                                        <br>
                                        <input type="text" id="st_2_1" class="shift_timings_list" name="st[2][1]" placeholder="Eg: Afternoon">
                                    	<input type="text" id="st_2_2" class="shift_timings_list timepicker" name="st[2][2]" placeholder="Select Time">
                                    	<input type="text" id="st_2_3" class="shift_timings_list timepicker" name="st[2][3]" placeholder="Select Time">

                                    	<div class="add_more_rules_div_villas_btn">
                                	        <button class="add_more_shifts btn btn-primary mb-3" id="st_3">Add More Shifts</button>
                                	    </div>
                                	</div>
                            	</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="cancellation_policy">Cancellation Policy</label>
                                <textarea id="cancellation_policy" class="ckeditor" name="cancellation_policy" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="terms_condition">Terms & Conditions</label>
                                <textarea id="terms_condition" class="ckeditor" name="terms_condition" rows="4"></textarea>
                            </div>
                        </div>

                        <input type="hidden" id="created_at" name="created_at" value="<?php echo date('Y-m-d H:i:s');?>">
                        <input type="hidden" id="updated_at" name="updated_at" value="<?php echo date('Y-m-d H:i:s');?>">

                        <div class="form__wrap span__2 mt-4">
                            <input type="submit" value="ADD COMPANY" name="add_user" class="btn btn-primary">
                        </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection

@push('script')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxskaJh28UgoN83lmnBWqy4MTybaxqrhI&libraries=places"></script>
<script type="text/javascript">
        
    $("#country").countrySelect({
        preferredCountries: ['ae', 'sa'],
        responsiveDropdown: true
    });

    $('#city_field').hide();

    document.getElementById("country").addEventListener("blur", function() {
        if($('#country').val() == 'United Arab Emirates (‫الإمارات العربية المتحدة‬‎)'){
            $('div#emirates_field').show();
            $('#city_field').hide();
        } else {
            $('div#emirates_field').hide();
            $('#city_field').show();
        }
    });

    $('button.add_more_shifts.btn.btn-primary.mb-3').click(function(e){
        e.preventDefault();
        var get_id      =   this.id;
        var array       =   get_id.split("_");
        var lastElement =   array.pop();
        $('<input type="text" id="st_'+lastElement+'_1" class="shift_timings_list" name="st['+lastElement+'][1]" placeholder=""><input type="text" id="st_'+lastElement+'_2" class="shift_timings_list timepicker" name="st['+lastElement+'][2]" placeholder=""><input type="text" id="st_'+lastElement+'_3" class="shift_timings_list timepicker" name="st['+lastElement+'][3]" placeholder=""><br>').insertBefore(this);
        lastElement++;
        $(this).attr('id', 'st_'+lastElement);
        $('.timepicker').pickatime({
            format: 'HH:i',
            interval: 30,
            min: [8,0],
            max: [20,0]
        });
    });

    $('.timepicker').pickatime({
        format: 'HH:i',
        interval: 30,
        min: [8,0],
        max: [20,0]
    });

</script>
@endpush