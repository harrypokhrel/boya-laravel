@extends('layouts.backend')

@section('styles')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #000000;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #000000;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    b.shift__title {
        display: inline-block;
        width: 80px;
    }

    .timing_price_ul_li_col div {
        margin-bottom: 10px;
    }
</style>
@endsection

@section('content')
<section class="content-header">
	<h1>Boya Activities</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Activities</a></li>
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
<form method="post" action="{{route('activity.store')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Add an activity</h3>
				</div>
				<div class="box-body">
                    <div class="row">
                        <!-- @role('Admin') -->
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="activities_owner">Assign to company</label>
                                <select id="activities_owner" name="company_id" class="w-100 form-control">
                                        <option value="">-- Select Company --</option>
                                    <?php foreach ($companies as $company){ ?>
                                        <option value="{{ $company->id }}">{{ $company->title }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- @endrole -->

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="activities_name">Activity Name</label>
                                <input type="text" id="activities_name" name="title" class='w-100 form-control'>
                            </div>
                        </div>

                        @role('Admin')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="show_in_homepage">Show in homepage?</label><br>
                                <div class="radio-wrapper">
                                    <label class="radio-container">
                                    <input type="radio" id="hp_yes" name="show_in_homepage" value="1">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">YES</span>
                                    </label>
                                    <label class="radio-container">
                                    <input type="radio" id="hp_no" name="show_in_homepage" value="0" checked="checked">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">NO</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endrole
                                
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="age_group">Age Group</label>
                                <input type="text" id="age_group" name="age_group" placeholder="10-12 years" class='w-100 form-control'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="duration">Duration [in minutes e.g. 30]</label>
                                <input type="number" id="duration" name="duration" placeholder="e.g. 30" class='w-100 form-control'>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="price_weekday">Weekdays Price</label>
                                <input type="text" id="price_weekday" name="price_weekday" placeholder="Price For Weekdays" class='w-100 form-control'>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="price_weekend">Weekends Price</label>
                                <input type="text" id="price_weekend" name="price_weekend" placeholder="Price For Weekends" class='w-100 form-control'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="searchTextField">Location</label>
                                <input type="text" id="searchTextField" name="location" class='w-100 form-control'>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="latitude">Latitude</label>
                                <input type="text" id="latitude" name="latitude" class='w-100 form-control'>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="longitude">Longitude</label>
                                <input type="text" id="longitude" name="longitude" class='w-100 form-control'>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="tickets_per_time_slot">No. of tickets per time slot</label>
                                <input type="text" id="tickets_per_time_slot" name="tickets_per_time_slot" placeholder="Opening Hour" class='w-100 form-control'>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="opening_hour">Opening Hour</label>
                                <input type="text" id="opening_hour" name="opening_hour" placeholder="Opening Hour" class='timepicker w-100 form-control'>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="closing_hour">Closing Hour</label>
                                <input type="text" id="closing_hour" name="closing_hour" placeholder="Closing Hour" class='timepicker w-100 form-control'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap ">
                                <label for="description">Description</label>
                                <textarea id="description" class="ckeditor" name="description" rows="4"></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form__wrap ">
                                <label for="highlights">Highlights</label>
                                <textarea id="highlights" class="ckeditor" name="highlights" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap ">
                                <label for="inclusions">Inclusions</label>
                                <textarea id="inclusions" class="ckeditor" name="inclusions" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="tags__select w-100" id="tags">
                                <label for="tags">TAGS</label>
                                <select id="tags" name="tags" class="w-100 form-control">
                                    <option value="">-- Select Tag --</option>
                                    <?php foreach ($tags as $tag){ ?>
                                        <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="category__select w-100" id="category">
                                <label for="category">CATEGORY</label>
                                <select id="category" name="category" class="w-100 form-control">
                                    <option value="">-- Select Category --</option>
                                    <?php foreach ($categories as $category){ ?>
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="feature_image">FEATURED IMAGE</label>
                            <input type="file" id="feature_image" name="feature_image" onchange="preview_image_1();" accept="image/*">
                            <div id="image_preview_1"></div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="gallery_images">GALLERY IMAGE</label>
                            <input type="file" id="gallery_images" name="gallery_images[]" onchange="preview_image_2();" accept="image/*" multiple/>
                            <div id="image_preview_2"></div>
                        </div>
                        
                        <div class="col-md-12">
                            <h2>Discounts</h2>
                        </div>

                        <div class=" row discount__group col-md-12">
                            <div class="col-md-12">
                                <div class="group_discount__select w-100" id="group_discount">
                                    <label for="group_discount">Group discount available?</label>
                                    <label class="switch">
                                        <input type="checkbox" name="enable_shift_price" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form__wrap">
                                    <input type="radio" id="percentage" name="shift_discount_type" value="percentage" checked="checked">
                                    <label for="percentage">Percentage Discount</label>
                                    <input type="radio" id="fixed" name="shift_discount_type" value="fixed">
                                    <label for="fixed">Fixed Amount</label>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="shift_on_weekends__select w-100" id="shift_on_weekends">
                                    <label for="shift_on_weekends">Discount available for weekends?</label>
                                    <label class="switch">
                                        <input type="checkbox" name="shift_on_weekends" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="w-100" id="group__discount__price">
                                    
                                </div>
                            </div>
                        </div>

                        @role('admin')
                            <input type="hidden" name="approved" value='1'>
                        @else
                            <input type="hidden" name="approved" value='0'>
                        @endrole
                        
                        <input type="hidden" name="rejection_message" value=''>
                        <input type="hidden" id="added_on" name="added_on" value="<?php echo date('Y-m-d H:i:s');?>">
                        
                        <div class="form__wrap span__2 mt-4">
                            <input type="submit" value="ADD ACTIVITY" name="add_activity_data" class="btn btn-primary activityBtn">
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
    
    function initialize() {
      var input = document.getElementById('searchTextField');
      var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            $('#searchTextField').val(place.name);
            $('#latitude').val(place.geometry.location.lat());
            $('#longitude').val(place.geometry.location.lng());
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    function preview_image_1(){
        var total_file = document.getElementById("feature_image").files.length;
        for(var i=0; i<total_file; i++){
            $('#image_preview_1 > img').remove();
            $('#image_preview_1').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
        }
    }

    function preview_image_2(){
        var total_file=document.getElementById("gallery_images").files.length;
        $('#image_preview_2 > img').remove();
        for(var i=0; i<total_file; i++){
            $('#image_preview_2').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
        }
    }

    $('select#activities_owner').change(function(){
        $('#group__discount__price').html('').prepend('<img src="{{asset('images/animated-gif.gif')}}" width="30px">');
        
        var owner_id = $(this).val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        var formData = {
            owner_id: owner_id,
        };

        var type = "PUT";
        var ajaxurl = "{{ route('activity.getShiftTiming', ":id") }}";
        ajaxurl = ajaxurl.replace(':id', owner_id);

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                $('#group__discount__price').html(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $('.timepicker').pickatime({
        format: 'HH:i',
        interval: 30,
        min: [6,0],
        max: [22,0]
    });
</script>
@endpush