<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="dreambuzz">

  <title>Shopping Checkout | Coursehike</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.css">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="assets/vendors/awesome/css/fontawesome-all.min.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/woocomerce.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link rel="stylesheet" href="assets/vendors/country-code/intltelInput.min.css">
  <style type="text/css">
  .iti{
    width: 100%;
  }
  </style>
</head>

<body id="top-header">
     <!--====== Header start ======-->
    <header class="header-style-2"> 
      <div class="header-navbar navbar-sticky">
        <div class="container-xxl">
          <div class="d-flex align-items-center justify-content-between">
            <div class="site-logo">
              <a href="#">
                <img src="assets/images/logos/logo.png" alt="" class="img-fluid chike-logo-black" />
              </a>
            </div>
            <div class="header-category-menu d-none d-xl-block">
              <ul class="primary-menu">
                <li class="has-submenu">
                  <a href="#"><i class="fa fa-th me-2"></i>Categories</a>
                  <ul class="submenu">
                      <li>
                        <a href="#">Design</a>
                        <ul class="submenu">
                            <li><a href="#">Design Tools</a></li>
                            <li><a href="#">Photoshop mastering</a></li>
                            <li><a href="#">Adobe Xd Deisgn</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Developemnt</a></li>
                      <li><a href="#">Marketing</a></li>
                      <li><a href="#">Freelancing</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="header-search-bar ms-4">
              <form action="#">
                <input type="text" class="form-control rounded-pill border" placeholder="Search for Course" >
                <a href="#" class="search-submit"><i class="far fa-search"></i></a>
              </form>
            </div>
            <div class="offcanvas-icon d-block d-lg-none">
              <a href="#" class="nav-toggler"><i class="fal fa-bars"></i></a> 
            </div>
            <nav class="site-navbar ms-auto chike-mobile-menu-site-navbar">
              <ul class="primary-menu">
                <li>
                  <a href="#"><i class="fa fa-arrow-right mr-2"></i> Become Instructor</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-arrow-right mr-2"></i> Refer and Earn</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-arrow-right mr-2"></i> About us</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-arrow-right mr-2"></i> Contact us</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-arrow-right mr-2"></i> Services</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-arrow-right mr-2"></i> Support</a>
                </li>
              </ul>
              <a href="#" class="nav-close"><i class="fal fa-times"></i></a>
            </nav>
            <nav class="chike-top-header-navbar-desktop ms-auto">
              <ul class="primary-menu">
                <li class="position-relative">
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger chike-top-menu-notifications-btn">9</span>
                  <a href="javascript:;" class="chike-top-menu-notifications-btn"><i class="fa fa-bell"></i></a>
                  <div class="chike-top-menu-notifications">
                    <h4 class="chike-menu-notifications-title">Notification</h4>
                    <p class="chike-menu-notifications-title-sub chike-hide">No Notifications.</p>
                    <div class="" id="chike-menu-notifications-both-box">
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-student-tab" data-bs-toggle="pill" data-bs-target="#pills-student" type="button" role="tab" aria-controls="pills-student" aria-selected="true">Student</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-mentor-tab" data-bs-toggle="pill" data-bs-target="#pills-mentor" type="button" role="tab" aria-controls="pills-mentor" aria-selected="false">Mentor</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <!-- Student -->
                        <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab">
                          <p class="chike-menu-notifications-title-sub">No Notifications.</p>
                        </div>
                        <!-- /Student -->
                        <!-- Mentor -->
                        <div class="tab-pane fade" id="pills-mentor" role="tabpanel" aria-labelledby="pills-mentor-tab">
                          <p class="chike-menu-notifications-title-sub">No Notifications.</p>
                        </div>
                        <!-- /Mentor -->
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>
              </ul>
            </nav>
            <div class="header-btn chike-user-profile-box">
              <div class="course-authorx position-relative">
                <a href="#" class="login" id="chike-my-courses-top-menu-btn">My Courses</a>
                <div class="chike-my-courses-top-menu">
                    <div class="card mb-3" style="max-width: 400px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="assets/images/course/key-points.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                            <div class="progress" style="height: 10px;">
                              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3" style="max-width: 400px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="assets/images/course/key-points.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                            <div class="progress" style="height: 10px;">
                              <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3" style="max-width: 400px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="assets/images/course/key-points.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                            <div class="progress" style="height: 10px;">
                              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3" style="max-width: 400px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="assets/images/course/key-points.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                            <div class="progress" style="height: 10px;">
                              <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer bg-transparent border-success text-center"><a href="#">Show More</a></div>
                </div>
                <button class="chike-user-profile" id="chike-user-profile-menu-btn">A</button>
                <div class="chike-my-profile-top-menu">
                  <div class="client-info d-flex align-items-center">
                    <div class="client-img">
                      <img src="assets/images/users-profile/default-img.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="testimonial-author">
                      <h4 class="chike-user-profile-menu-name">Ajinkya D</h4>
                      <span class="chike-user-profile-menu-email">ajinkyadabholkar22@gmail.com</span>
                    </div>
                  </div>
                  <div class="list-group list-group-flush">
                      <a href="#" class="list-group-item">My Learning</a>
                      <a href="#" class="list-group-item">Teach on CourseHike</a>
                      <a href="#" class="list-group-item">Messages</a>
                      <a href="#" class="list-group-item">My Profile</a>
                      <a href="#" class="list-group-item">Language</a>
                      <a href="#" class="list-group-item">Help</a>
                      <a href="#" class="list-group-item">Log Out</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--====== Header End ======-->

    <!-- checkout start -->
    <main class="site-main woocommerce single single-product page-wrapper">
        <!--shop category start-->
        <section class="space-3">
            <div class="container">
                <div class="row">
                    <section id="primary" class="content-area col-lg-12">
                            <article id="post-8" class="post-8 page type-page status-publish hentry">
                                <div class="entry-content">
                                    
                                      <div class="woocommerce-notices-wrapper"></div>
                                      <form name="checkout" method="post" class="checkout woocommerce-checkout row" action="#" enctype="multipart/form-data" novalidate="novalidate">
                                          <div class="col-lg-7 col-xl-7">
                                              <div class="col2-set" id="customer_details">
                                                  <div class="col-12">
                                                      <div class="woocommerce-billing-fields">
                                                          <h3>Billing details</h3>
                                                          <hr>
                                                          <div class="woocommerce-billing-fields__field-wrapper">
                                                              <p class="form-row form-row-first form-group validate-required"
                                                                 id="billing_first_name_field" data-priority="10">
                                                                  <label for="billing_first_name" class="control-label">First name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                                  <span class="woocommerce-input-wrapper">
                                                                  <input type="text" class="input-text form-control input-lg" name="billing_first_name" id="billing_first_name" placeholder="" value="John" autocomplete="given-name">
                                                              </span>
                                                              </p>
                                                              <p class="form-row form-row-last form-group validate-required"
                                                                 id="billing_last_name_field" data-priority="20">
                                                                  <label for="billing_last_name" class="control-label">
                                                                      Last name&nbsp;<abbr class="required" title="required">*</abbr>
                                                                  </label>
                                                                  <span class="woocommerce-input-wrapper">
                                                                  <input type="text" class="input-text form-control input-lg" name="billing_last_name"  id="billing_last_name" placeholder="" value="Doe"  autocomplete="family-name">
                                                              </span>
                                                              </p>
                                                              <p class="form-row form-row-wide form-group" id="billing_company_field" data-priority="30">
                                                                  <label for="billing_company" class="control-label">Company name&nbsp;<span class="optional">(optional)</span></label>
                                                                  <span class="woocommerce-input-wrapper">
                                                                  <input type="text" class="input-text form-control input-lg" name="billing_company" id="billing_company" placeholder="" value=""  autocomplete="organization">
                                                              </span>
                                                              </p>
                                                              <p class="form-row form-row-wide address-field update_totals_on_change form-group single-country validate-required" id="billing_country_field" data-priority="40">
                                                                  <label
                                                                          for="billing_country" class="control-label">Country&nbsp;<abbr
                                                                          class="required"
                                                                          title="required">*</abbr></label><span
                                                                      class="woocommerce-input-wrapper">
                                                              <select
                                                                      name="billing_country" id="billing_country"
                                                                      class="country_to_state country_select select2-hidden-accessible form-control"
                                                                      autocomplete="country" tabindex="-1"
                                                                      aria-hidden="true"><option value="">Select a country…</option><option
                                                                      value="AX">Åland Islands</option><option value="AF">Afghanistan</option><option
                                                                      value="AL">Albania</option><option value="DZ">Algeria</option><option
                                                                      value="AS">American Samoa</option><option
                                                                      value="AD">Andorra</option><option
                                                                      value="AO">Angola</option><option value="AI">Anguilla</option><option
                                                                      value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option
                                                                      value="AR">Argentina</option><option value="AM">Armenia</option><option
                                                                      value="AW">Aruba</option><option value="AU">Australia</option><option
                                                                      value="AT">Austria</option><option value="AZ">Azerbaijan</option><option
                                                                      value="BS">Bahamas</option><option value="BH">Bahrain</option><option
                                                                      value="BD">Bangladesh</option><option
                                                                      value="BB">Barbados</option><option value="BY">Belarus</option><option
                                                                      value="PW">Belau</option><option
                                                                      value="BE">Belgium</option><option
                                                                      value="BZ">Belize</option><option
                                                                      value="BJ">Benin</option><option
                                                                      value="BM">Bermuda</option><option
                                                                      value="BT">Bhutan</option><option
                                                                      value="BO">Bolivia</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option
                                                                      value="BA">Bosnia and Herzegovina</option><option
                                                                      value="BW">Botswana</option><option value="BV">Bouvet Island</option><option
                                                                      value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option
                                                                      value="BN">Brunei</option><option value="BG">Bulgaria</option><option
                                                                      value="BF">Burkina Faso</option><option value="BI">Burundi</option><option
                                                                      value="KH">Cambodia</option><option value="CM">Cameroon</option><option
                                                                      value="CA">Canada</option><option value="CV">Cape Verde</option><option
                                                                      value="KY">Cayman Islands</option><option
                                                                      value="CF">Central African Republic</option><option
                                                                      value="TD">Chad</option><option
                                                                      value="CL">Chile</option><option
                                                                      value="CN">China</option><option value="CX">Christmas Island</option><option
                                                                      value="CC">Cocos (Keeling) Islands</option><option
                                                                      value="CO">Colombia</option><option value="KM">Comoros</option><option
                                                                      value="CG">Congo (Brazzaville)</option><option
                                                                      value="CD">Congo (Kinshasa)</option><option
                                                                      value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option
                                                                      value="HR">Croatia</option><option
                                                                      value="CU">Cuba</option><option
                                                                      value="CW">Curaçao</option><option
                                                                      value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option
                                                                      value="DK">Denmark</option><option value="DJ">Djibouti</option><option
                                                                      value="DM">Dominica</option><option value="DO">Dominican Republic</option><option
                                                                      value="EC">Ecuador</option><option
                                                                      value="EG">Egypt</option><option value="SV">El Salvador</option><option
                                                                      value="GQ">Equatorial Guinea</option><option
                                                                      value="ER">Eritrea</option><option value="EE">Estonia</option><option
                                                                      value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option
                                                                      value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option
                                                                      value="FI">Finland</option><option
                                                                      value="FR">France</option><option value="GF">French Guiana</option><option
                                                                      value="PF">French Polynesia</option><option
                                                                      value="TF">French Southern Territories</option><option
                                                                      value="GA">Gabon</option><option
                                                                      value="GM">Gambia</option><option
                                                                      value="GE">Georgia</option><option value="DE">Germany</option><option
                                                                      value="GH">Ghana</option><option value="GI">Gibraltar</option><option
                                                                      value="GR">Greece</option><option value="GL">Greenland</option><option
                                                                      value="GD">Grenada</option><option value="GP">Guadeloupe</option><option
                                                                      value="GU">Guam</option><option
                                                                      value="GT">Guatemala</option><option value="GG">Guernsey</option><option
                                                                      value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option
                                                                      value="GY">Guyana</option><option
                                                                      value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option
                                                                      value="HN">Honduras</option><option value="HK">Hong Kong</option><option
                                                                      value="HU">Hungary</option><option value="IS">Iceland</option><option
                                                                      value="IN">India</option><option value="ID">Indonesia</option><option
                                                                      value="IR">Iran</option><option
                                                                      value="IQ">Iraq</option><option
                                                                      value="IE">Ireland</option><option value="IM">Isle of Man</option><option
                                                                      value="IL">Israel</option><option
                                                                      value="IT">Italy</option><option value="CI">Ivory Coast</option><option
                                                                      value="JM">Jamaica</option><option
                                                                      value="JP">Japan</option><option
                                                                      value="JE">Jersey</option><option
                                                                      value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option
                                                                      value="KE">Kenya</option><option
                                                                      value="KI">Kiribati</option><option value="KW">Kuwait</option><option
                                                                      value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option
                                                                      value="LV">Latvia</option><option
                                                                      value="LB">Lebanon</option><option value="LS">Lesotho</option><option
                                                                      value="LR">Liberia</option><option
                                                                      value="LY">Libya</option><option value="LI">Liechtenstein</option><option
                                                                      value="LT">Lithuania</option><option value="LU">Luxembourg</option><option
                                                                      value="MO">Macao S.A.R., China</option><option
                                                                      value="MG">Madagascar</option><option value="MW">Malawi</option><option
                                                                      value="MY">Malaysia</option><option value="MV">Maldives</option><option
                                                                      value="ML">Mali</option><option
                                                                      value="MT">Malta</option><option value="MH">Marshall Islands</option><option
                                                                      value="MQ">Martinique</option><option value="MR">Mauritania</option><option
                                                                      value="MU">Mauritius</option><option value="YT">Mayotte</option><option
                                                                      value="MX">Mexico</option><option value="FM">Micronesia</option><option
                                                                      value="MD">Moldova</option><option
                                                                      value="MC">Monaco</option><option value="MN">Mongolia</option><option
                                                                      value="ME">Montenegro</option><option value="MS">Montserrat</option><option
                                                                      value="MA">Morocco</option><option value="MZ">Mozambique</option><option
                                                                      value="MM">Myanmar</option><option value="NA">Namibia</option><option
                                                                      value="NR">Nauru</option><option
                                                                      value="NP">Nepal</option><option value="NL">Netherlands</option><option
                                                                      value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option
                                                                      value="NI">Nicaragua</option><option value="NE">Niger</option><option
                                                                      value="NG">Nigeria</option><option
                                                                      value="NU">Niue</option><option value="NF">Norfolk Island</option><option
                                                                      value="KP">North Korea</option><option value="MK">North Macedonia</option><option
                                                                      value="MP">Northern Mariana Islands</option><option
                                                                      value="NO">Norway</option><option
                                                                      value="OM">Oman</option><option
                                                                      value="PK">Pakistan</option><option value="PS">Palestinian Territory</option><option
                                                                      value="PA">Panama</option><option value="PG">Papua New Guinea</option><option
                                                                      value="PY">Paraguay</option><option
                                                                      value="PE">Peru</option><option value="PH">Philippines</option><option
                                                                      value="PN">Pitcairn</option><option value="PL">Poland</option><option
                                                                      value="PT">Portugal</option><option value="PR">Puerto Rico</option><option
                                                                      value="QA">Qatar</option><option
                                                                      value="RE">Reunion</option><option value="RO">Romania</option><option
                                                                      value="RU">Russia</option><option
                                                                      value="RW">Rwanda</option><option value="ST">São Tomé and Príncipe</option><option
                                                                      value="BL">Saint Barthélemy</option><option
                                                                      value="SH">Saint Helena</option><option value="KN">Saint Kitts and Nevis</option><option
                                                                      value="LC">Saint Lucia</option><option value="SX">Saint Martin (Dutch part)</option><option
                                                                      value="MF">Saint Martin (French part)</option><option
                                                                      value="PM">Saint Pierre and Miquelon</option><option
                                                                      value="VC">Saint Vincent and the Grenadines</option><option
                                                                      value="WS">Samoa</option><option value="SM">San Marino</option><option
                                                                      value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option
                                                                      value="RS">Serbia</option><option value="SC">Seychelles</option><option
                                                                      value="SL">Sierra Leone</option><option value="SG">Singapore</option><option
                                                                      value="SK">Slovakia</option><option value="SI">Slovenia</option><option
                                                                      value="SB">Solomon Islands</option><option
                                                                      value="SO">Somalia</option><option value="ZA">South Africa</option><option
                                                                      value="GS">South Georgia/Sandwich Islands</option><option
                                                                      value="KR">South Korea</option><option value="SS">South Sudan</option><option
                                                                      value="ES">Spain</option><option value="LK">Sri Lanka</option><option
                                                                      value="SD">Sudan</option><option
                                                                      value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option
                                                                      value="SZ">Swaziland</option><option value="SE">Sweden</option><option
                                                                      value="CH">Switzerland</option><option value="SY">Syria</option><option
                                                                      value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option
                                                                      value="TZ">Tanzania</option><option value="TH">Thailand</option><option
                                                                      value="TL">Timor-Leste</option><option value="TG">Togo</option><option
                                                                      value="TK">Tokelau</option><option
                                                                      value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option
                                                                      value="TN">Tunisia</option><option
                                                                      value="TR">Turkey</option><option value="TM">Turkmenistan</option><option
                                                                      value="TC">Turks and Caicos Islands</option><option
                                                                      value="TV">Tuvalu</option><option
                                                                      value="UG">Uganda</option><option
                                                                      value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option
                                                                      value="GB">United Kingdom (UK)</option><option
                                                                      value="US" selected="selected">United States (US)</option><option
                                                                      value="UM">United States (US) Minor Outlying Islands</option><option
                                                                      value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option
                                                                      value="VU">Vanuatu</option><option value="VA">Vatican</option><option
                                                                      value="VE">Venezuela</option><option value="VN">Vietnam</option><option
                                                                      value="VG">Virgin Islands (British)</option><option
                                                                      value="VI">Virgin Islands (US)</option><option
                                                                      value="WF">Wallis and Futuna</option><option
                                                                      value="EH">Western Sahara</option><option
                                                                      value="YE">Yemen</option><option
                                                                      value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select>
                                                              <noscript><button
                                                                      type="submit"
                                                                      name="woocommerce_checkout_update_totals"
                                                                      value="Update country">Update country</button></noscript></span>
                                                              </p>
                                                              <p class="form-row form-row-wide address-field form-group validate-required" id="billing_address_1_field" data-priority="50">
                                                                  <label for="billing_address_1" class="control-label">Street address&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                                  <span class="woocommerce-input-wrapper">
                                                                  <input type="text" class="input-text form-control input-lg"
                                                                         name="billing_address_1"
                                                                         id="billing_address_1"
                                                                         placeholder="House number and street name"
                                                                         value="sss"
                                                                         autocomplete="address-line1"
                                                                         data-placeholder="House number and street name">
                                                              </span>
                                                              </p>
                                                              <p class="form-row form-row-wide address-field form-group" id="billing_address_2_field" data-priority="60">
                                                                  <label for="billing_address_2" class="control-label">Apartment,
                                                                      suite, unit etc. (optional)&nbsp;<span class="optional">(optional)</span></label>
                                                                  <span class="woocommerce-input-wrapper">
                                                                  <input type="text" class="input-text form-control input-lg"
                                                                         name="billing_address_2"
                                                                         id="billing_address_2"
                                                                         placeholder="Apartment, suite, unit etc. (optional)"
                                                                         value=""
                                                                         autocomplete="address-line2"
                                                                         data-placeholder="Apartment, suite, unit etc. (optional)"></span>
                                                              </p>
                                                              <p class="form-row form-row-wide address-field form-group validate-required" id="billing_city_field" data-priority="70"
                                                                 data-o_class="form-row form-row-wide address-field form-group validate-required">
                                                                  <label for="billing_city" class="control-label">Town / City&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                                  <span class="woocommerce-input-wrapper"><input type="text"
                                                                                                                 class="input-text form-control input-lg"
                                                                                                                 name="billing_city"
                                                                                                                 id="billing_city"
                                                                                                                 placeholder=""
                                                                                                                 value="London"
                                                                                                                 autocomplete="address-level2"></span>
                                                              </p>
                                                              <p class="form-row form-row-wide address-field form-group validate-required validate-state"
                                                                 id="billing_state_field" data-priority="80"
                                                                 data-o_class="form-row form-row-wide address-field form-group validate-required validate-state">
                                                                  <label for="billing_state" class="control-label">District&nbsp;<abbr
                                                                          class="required"
                                                                          title="required">*</abbr></label><span
                                                                      class="woocommerce-input-wrapper">
                                                              <select
                                                                      name="billing_state" id="billing_state"
                                                                      class="state_select form-control input-lg select2-hidden-accessible"
                                                                      data-plugin="select2" data-allow-clear="true"
                                                                      aria-hidden="true" autocomplete="address-level1"
                                                                      data-placeholder="Select an option…" tabindex="-1"><option
                                                                      value="">Select an option…</option><option
                                                                      value="BD-05">Bagerhat</option><option
                                                                      value="BD-01">Bandarban</option><option
                                                                      value="BD-02">Barguna</option><option value="BD-06">Barishal</option><option
                                                                      value="BD-07">Bhola</option><option value="BD-03">Bogura</option><option
                                                                      value="BD-04">Brahmanbaria</option><option
                                                                      value="BD-09">Chandpur</option><option
                                                                      value="BD-10">Chattogram</option><option
                                                                      value="BD-12">Chuadanga</option><option
                                                                      value="BD-11">Cox's Bazar</option><option
                                                                      value="BD-08">Cumilla</option><option value="BD-13">Dhaka</option><option
                                                                      value="BD-14">Dinajpur</option><option
                                                                      value="BD-15">Faridpur </option><option
                                                                      value="BD-16">Feni</option><option value="BD-19">Gaibandha</option><option
                                                                      value="BD-18">Gazipur</option><option value="BD-17">Gopalganj</option><option
                                                                      value="BD-20">Habiganj</option><option
                                                                      value="BD-21">Jamalpur</option><option
                                                                      value="BD-22">Jashore</option><option value="BD-25">Jhalokati</option><option
                                                                      value="BD-23">Jhenaidah</option><option
                                                                      value="BD-24">Joypurhat</option><option
                                                                      value="BD-29">Khagrachhari</option><option
                                                                      value="BD-27">Khulna</option><option value="BD-26">Kishoreganj</option><option
                                                                      value="BD-28">Kurigram</option><option
                                                                      value="BD-30">Kushtia</option><option value="BD-31">Lakshmipur</option><option
                                                                      value="BD-32">Lalmonirhat</option><option
                                                                      value="BD-36">Madaripur</option><option
                                                                      value="BD-37">Magura</option><option value="BD-33">Manikganj </option><option
                                                                      value="BD-39">Meherpur</option><option
                                                                      value="BD-38">Moulvibazar</option><option
                                                                      value="BD-35">Munshiganj</option><option
                                                                      value="BD-34">Mymensingh</option><option
                                                                      value="BD-48">Naogaon</option><option value="BD-43">Narail</option><option
                                                                      value="BD-40">Narayanganj</option><option
                                                                      value="BD-42">Narsingdi</option><option
                                                                      value="BD-44">Natore</option><option value="BD-45">Nawabganj</option><option
                                                                      value="BD-41">Netrakona</option><option
                                                                      value="BD-46">Nilphamari</option><option
                                                                      value="BD-47">Noakhali</option><option
                                                                      value="BD-49">Pabna</option><option value="BD-52">Panchagarh</option><option
                                                                      value="BD-51">Patuakhali</option><option
                                                                      value="BD-50">Pirojpur</option><option
                                                                      value="BD-53">Rajbari</option><option value="BD-54">Rajshahi</option><option
                                                                      value="BD-56">Rangamati</option><option
                                                                      value="BD-55">Rangpur</option><option value="BD-58">Satkhira</option><option
                                                                      value="BD-62">Shariatpur</option><option
                                                                      value="BD-57">Sherpur</option><option value="BD-59">Sirajganj</option><option
                                                                      value="BD-61">Sunamganj</option><option
                                                                      value="BD-60">Sylhet</option><option value="BD-63">Tangail</option><option
                                                                      value="BD-64">Thakurgaon</option></select>

                                                          </span>
                                                              </p>
                                                              <p class="form-row form-row-wide address-field form-group validate-postcode"
                                                                 id="billing_postcode_field" data-priority="90"
                                                                 data-o_class="form-row form-row-wide address-field form-group validate-postcode">
                                                                  <label for="billing_postcode" class="control-label">Postcode
                                                                      / ZIP&nbsp;<span class="optional">(optional)</span></label><span
                                                                      class="woocommerce-input-wrapper">
                                                              <input type="text" class="input-text form-control input-lg"
                                                                     name="billing_postcode"
                                                                     id="billing_postcode"
                                                                     placeholder=""
                                                                     value=""
                                                                     autocomplete="postal-code"></span>
                                                              </p>
                                                              <p class="form-row form-row-wide form-group validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                                  <label for="billing_phone" class="control-label">Phone&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                                  <span class="woocommerce-input-wrapper">
                                                                    <input type="tel" class="input-text form-control input-lg" name="billing_phone" id="billing_phone" autocomplete="tel"></span>
                                                              </p>
                                                              <p class="form-row form-row-wide form-group validate-required validate-email" id="billing_email_field" data-priority="110">
                                                                  <label for="billing_email" class="control-label">Email address&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                                  <span class="woocommerce-input-wrapper"><input
                                                                          type="email"
                                                                          class="input-text form-control input-lg"
                                                                          name="billing_email" id="billing_email"
                                                                          placeholder="" value="me@mail.com"
                                                                          autocomplete="email username"></span></p>
                                                          </div>

                                                      </div>

                                                  </div>

                                                  <div class="col-12">
                                                      <div class="woocommerce-shipping-fields">
                                                      </div>
                                                      <div class="woocommerce-additional-fields">
                                                          <h3>Additional information</h3>
                                                          <div class="woocommerce-additional-fields__field-wrapper">
                                                              <p class="form-row notes" id="order_comments_field" data-priority=""><label for="order_comments" class="control-label">Order notes&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><textarea name="order_comments" class="input-text form-control input-lg" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="4" cols="5"></textarea></span></p>          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-lg-5 col-xl-5">
                                              <div id="order_review" class="woocommerce-checkout-review-order">
                                                  <h3 id="order_review_heading">Your order</h3>
                                                  <table class="shop_table woocommerce-checkout-review-order-table">
                                                      <thead>
                                                      <tr>
                                                          <th class="product-name">Product</th>
                                                          <th class="product-total">Total</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                      <tr class="cart_item">
                                                          <td class="product-name">
                                                              Beanie with Logo&nbsp;
                                                              <strong class="product-quantity">× 2</strong>                         </td>
                                                          <td class="product-total">
                                                              <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$&nbsp;</span>36.00</span>           </td>
                                                      </tr>
                                                      <tr class="cart_item">
                                                          <td class="product-name">
                                                              Beanie&nbsp;
                                                              <strong class="product-quantity">× 1</strong>                         </td>
                                                          <td class="product-total">
                                                              <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$&nbsp;</span>18.00</span>           </td>
                                                      </tr>
                                                      </tbody>
                                                      <tfoot>

                                                      <tr class="cart-subtotal">
                                                          <th>Subtotal</th>
                                                          <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$&nbsp;</span>54.00</span></td>
                                                      </tr>

                                                      <tr class="order-total">
                                                          <th>Total</th>
                                                          <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$&nbsp;</span>54.00</span></strong> </td>
                                                      </tr>
                                                      </tfoot>
                                                  </table>

                                                  <div id="payment" class="woocommerce-checkout-payment">
                                                      <ul class="wc_payment_methods payment_methods methods">
                                                          <li class="wc_payment_method payment_method_cod">
                                                              <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="" style="display: none;">

                                                              <label for="payment_method_cod">
                                                                  Cash on delivery  </label>
                                                              <div class="payment_box payment_method_cod">
                                                                  <p>Pay with cash upon delivery.</p>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                      <div class="form-row place-order">
                                                          <noscript>
                                                              Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.      <br/>
                                                              <button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals">Update totals</button>
                                                          </noscript>

                                                          <div class="woocommerce-terms-and-conditions-wrapper">
                                                              <div class="woocommerce-privacy-policy-text"><p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                                                              </div>
                                                          </div>

                                                          <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>
                                                          <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="c75f934b1d"><input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review"> </div>
                                                  </div>

                                                  <div class="woocommerce mt-4">
                                                      <div class="woocommerce-notices-wrapper"></div>
                                                      <div class="woocommerce-form-coupon-toggle">
                                                      <div class="woocommerce-info">
                                                          Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a>
                                                      </div>
                                                  </div>
                                                  <form class="checkout_coupon woocommerce-form-coupon" method="post" >
                                                    <p>If you have a coupon code, please apply it below.</p>

                                                    <p class="form-row form-row-first">
                                                        <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
                                                    </p>

                                                    <p class="form-row form-row-last">
                                                        <button type="submit" class="checkout-button btn btn-sm btn-main-outline m-2 rounded" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                                    </p>
                                                  </form>

                                              </div>
                                          </div>
                                      </form>

                                    </div>
                                </div><!-- .entry-content -->

                            </article><!-- #post-## -->
                    </section>
                </div>
            </div>
        </section>
        <!--shop category end-->
    </main>
    <!-- Checkout form ENd -->

    <!-- Footer section start -->
    <section class="footer footer-1">
        <div class="footer-mid">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 me-auto">
                        <div class="widget footer-widget mb-5 mb-lg-0">
                            <div class="footer-logo">
                                <img src="assets/images/logos/logo-white.png" alt="" class="img-fluid">
                            </div>
                            
                            <p class="mt-4">Share your expertise with the world! Become an instructor on CourseHike and create high-quality e-learning courses that reach a global audience. Apply today and join our community of educators and creators.</p>

                            <div class="footer-socials mt-5">
                                <span class="me-2 widget-title">Connect :</span>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-sm-4">
                        <div class="footer-widget mb-5 mb-lg-0">
                            <h5 class="widget-title">Explore</h5>
                            <ul class="list-unstyled footer-links">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-sm-4">
                        <div class="footer-widget mb-5 mb-lg-0">
                            <h5 class="widget-title ">Programs</h5>
                            <ul class="list-unstyled footer-links">
                                <li><a href="#">Become Instructor</a></li>
                                <li><a href="#">Refer and Earn</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Credits</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-sm-4">
                        <div class="footer-widget mb-5 mb-lg-0">
                            <h5 class="widget-title">Links</h5>
                            <ul class="list-unstyled footer-links">
                                <li><a href="#">News & Blogs</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-btm">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-sm-12 col-lg-12">
                        <p class="mb-0 copyright text-center text-white">© 2023 Coursehike All rights reserved by <a href="#" rel="nofollow">www.coursehike.com</a> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-btm-top">
            <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
        </div>  
    </section>
    <!-- Footer section end -->

    <!-- Essential Scripts=====================================-->
    
    <!-- Main jQuery -->
    <script src="assets/vendors/jquery/jquery.js"></script>
    <!-- Bootstrap 5:0 -->
    <script src="assets/vendors/bootstrap/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.js"></script>
    <!-- Country Code -->
    <script src="assets/vendors/country-code/intltelInput.min.js"></script> 
    <script src="assets/js/script.js"></script>
    <script type="text/javascript">
      // Vanilla Javascript
      var input = document.querySelector("#billing_phone");
      window.intlTelInput(input,({
        preferredCountries: ["in" ],
        separateDialCode:true,
      }));
    </script>

  </body>
  </html>
