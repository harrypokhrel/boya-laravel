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
                        <?php //if($loggedin_user_roles[0] == 'administrator'){ ?>
                        <div class="form__wrap">
                            <div class="row">
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
                                        <input type="text" id="commission_percentage" name="commission_percentage" value="10" placeholder="eg. 10.05">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php //} ?>

                        <div class="form__wrap">
                            <label for="activities_name">Activity Name [ENGLISH]</label>
                            <input type="text" id="activities_name" name="title">
                        </div>

                        <div class="form__wrap">
                            <div class="row">
                                <?php //if($loggedin_user_roles[0] == 'administrator'){ ?>
                                <div class="col-md-3">
                                    <label for="show_in_homepage">Show in homepage?</label><br>
                                    <input type="radio" id="hp_yes" name="show_in_homepage" value="1">
                                    <label for="hp_yes">YES</label>
                                    <input type="radio" id="hp_no" name="show_in_homepage" value="0" checked="checked">
                                    <label for="hp_no">NO</label>
                                </div>
                                <?php //} ?>
                                
                                <div class="col-md-3">
                                    <div class="form__wrap">
                                        <label for="age_group">Age Group</label>
                                        <input type="text" id="age_group" name="age_group" placeholder="10-12 years" class='w-100'>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form__wrap">
                                        <label for="duration">Duration [in minutes e.g. 30]</label>
                                        <input type="number" id="duration" name="duration" placeholder="e.g. 30" class='w-100'>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form__wrap">
                                        <label for="price">PRICE</label>
                                        <input type="text" id="price_weekday" name="price_weekday" placeholder="Activity Price For Adults">
                                    </div>
                                </div>
                                <!--<div class="col-md-3">-->
                                    <!--<div class="form__wrap">-->
                                        <!--<label for="price">WEEKEND PRICE [weekends]</label>-->
                                        <input type="hidden" id="price_weekend" name="price_weekend" placeholder="Weekends Price For Adults" value="0">
                                    <!--</div>-->
                                <!--</div>-->
                            </div>
                        </div>

                        <div class="form__wrap ">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <label for="country">COUNTRY</label>
                                    <select id="country" name="country" class="w-100">
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates" selected>United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 col-6" id="emirates_field">
                                    <label for="emirates">EMIRATES</label>
                                    <select id="emirates" name="emirates" class="w-100">
                                        <option value="">-- Select --</option>
                                        <option value="Abu Dhabi">Abu Dhabi</option>
                                        <option value="Ajman">Ajman</option>
                                        <option value="Al Ain">Al Ain</option>
                                        <option value="Dubai" selected>Dubai</option>
                                        <option value="Fujairah">Fujairah</option>
                                        <option value="Sharjah">Sharjah</option>
                                        <option value="Ras Al-Khaimah">Ras Al-Khaimah</option>
                                        <option value="Umm Al-Quwain">Umm Al-Quwain</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 col-6" id="city_field">
                                    <div class="form__wrap">
                                        <label for="city">CITY</label>
                                        <input type="text" id="city" name="city">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form__wrap">
                                    <label for="searchTextField">LOCATION</label>
                                    <input type="text" id="searchTextField" name="location">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form__wrap">
                                    <label for="latitude">LATITUDE</label>
                                    <input type="text" id="latitude" name="latitude">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form__wrap">
                                    <label for="longitude">LONGITUDE</label>
                                    <input type="text" id="longitude" name="longitude">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form__wrap">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form__wrap">
                                        <label for="tickets_per_time_slot">No. of tickets per time slot</label>
                                        <input type="text" id="tickets_per_time_slot" name="tickets_per_time_slot" placeholder="Opening Hour">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form__wrap">
                                        <label for="opening_hour">Opening Hour [24 hours format e.g. 15:00]</label>
                                        <input type="text" id="opening_hour" name="opening_hour" placeholder="Opening Hour">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form__wrap">
                                        <label for="closing_hour">Closing Hour [24 hours format e.g. 15:00]</label>
                                        <input type="text" id="closing_hour" name="closing_hour" placeholder="Closing Hour">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row span__2">
                            <div class="col-md-6">
                                <div class="form__wrap ">
                                    <label for="description">DESCRIPTION [ENGLISH]</label>
                                    <textarea id="description" class="ckeditor" name="description" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form__wrap ">
                                    <label for="description_ar">DESCRIPTION [ARABIC]</label>
                                    <textarea id="description_ar" class="ckeditor" name="description_ar" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row span__2">
                            <div class="col-md-6">
                                <div class="form__wrap ">
                                    <label for="description">HIGHLIGHTS [ENGLISH]</label>
                                    <textarea id="description" class="ckeditor" name="description" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form__wrap ">
                                    <label for="description_ar">HIGHLIGHTS [ARABIC]</label>
                                    <textarea id="description_ar" class="ckeditor" name="description_ar" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row span__2">
                            <div class="col-md-6">
                                <div class="form__wrap ">
                                    <label for="inclusions_en">INCLUSIONS [ENGLISH]</label>
                                    <textarea id="inclusions_en" class="ckeditor" name="inclusions_en" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form__wrap ">
                                    <label for="inclusions_ar">INCLUSIONS [ARABIC]</label>
                                    <textarea id="inclusions_ar" class="ckeditor" name="inclusions_ar" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row span__2">
                            <div class="col-md-6">
                                <div class="form__wrap ">
                                    <label for="cancellation_policy_en">CANCELLATION POLICY [ENGLISH]</label>
                                    <textarea id="cancellation_policy_en" class="ckeditor" name="cancellation_policy_en" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form__wrap ">
                                    <label for="cancellation_policy_ar">CANCELLATION POLICY [ARABIC]</label>
                                    <textarea id="cancellation_policy_ar" class="ckeditor" name="cancellation_policy_ar" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form__wrap d-flex span__2 flex-column flex-sm-row">
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
                            
                            <div class="ammenities__select w-100">
                            <label for="sub_category">SUB CATEGORY</label>
                            <select id="sub_category" name="sub_category[]" class="w-100" multiple>
                                <?php //$terms = get_terms( array( 
                                    //'taxonomy' => 'activity_sub_category',
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
                        
                        <div class="form__wrap not__grid">
                            <label for="featured_image">FEATURED IMAGE</label>
                            <input type="file" id="featured_image" name="featured_image" onchange="preview_image_1();" accept="image/*">
                            <div id="image_preview_1"></div>
                        </div>
                        
                        <div class="form__wrap not__grid">
                            <label for="gallery_images">GALLERY IMAGE</label>
                            <input type="file" id="gallery_images" name="gallery_images[]" onchange="preview_image_2();" accept="image/*" multiple/>
                            <div id="image_preview_2"></div>
                        </div>
                        
                        <input type="hidden" name="approved" value='1'>
                        <input type="hidden" name="rejection_message" value=''>
                        <input type="hidden" id="added_on" name="added_on" value="<?php echo date('Y-m-d');?>">
                        
                        <div class="form__wrap span__2 mt-4">
                            <input type="submit" value="ADD ACTIVITY" name="add_activity_data" class="btn btn__primary mx-auto">
                        </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection