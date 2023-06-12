@extends('layouts.backend')

@section('styles')
<style>
    ul.reorder_ul.reorder-photos-list img, div#image_preview_2 img {
        width: 160px;
        height: 100px;
    }

    ul.reorder_ul.reorder-photos-list li {
        display: inline-flex;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    ul.reorder_ul.reorder-photos-list {
        margin-left: -40px;
        margin-top: 20px;
    }

    div#image_preview_2 {
        display: inline-flex;
        margin-right: 10px !important;
        margin-bottom: 18px;
    }

    .gallery i.fa.fa-remove.selected_gallery_image {
        font-size: 16px !important;
        line-height: 0.7;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .dashboard__container .gallery .delete_popup {
        position: absolute;
        left: auto;
        right: -7px;
        margin: 0;
        top: -13px;
        background: #ededed;
        padding: 5px 6px;
        line-height: 1;
        border-radius: 50%;
        width: 20px;
        height: 20px;
    }

    p.delete_popup {
        position: absolute;
        background: #ededed;
        padding: 5px 6px;
        margin-top: -100px;
        margin-left: 136px!important;
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
                                
                            </div>
                            <div id="image_preview_3">
                                <a href="javascript:void(0);" class="reorder_link reorder btn btn-danger" id="reorder_link">Reorder Photos</a>
                                <a href="javascript:void(0);" class="reorder_link saveReorder btn btn-success" id="saveReorder">Save Reordering</a>
                                <div id="reorderHelper" class="light_box" style="display:none;">
                                    1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.
                                </div>
                                <div id="reorderHelperWarning" class="light_box notice notice_error" style="display:none;">
                                    Reordering Photos - This could take a moment.<br>Please don't navigate away from this page.
                                </div>
                                <div class="gallery">
                                    <ul class="reorder_ul reorder-photos-list">
                                    @foreach($gallery as $gallery_image)
                                    <li id="image_li_{{$gallery_image->id}}" class="ui-sortable-handle">
                                        <a href="javascript:void(0);" style="float:none;" class="image_link">
                                            <img id="{{$gallery_image->id}}" src="{{ asset('images/activities/gallery/'.$gallery_image->image_name) }}" alt="image">
                                            <p class="delete_popup" data-id="{{$gallery_image->id}}">
                                                <i class="fa fa-remove selected_gallery_image" style="color:red;"></i>
                                            </p>
                                        </a>
                                    </li>
                                    @endforeach
                                    </ul>
                                </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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

    // reorder image codes
    $('a#saveReorder').hide();
    $('div#reorderHelperWarning').hide();
    $('#reorder_link').on('click',function(){
        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('#reorder_link').hide();
        $('#reorderHelper').show();
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#saveReorder").show();
        
        $("#saveReorder").click(function(){
            $('#reorderHelper').hide();
            $('#reorderHelperWarning').show();
            if( !$("#saveReorder i").length ){
                $(this).html('').prepend('<img src="https://geteverywhere.ae/beta/wp-content/uploads/2023/03/animated-gif.gif" width="30px">');
                $("ul.reorder-photos-list").sortable({ 
                    cancel: ".disable-sort" 
                });
                var image_order_ids = [];
                var activity_id = <?php echo $detail->id;?>;
                
                $("ul.reorder-photos-list li").each(function() {
                    image_order_ids.push($(this).attr('id').substr(9));
                });
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });

                var formData = {
                    activity_id: activity_id,
                    image_order_ids: image_order_ids,
                };
                var type = "PUT";
                var ajaxurl = "{{ route('activity.updateImageOrder') }}";
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if (data.success == true) {
                            $('#reorderHelperWarning').hide();
                            $('a#saveReorder').html('Save Reordering');
                            $("ul.reorder-photos-list li a").css({'cursor' :"default"});
                            $("a#saveReorder").hide();
                            $("#reorder_link").show();
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        });
    });

    $('body').on('click', '.delete_popup', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });

                var formData = {
                    imageKoId: $(this).data("id"),
                };
                var imgID = $(this).data("id");
                var type = "DELETE";
                var ajaxurl = "{{ route('activity.deleteImage') }}";

                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if (data.success == true) {
                            $('li#image_li_' + imgID ).remove();
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });
</script>
@endpush