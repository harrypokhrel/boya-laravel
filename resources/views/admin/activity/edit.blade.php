@extends('layouts.backend')
@section('content')
<section class="content-header">
	<h1>Boya Activities</h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
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
<form method="post" action="{{route('activity.update', $detail->id)}}" enctype="multipart/form-data">
	{{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Add an activity</h3>
				</div>
				<div class="box-body">
                    <div class="row">
                        @role('Admin')
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="activities_owner">Assign to activity owner</label>
                                <select id="activities_owner" name="vendor_id" class="w-100">
                                    <?php //foreach ($users as $row){
                                            //$user_meta = get_userdata($row->ID);
                                            //$user_roles = $user_meta->roles;
                                            //if($user_roles[0] == 'activitiesowner'){ ?>
                                                <option value="1">test</option>
                                    <?php //} } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="commission_percentage">Commission Percentage (%)</label>
                                <input type="text" class='w-100' id="commission_percentage" name="commission_percentage" value="{{$detail->commission_percentage}}" placeholder="eg. 10.05">
                            </div>
                        </div>
                        @endrole

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="activities_name">Activity Name</label>
                                <input type="text" id="activities_name" name="title" class='w-100' value="{{$detail->title}}">
                            </div>
                        </div>

                        @role('Admin')
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="show_in_homepage">Show in homepage?</label><br>
                                <input type="radio" id="hp_yes" name="show_in_homepage" value="1">
                                <label for="hp_yes">YES</label>
                                <input type="radio" id="hp_no" name="show_in_homepage" value="0" checked="checked">
                                <label for="hp_no">NO</label>
                            </div>
                        </div>
                        @endrole
                                
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="age_group">Age Group</label>
                                <input type="text" id="age_group" name="age_group" placeholder="10-12 years" class='w-100' value="{{$detail->age_group}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="duration">Duration [in minutes e.g. 30]</label>
                                <input type="number" id="duration" name="duration" placeholder="e.g. 30" class='w-100' value="{{$detail->duration}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="price_weekday">Weekdays Price</label>
                                <input type="text" id="price_weekday" name="price_weekday" placeholder="Price For Weekdays" class='w-100' value="{{$detail->price_weekday}}">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="price_weekend">Weekends Price</label>
                                <input type="text" id="price_weekend" name="price_weekend" placeholder="Price For Weekends" class='w-100' value="{{$detail->price_weekend}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap" style="display: grid;">
                                <label for="country">Country</label>
                                <input type="text" id="country" name="country" class='w-100' value="{{$detail->country}}">
                            </div>
                        </div>
                        
                        <div class="col-md-6" id="emirates_field">
                            <label for="emirates">Emirates</label>
                            <select id="emirates" name="city" class="w-100">
                                <option value="">-- Select --</option>
                                <option value="Abu Dhabi" {{ $detail->city == 'Abu Dhabi' ? 'selected="selected"' : '' }}>Abu Dhabi</option>
                                <option value="Ajman" {{ $detail->city == 'Ajman' ? 'selected="selected"' : '' }}>Ajman</option>
                                <option value="Al Ain" {{ $detail->city == 'Al Ain' ? 'selected="selected"' : '' }}>Al Ain</option>
                                <option value="Dubai" {{ $detail->city == 'Dubai' ? 'selected="selected"' : '' }}>Dubai</option>
                                <option value="Fujairah" {{ $detail->city == 'Fujairah' ? 'selected="selected"' : '' }}>Fujairah</option>
                                <option value="Sharjah" {{ $detail->city == 'Sharjah' ? 'selected="selected"' : '' }}>Sharjah</option>
                                <option value="Ras Al-Khaimah" {{ $detail->city == 'Ras Al-Khaimah' ? 'selected="selected"' : '' }}>Ras Al-Khaimah</option>
                                <option value="Umm Al-Quwain" {{ $detail->city == 'Umm Al-Quwain' ? 'selected="selected"' : '' }}>Umm Al-Quwain</option>
                            </select>
                        </div>
                                
                        <div class="col-md-6" id="city_field">
                            <div class="form__wrap">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" class='w-100' value="{{$detail->city}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="searchTextField">Location</label>
                                <input type="text" id="searchTextField" name="location" class='w-100' value="{{$detail->city}}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="latitude">Latitude</label>
                                <input type="text" id="latitude" name="latitude" class='w-100' value="{{$detail->latitude}}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="longitude">Longitude</label>
                                <input type="text" id="longitude" name="longitude" class='w-100' value="{{$detail->longitude}}">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="tickets_per_time_slot">No. of tickets per time slot</label>
                                <input type="text" id="tickets_per_time_slot" name="tickets_per_time_slot" placeholder="Opening Hour" class='w-100' value="{{$detail->tickets_per_time_slot}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="opening_hour">Opening Hour [24 hours format e.g. 15:00]</label>
                                <input type="text" id="opening_hour" name="opening_hour" placeholder="Opening Hour" class='w-100' value="{{$detail->opening_hour}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="closing_hour">Closing Hour [24 hours format e.g. 15:00]</label>
                                <input type="text" id="closing_hour" name="closing_hour" placeholder="Closing Hour" class='w-100' value="{{$detail->closing_hour}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap ">
                                <label for="description">Description</label>
                                <textarea id="description" class="ckeditor" name="description" rows="4">{{$detail->description}}</textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form__wrap ">
                                <label for="highlights">Highlights</label>
                                <textarea id="highlights" class="ckeditor" name="highlights" rows="4">{{$detail->highlights}}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap ">
                                <label for="inclusions">Inclusions</label>
                                <textarea id="inclusions" class="ckeditor" name="inclusions" rows="4">{{$detail->inclusions}}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap ">
                                <label for="cancellation_policy">Cancellation Policy</label>
                                <textarea id="cancellation_policy" class="ckeditor" name="cancel_policy" rows="4">{{$detail->cancel_policy}}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ammenities__select w-100" id="feat_category">
                                <label for="category">CATEGORY</label>
                                <select id="category" name="category[]" class="w-100" multiple>
                                    <?php //$terms = get_terms( array( 
                                            //'taxonomy' => 'activity_category',
                                            //'hide_empty' => false
                                        //) );
                                        //if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                                            //foreach ( $terms as $term ) {
                                                //echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
                                            //}
                                        //} ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="featured_image">FEATURED IMAGE</label>
                            @if($detail->featured_image)
                            <div class="preview-image-div">
                                <img id="preview-image-before-upload" src="{{ $detail->featured_image }}" alt="preview image" style="max-height: 250px;">
                            </div>
                            @endif
                            <input type="file" id="featured_image" name="featured_image" onchange="preview_image_1();" accept="image/*">
                            <div id="image_preview_1"></div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="gallery_images">GALLERY IMAGE</label>
                            <input type="file" id="gallery_images" name="gallery_images[]" onchange="preview_image_2();" accept="image/*" multiple/>
                            <div id="image_preview_2"></div>
                        </div>
                        
                        <input type="hidden" name="approved" value='1'>
                        <input type="hidden" name="rejection_message" value=''>
                        <input type="hidden" id="added_on" name="added_on" value="<?php echo date('Y-m-d H:i:s');?>">
                        
                        <div class="form__wrap span__2 mt-4">
                            <input type="submit" value="UPDATE ACTIVITY" name="update_activity_data" class="btn btn__primary mx-auto">
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
        
    $("#country").countrySelect({
        preferredCountries: ['ae', 'sa'],
        responsiveDropdown: true
    });

    $('#city_field').hide();

    // $('#country').on('input',function(e){
    document.getElementById("country").addEventListener("blur", function() {
        if($('#country').val() == 'United Arab Emirates (‫الإمارات العربية المتحدة‬‎)'){
            $('div#emirates_field').show();
            $('#city_field').hide();
        } else {
            $('div#emirates_field').hide();
            $('#city_field').show();
        }
    });
        
</script>
@endpush