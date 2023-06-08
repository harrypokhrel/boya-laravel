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
					<h3 class="box-title">Edit an activity</h3>
				</div>
				<div class="box-body">
                    <div class="row">
                        @role('Admin')
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="activities_owner">Assign to company</label>
                                <select id="activities_owner" name="company_id" class="w-100">
                                <?php foreach ($companies as $company){ ?>
                                    <option value="{{ $company->id }}" {{ $company->id == $detail->company_id ? 'selected="selected"' : '' }}>{{ $company->title }}</option>
                                <?php } ?>
                                </select>
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

                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="price_weekday">Weekdays Price</label>
                                <input type="text" id="price_weekday" name="price_weekday" placeholder="Price For Weekdays" class='w-100' value="{{$detail->price_weekday}}">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form__wrap">
                                <label for="price_weekend">Weekends Price</label>
                                <input type="text" id="price_weekend" name="price_weekend" placeholder="Price For Weekends" class='w-100' value="{{$detail->price_weekend}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="searchTextField">Location</label>
                                <input type="text" id="searchTextField" name="location" class='w-100' value="{{$detail->location}}">
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

                        <div class="col-md-3">
                            <div class="tags__select w-100" id="tags">
                                <label for="tags">TAGS</label>
                                <select id="tags" name="tags[]" class="w-100">
                                    <option value="0">tags</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="category__select w-100" id="tags">
                                <label for="category">CATEGORY</label>
                                <select id="category" name="category[]" class="w-100">
                                    <option value="0">category</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="feature_image">FEATURED IMAGE</label>
                            <input type="file" id="feature_image" name="feature_image" onchange="preview_image_1();" accept="image/*">
                            <div id="image_preview_1">
                                @if($detail->featured_image)
                                    <img src="{{ asset('images/activities/featured/'.$detail->featured_image) }}" alt="image">
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="gallery_images">GALLERY IMAGE</label>
                            <input type="file" id="gallery_images" name="gallery_images[]" onchange="preview_image_2();" accept="image/*" multiple/>
                            <div id="image_preview_2">
                                @if($gallery)
                                @foreach($gallery as $gal)
                                    <img src="{{ asset('images/activities/gallery/'.$gal->image_name) }}" alt="image">
                                @endforeach
                                @endif
                            </div>
                        </div>
                        
                        <input type="hidden" name="approved" value='1'>
                        <input type="hidden" name="rejection_message" value=''>
                        <input type="hidden" id="added_on" name="added_on" value="<?php echo date('Y-m-d H:i:s');?>">
                        
                        <div class="form__wrap span__2 mt-4">
                            <input type="submit" value="UPDATE ACTIVITY" name="update_activity_data" class="btn btn-primary">
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

</script>
@endpush