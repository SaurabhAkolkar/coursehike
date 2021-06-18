@extends('learners.layouts.app')

@section('seo_content')
    <title> Privacy Policy | Learn Tattoo & Graphic Design | LILA </title>
    <meta name='description' itemprop='description' content='Check out Privacy Policy.Join LILA & enhance your skills with these online classes.' />

    <meta property="og:description" content="Check out Privacy Policy.Join LILA & enhance your skills with these online classes." />
    <meta property="og:title" content="Privacy Policy | Learn Tattoo & Graphic Design | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Privacy Policy | Learn Tattoo & Graphic Design | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Privacy Policy | Learn Tattoo & Graphic Design | LILA"}</script>
@endsection

@section('content')
<section class="la-section__small pt-0">
        <div class="container-fluid la-anim__wrap"  style="background:var(--gray)">
            <div class="py-10 py-md-16 la-anim__stagger-item">
                <h1 class="la-section-title mb-6 text-3xl text-md-5xl" style="color:var(--app-indigo-1);font-weight:var(--font-bold)">Privacy Policy</h1>
                <p class="la-cr__section-para">This Privacy Policy was last updated on January 4, 2021.</p>
                <p class="la-cr__section-para">
                    Thank you for joining our online learning platform.
                    We at <strong style="font-weight:var(--font-semibold);">(“LILA”)</strong> respect your privacy and want you to understand how we collect, use, and share data about you. 
                    This Privacy Policy covers our data collection practices and describes your rights to access, correct, or restrict our use of your personal data.
                </p>
                <p class="la-cr__section-para">
                    Unless we link to a different policy or state otherwise, this Privacy Policy applies when you visit or use the website, mobile applications, APIs, or related services (the <strong style="font-weight:var(--font-semibold);">“Services”</strong>).
                </p>
                <p class="la-cr__section-para">
                    <strong style="font-weight:var(--font-semibold);">By using the Services, you agree to the terms of this Privacy Policy.</strong> 
                    You shouldn’t use the Services if you don’t agree with this Privacy Policy or any other agreement that governs your use of the Services.
                </p>
            </div>
        </div>
        
        <div class="container-fluid pb-1 pb-md-20">
            <div class="row">
                <div class="col-12">
                    <div class="la-cr__section la-anim__wrap">
                        <div class="la-cr__section-index pt-6">
                            <h3 class="text-xl text-2xl mb-2 body-font la-anim__stagger-item--x">Table of Content</h3>
                            <ol class="la-cr__section-list la-anim__stagger-item--x">
                                <li class="la-cr__section-item ">What Data We Get</li>
                                <li class="la-cr__section-item">How We Get Data About You</li>
                                <li class="la-cr__section-item">What We Use Your Data For</li>
                                <li class="la-cr__section-item">Who We Share Your Data With</li>
                                <li class="la-cr__section-item">Security</li>
                                <li class="la-cr__section-item">Your Rights</li>
                                {{-- <li class="la-cr__section-item">Jurisdiction-Specific Rules</li> --}}
                                <li class="la-cr__section-item">Updates & Contact Info</li>
                            </ol>
                        </div>


                        <!-- What Data We Get : Start -->
                        <div class="la-cr__section-subheading pt-6 la-anim__stagger-item--x la-anim__A">
                            <h5 class="leading-loose text--black body-font">1. What Data We Get</h5>
                            <p class="la-cr__section-para">
                                We collect certain data from you directly, like the information you enter yourself, data about
                                your participation in courses, and data from third-party platforms you connect with. We also
                                collect some data automatically, like information about your device and what parts of our
                                Services you interact with or spend time using.
                            </p>

                            <div>
                                <h5 class="text-lg leading-loose text--black">1.1 Data You Provide to Us</h5>
                                <p class="la-cr__section-para">
                                    We may collect different data from or about you depending on how you use the Services.
                                    Below are some examples to help you better understand the data we collect.<br/><br/>

                                    When you create an account and use the Services, including through a third-party platform,
                                    we collect any data you provide directly, including - <strong style="font-weight:var(--font-semibold);">Account Data, Profile Data, Shared
                                    Content, Course Data, Student Payment Data, Instructor Payment Data, Data About Your
                                    Accounts on Other Services, and Communications & Support.</strong> <br/><br/>

                                    <strong style="font-weight:var(--font-semibold);">The data listed above is stored by us and associated with your account.</strong>
                                </p>
                            </div>

                            <div>
                                <h5 class="text-lg leading-loose text--black ">1.2 Data We Collect through Automated Means</h5>
                                <p class="la-cr__section-para">
                                    <strong style="font-weight:var(--font-semibold);">
                                        When you access the Services (including browsing courses), we collect certain data by
                                        automated means, including - System Data, Usage Data, and Approximate Geographic Data.    
                                    </strong><br/><br/>

                                    The data listed above is collected through the use of server log files and tracking
                                    technologies, as detailed in the “Cookies and Data Collection Tools” section below. It is
                                    stored by us and associated with your account.
                                </p>
                            </div>
                        </div>

                       
                        <!-- How We Get Data About You : Start -->
                        <div class="la-cr__section-subheading pt-6 la-anim__stagger-item--x la-anim__A">
                            <h5 class="leading-loose  text--black body-font la-anim__stagger-item la-anim__A">2. How We Get Data About You</h5>
                            <p class="la-cr__section-para la-anim__stagger-item--x  la-anim__A">
                                We use tools like cookies, web beacons, and similar tracking technologies to gather the
                                data listed above. Some of these tools offer you the ability to opt-out of data collection.
                            </p>
                           
                            <div>
                                <h5 class="text-lg leading-loose text--black ">2.1 Cookies and Data Collection Tools</h5>
                                <p class="la-cr__section-para">
                                    We use cookies, which are small text files stored by your browser, to collect, store, and
                                    share data about your activities across websites, including on. They allow us to remember
                                    things about your visits to, like your preferred language, and to make the site easier to use.
                                    To learn more about cookies, visit https://cookiepedia.co.uk/all-about-cookies.<br/><br/>

                                    And service providers acting on our behalf (like Google Analytics and third-party
                                    advertisers) use server log files and automated data collection tools like cookies, tags,
                                    scripts, customized links, device or browser fingerprints, and web beacons (together, 
                                    <strong style="font-weight:var(--font-semibold);">“Data Collection Tools“</strong> ) when you access and use the Services. These Data Collection Tools
                                    automatically track and collect certain System Data and Usage Data (as detailed in Section
                                    1) when you use the Services. In some cases, we tie data gathered through those Data
                                    Collection Tools to other data that we collect as described in this Privacy Policy.
                                </p>
                            </div>

                            <div>
                                <h5 class="text-lg leading-loose text--black ">2.2 Why We Use Data Collection Tools</h5>
                                <p class="la-cr__section-para">
                                    uses the following types of Data Collection Tools for the purposes described:
                                </p>
                                <ul class="ml-4 ml-md-8">
                                    <li class="mb-2" style="list-style-type:disc">
                                        <strong style="font-weight:var(--font-semibold);">Strictly Necessary:</strong> These Data Collection Tools enable you to access the site,
                                        provide basic functionality (like logging in or enrolling in courses), secure the site,
                                        protect against fraudulent logins, and detect and prevent abuse or unauthorized use
                                        of your account. These are required for the Services to work properly, so if you
                                        disable them, parts of the site will break or be unavailable.
                                    </li> 

                                    <li class="mb-2" style="list-style-type:disc">
                                        <strong style="font-weight:var(--font-semibold);">Functional:</strong> These Data Collection Tools remember data about your browser and
                                        your preferences, provide additional site functionality, customize content to be more
                                        relevant to you, and remember settings affecting the appearance and behavior of the
                                        Services (like your preferred language or volume level for video playback).
                                    </li>

                                    <li class="mb-2" style="list-style-type:disc">
                                        <strong style="font-weight:var(--font-semibold);">Performance:</strong> These Data Collection Tools help measure and improve the Services
                                        by providing usage and performance data, visit counts, traffic sources, or where an
                                        application was downloaded from. These tools can help us test different versions of
                                        to see which features or content users prefer and determine which email messages
                                        are opened.
                                    </li>

                                    <li class="mb-2" style="list-style-type:disc">
                                        <strong style="font-weight:var(--font-semibold);">Advertising:</strong> These Data Collection Tools are used to deliver relevant ads (on the site
                                        and/or other sites) based on things we know about you like your Usage and System
                                        Data (as detailed in Section 1), and things that the ad service providers know about
                                        you based on their tracking data. The ads can be based on your recent activity or
                                        activity over time and across other sites and services. To help deliver tailored
                                        advertising, we may provide these service providers with a hashed, anonymized
                                        version of your email address (in a non-human-readable form) and content that you
                                        share publicly on the Services.
                                    </li>

                                    <li class="mb-2" style="list-style-type:disc">
                                        <strong style="font-weight:var(--font-semibold);">Social Media:</strong> These Data Collection Tools enable social media functionality, like
                                        sharing content with friends and networks. These cookies may track a user or device
                                        across other sites and build a profile of user interests for targeted advertising
                                        purposes.
                                    </li>
                                </ul>
                                <p class="mt-3">
                                    You can set your web browser to alert you about attempts to place cookies on your
                                    computer, limit the types of cookies you allow, or refuse cookies altogether. If you do, you
                                    may not be able to use some or all features of the Services, and your experience may be
                                    different or less functional. To learn more about managing Data Collection Tools, refer to
                                    Section 6.1 (Your Choices About the Use of Your Data) below.
                                </p>
                            </div>
                        </div>
                        

                        <!-- What We Use Your Data For : Start -->
                        <div class="la-cr__section-subheading pt-6 la-anim__stagger-item--x la-anim__A">
                            <h5 class="leading-loose text--black body-font">3. What We Use Your Data For</h5>
                            <p class="la-cr__section-para">
                                We use your data to do things like provide our Services, communicate with you,
                                troubleshoot issues, secure against fraud and abuse, improve and update our Services,
                                analyze how people use our Services, serve personalized advertising, and as required by law
                                or necessary for safety and integrity.
                            </p>
                            
                            <p> We use the data we collect through your use of the Services to:</p>

                            <ul class="ml-4 ml-md-8">
                                <li style="list-style-type:disc">
                                    Provide and administer the Services, including to facilitate course participation, issue
                                    course completion certificates, display customized content, and facilitate
                                    communication with other users.
                                </li>
                                <li style="list-style-type:disc"> Process instructor payments.</li>
                                <li style="list-style-type:disc"> Process your requests and orders for courses, products, specific services, information, or features. </li>
                                <li style="list-style-type:disc">
                                    Communicate with you about your account by:
                                    
                                    <ul class="ml-3 ml-md-8">
                                        <li style="list-style-type:circle">Responding to your questions and concerns.</li>
                                        <li style="list-style-type:circle">Sending you administrative messages and information, including messages
                                            from instructors, students, and teaching assistants; notifications about
                                            changes to our Service; and updates to our agreements.
                                        </li>
                                        <li style="list-style-type:circle">
                                            Sending you information, such as by email or text messages, about your
                                            progress in courses, rewards programs, new services, new features,
                                            promotions, newsletters, and other available courses (which you can opt-out
                                            of at any time).
                                        </li>
                                        <li style="list-style-type:circle">
                                            Sending push notifications to your wireless device to provide updates and
                                            other relevant messages (which you can manage from the “options” or
                                            “settings” page of the mobile app).
                                        </li>
                                    </ul>
                                </li>
                                <li style="list-style-type:disc"> Manage your account and account preferences.</li>
                                <li style="list-style-type:disc">
                                    Facilitate the Services’ technical functioning, including troubleshooting and resolving
                                    issues, securing the Services, and preventing fraud and abuse. 
                                </li style="list-style-type:disc">
                                <li style="list-style-type:disc">Solicit feedback from users.</li>
                                <li style="list-style-type:disc">Market and administer surveys and promotions administered or sponsored by</li>
                                <li style="list-style-type:disc">Learn more about you by linking your data with additional data through third-party
                                    data providers and/or analyzing the data with the help of analytics service providers.
                                </li>
                                <li style="list-style-type:disc">Identify unique users across devices.</li>
                                <li style="list-style-type:disc">Tailor advertisements across devices.</li>
                                <li style="list-style-type:disc">Improve our Services and develop new products, services, and features.</li>
                                <li style="list-style-type:disc">Analyze trends and traffic, track purchases, and track usage data.</li>
                                <li style="list-style-type:disc">Advertise the Services on third-party websites and applications.</li>
                                <li style="list-style-type:disc">As required or permitted by law, or</li>
                                <li style="list-style-type:disc">As we, in our sole discretion, otherwise determine to be necessary to ensure the
                                    safety or integrity of our users, employees, third parties, the public, or our Services.
                                </li>
                            </ul>
                        </div>


                        <!-- Who We Share Your Data With : Start -->
                        <div class="la-cr__section-subheading pt-6 la-anim__stagger-item--x la-anim__A">
                            <h5 class="leading-loose text--black body-font">4. Who We Share Your Data With</h5>
                            <p class="la-cr__section-para">
                                We share certain data about you with instructors, other students, companies performing
                                services for us, affiliates, our business partners, analytics and data enrichment providers,
                                your social media providers, companies helping us run promotions and surveys, and
                                advertising companies who help us promote our Services. We may also share your data as
                                needed for security, legal compliance, or as part of a corporate restructuring. Lastly, we can
                                share data in other ways if it is aggregated or de-identified or if we get your consent.
                            </p>

                            <p>
                                We may share your data with third parties under the following circumstances or as 
                                otherwise described in this Privacy Policy:
                            </p>

                            <ul class="ml-4 ml-md-8">
                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">With Your Instructors:</strong> We share data that we have about you (except your email
                                    address) with instructors or teaching assistants for courses you enroll in or request
                                    information about, so they can improve their courses for you and other students.
                                    This data may include things like your city, country, browser language, operating system, device settings, the site that brought you to , and your activities on . If we
                                    collect additional data about you (like age or gender), we may share that too. We will
                                    not share your email address with instructors or teaching assistants. We also enable
                                    our instructors to implement Google Analytics on their course pages to track
                                    sources of traffic to their courses and optimize their course pages.
                                </li>

                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">With Other Students and Instructors:</strong> Depending on your settings, your shared
                                    content, and profile data may be publicly viewable, including to other students and
                                    instructors. If you ask a question to an instructor or teaching assistant, your
                                    information (including your name) may also be publicly viewable by other users
                                    depending on your settings.
                                </li>

                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">With Service Providers, Contractors, and Agents:</strong> We share your data with third-party
                                    companies who perform services on our behalf, like payment processing, fraud, and
                                    abuse prevention, data analysis, marketing, and advertising services (including
                                    retargeted advertising), email and hosting services, and customer services and
                                    support. These service providers may access your personal data and are required to
                                    use it solely as we direct, to provide our requested service.
                                </li>

                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">With Affiliates:</strong> We may share your data within our corporate family of companies
                                    that are related by common ownership or control to enable or support us in providing
                                    the Services.
                                </li>

                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">With Business Partners:</strong> We have agreements with other websites and platforms to
                                    distribute our Services and drive traffic to. For example, we work with Benesse in
                                    Japan. Depending on your location, we may share your data with these partners.
                                </li>

                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">With Analytics and Data Enrichment Services:</strong> As part of our use of third-party
                                    analytics tools like Google Analytics and data enrichment services like ZoomInfo, we
                                    share certain contact information, Account Data, System Data, Usage Data (as
                                    detailed in Section 1), or de-identified data as needed. De-identified data means data
                                    where we’ve removed things like your name and email address and replaced it with a
                                    token ID. This allows these providers to provide analytics services or match your
                                    data with publicly-available database information (including contact and social
                                    information from other sources). We do this to communicate with you in a more
                                    effective and customized manner.
                                </li>

                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">To Power Social Media Features:</strong> The social media features in the Services (like the
                                    Facebook Like button) may allow the third-party social media provider to collect
                                    things like your IP address and which page of the Services you’re visiting, and to set
                                    a cookie to enable the feature. Your interactions with these features are governed by
                                    the third-party company’s privacy policy.
                                </li>

                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">To Administer Promotions and Surveys:</strong> We may share your data as necessary to
                                    administer, market, or sponsor promotions and surveys you choose to participate in,
                                    as required by applicable law (like to provide a winners list or make required filings),
                                    or in accordance with the rules of the promotion or survey.
                                </li>

                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">For Advertising:</strong> If we decide to use an advertising-supported revenue model in the
                                    future, we may use and share certain System Data and Usage Data with third-party advertisers and networks to show general demographic and preference information
                                    among our users. We may also allow advertisers to collect System Data through
                                    Data Collection Tools (as detailed in Section 2.1), to use this data to offer you
                                    targeted ad delivery to personalize your user experience (through behavioral
                                    advertising), and to undertake web analytics. Advertisers may also share with us the
                                    data they collect about you. To learn more or opt-out from participating ad networks’
                                    behavioral advertising, see Section 6.1 (Your Choices About the Use of Your Data)
                                    below. Note that if you opt-out, you’ll continue to be served generic ads.
                                </li>

                                <li class="mb-2" style="list-style-type:disc">
                                    <strong style="font-weight:var(--font-semibold);">For Security and Legal Compliance:</strong> We may disclose your data to third parties if we
                                    (in our sole discretion) have a good faith belief that the disclosure is:
                                    
                                    <ul class="ml-3">
                                        <li style="list-style-type: circle" >Permitted or required by law.</li>
                                        <li style="list-style-type: circle">Requested as part of a judicial, governmental, or legal inquiry, order, or proceeding. </li>
                                        <li style="list-style-type: circle">Reasonably necessary as part of a valid subpoena, warrant, or other legallyvalid request. </li>
                                        <li style="list-style-type: circle">Reasonably necessary to enforce our Terms of Use, Privacy Policy, and other legal agreements. </li>
                                        <li style="list-style-type: circle">
                                            Required to detect, prevent, or address fraud, abuse, misuse, potential
                                            violations of law (or rule or regulation), or security or technical issues; or 
                                        </li>
                                        <li style="list-style-type: circle"> Reasonably necessary in our discretion to protect against imminent harm to
                                            the rights, property, or safety of , our users, employees, members of the
                                            public, or our Services.
                                        </li>
                                        <li style="list-style-type: circle"> We may also disclose data about you to our auditors and legal advisors in
                                            order to assess our disclosure obligations and rights under this Privacy
                                            Policy.
                                        </li>
                                    </ul>
                                </li>

                                <li class="mb-2" style="list-style-type: disc">
                                    <strong style="font-weight:var(--font-semibold);">During a Change in Control:</strong> If undergoes a business transaction like a merger,
                                    acquisition, corporate divestiture, or dissolution (including bankruptcy), or a sale of
                                    all or some of its assets, we may share, disclose, or transfer all of your data to the
                                    successor organization during such transition or in contemplation of a transition
                                    (including during due diligence).
                                </li>

                                <li class="mb-2" style="list-style-type: disc">
                                    <strong style="font-weight:var(--font-semibold);">After Aggregation/De-identification:</strong> we may disclose or use aggregated or deidentified
                                    data for any purpose.
                                </li>

                                <li class="mb-2" style="list-style-type: disc">
                                    <strong style="font-weight:var(--font-semibold);">With Your Permission:</strong> with your consent, we may share data to third parties outside
                                    the scope of this Privacy Policy.
                                </li>
                            </ul>
                        </div>


                        <!-- Security : Start -->
                        <div class="la-cr__section-subheading pt-6 la-anim__stagger-item--x la-anim__A">
                            <h5 class="leading-loose text--black body-font">5. Security</h5>
                            <p class="la-cr__section-para">
                                We use appropriate security based on the type and sensitivity of data being stored. As with
                                any internet-enabled system, there is always a risk of unauthorized access, so it’s important
                                to protect your password and to contact us if you suspect any unauthorized access to your
                                account.
                            </p>
                            <p class="la-cr__section-para">
                                Takes appropriate security measures to protect against unauthorized access, alteration,
                                disclosure, or destruction of your personal data that we collect and store. These measures
                                vary based on the type and sensitivity of the data. Unfortunately, however, no system can be
                                100% secured, so we cannot guarantee that communications between you and, the
                                Services, or any information provided to us in connection with the data we collect through
                                the Services will be free from unauthorized access by third parties. Your password is an
                                important part of our security system, and it is your responsibility to protect it. You should
                                not share your password with any third party, and if you believe your password or account
                                has been compromised, you should change it immediately and contact our Support Team
                                with any concerns.
                            </p>
                        </div>


                        <!-- Your Rights : Start -->
                        <div class="la-cr__section-subheading pt-6 la-anim__stagger-item--x la-anim__A">
                            <h5 class="leading-loose text--black body-font">6. Your Rights</h5>
                            <p class="la-cr__section-para">
                                You have certain rights around the use of your data, including the ability to opt-out of
                                promotional emails, cookies, and the collection of your data by certain third parties. You can
                                update or terminate your account from within our Services, and can also contact us for
                                individual rights requests about your personal data. Parents who believe we’ve
                                unintentionally collected personal data about their underage child should contact us for
                                help deleting that information.
                            </p>

                            <div>
                                <h5 class="text-lg leading-loose text--black ">6.1 Your Choices About the Use of Your Data</h5>
                                <p class="la-cr__section-para">
                                    You can choose not to provide certain data to us, but you may not be able to use certain features of the Services.
                                </p>

                                <ul class="ml-4 ml-md-8">
                                    <li style="list-style-type: disc">
                                        To stop receiving promotional communications from us, you can opt-out by using
                                        the unsubscribe mechanism in the promotional communication you receive or by
                                        changing the email preferences in your account. Note that regardless of your email
                                        preference settings, we will send you transactional and relationship messages
                                        regarding the Services, including administrative confirmations, order confirmations,
                                        important updates about the Services, and notices about our policies.
                                    </li>

                                    <li style="list-style-type: disc">
                                        If you’re located in the European Economic Area, you may opt-out of certain Data
                                        Collection Tools by clicking the “Cookie Settings“ link at the bottom of any page.
                                    </li>

                                    <li style="list-style-type: disc">
                                        The browser or device you use may allow you to control cookies and other types of
                                        local data storage. To learn more about managing cookies, visit
                                        https://cookiepedia.co.uk/how-to-manage-cookies. Your wireless device may also
                                        allow you to control whether location or other data is collected and shared.
                                    </li>

                                    <li style="list-style-type: disc">
                                        To get information and control cookies used for tailored advertising from
                                        participating companies, see the consumer opt-out pages for the Network
                                        Advertising Initiative and Digital Advertising Alliance, or if you’re located in the
                                        European Economic Area, visit the Your Online Choices site. To opt-out of Google’s
                                        display advertising or customize Google Display Network ads, visit the Google Ads Settings page. 
                                        To opt-out of Taboola’s targeted ads, see the Opt-out Link in their Cookie Policy.
                                    </li>

                                    <li style="list-style-type: disc">
                                        To opt-out of allowing Google Analytics, Mixpanel, ZoomInfo, or Clearbit to use your
                                        data for analytics or enrichment, see the Google Analytics Opt-out Browser Add-on,
                                        Mixpanel Opt-Out Cookie, ZoomInfo’s policy, and Clearbit data claiming mechanism
                                    </li>

                                    <li style="list-style-type: disc">
                                        Apple iOS, Android OS, and Microsoft Windows each provide their own instructions
                                        on how to control in-app tailored advertising. For other devices and operating
                                        systems, you should review your privacy settings on that platform.
                                    </li>
                                </ul>
                                <p class="mt-3">
                                    If you have any questions about your data, our use of it, or your rights, contact us at 
                                    <a href="mailto:support@lila.art" style="text-decoration: underline;color:var(--app-indigo-1);">support@lila.art</a>
                                </p>
                            </div>

                            <div>
                                <h5 class="text-lg leading-loose text--black ">6.2 Accessing, Updating, and Deleting Your Personal Data</h5>
                                <p class="la-cr__section-para">
                                    You can access and update your personal data that collects and maintains as follows:
                                </p>

                                <ul class="ml-4 ml-md-8">
                                    <li style="list-style-type: disc">To update the data you provide directly, log into your account and update your
                                        account at any time.
                                    </li>

                                    <li style="list-style-type: disc">
                                        To terminate your account:

                                        <ul class="ml-3">
                                            <li style="list-style-type: circle">If you are a student, visit your profile settings page and follow the steps
                                                detailed here.
                                            </li>
                                            <li style="list-style-type: circle">If you are an instructor, follow the steps detailed here.</li>
                                            <li style="list-style-type: circle">If you have any issues terminating your account, please contact our Support Team.</li>
                                            <li style="list-style-type: circle">
                                                Please note: even after your account is terminated, some or all of your data
                                                may still be visible to others, including without limitation any data that has
                                                been (a) copied, stored, or disseminated by other users (including in course
                                                comment); (b) shared or disseminated by you or others (including in your
                                                shared content), or (c) posted to a third-party platform. Even after your
                                                account is terminated, we retain your data for as long as we have a legitimate
                                                purpose to do so (and in accordance with applicable law), including assisting
                                                with legal obligations, resolve disputes, and enforce our agreements. We may
                                                retain and disclose such data pursuant to this Privacy Policy after your
                                                account has been terminated.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <h5 class="text-lg leading-loose text--black mt-4">6.3 Our Policy Concerning Children</h5>
                                <p class="la-cr__section-para">
                                    We recognize the privacy interests of children and encourage parents and guardians to take
                                    an active role in their children’s online activities and interests. Individuals younger than 18
                                    years of age, but of the required age for consent to use online services where they live, may not 
                                    set up an account, but may have a parent or guardian open an account and help them
                                    enroll in appropriate courses. Individuals younger than the required age for consent to use
                                    online services may not use the Services. If we learn that we’ve collected personal data
                                    from a child under those ages, we will take reasonable steps to delete it.
                                </p>
                            </div>
                            
                        </div>

                        
                        <!-- Updates & Contact Info : Start -->
                        <div class="la-cr__section-subheading pt-6 la-anim__stagger-item--x la-anim__A">
                            <h5 class="leading-loose text--black body-font">7. Updates & Contact Info</h5>
                            <p class="la-cr__section-para">
                                When we make a material change to this policy, we’ll notify users via email, in-product
                                notice, or another mechanism required by law. Changes become effective the day they’re
                                posted. Please contact us via email or postal mail with any questions, concerns, or
                                disputes.
                            </p>

                            <div>
                                <h5 class="text-lg leading-loose text--black ">7.1 Modifications to This Privacy Policy</h5>
                                <p class="la-cr__section-para">
                                    From time to time, we may update this Privacy Policy. If we make any material change to it,
                                    we will notify you via email, through a notification posted on the Services, or as required by
                                    applicable law. We will also include a summary of the key changes. Unless stated
                                    otherwise, modifications will become effective on the day they are posted. <br/><br/>

                                    As permitted by applicable law, if you continue to use the Services after the effective date of
                                    any change, then your access and/or use will be deemed an acceptance of (and agreement
                                    to follow and be bound by) the revised Privacy Policy. The revised Privacy Policy
                                    supersedes all previous Privacy Policies.
                                </p>
                            </div>

                            <div>
                                <h5 class="text-lg leading-loose text--black ">7.2 Interpretation</h5>
                                <p class="la-cr__section-para">
                                    Any capitalized terms not defined in this policy are defined as specified in 's Terms of Use.
                                    Any version of this Privacy Policy in a language other than English is provided for
                                    convenience. If there is any conflict with a non-English version, you agree that the English
                                    language version will control.
                                </p>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection