<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <title>Certificate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
    <style>
        *{
            box-sizing: border-box;
        }
        body,html{
            font-family:sans-serif;
            font-size:16px;
            font-weight:400;
            background:#f5f4f0;
            color:#010101;
            line-height:1.5;
            border:25px solid #FFC516;
            height:100%;
            padding:0;
            margin:0 auto;
        }        
    </style>
</head>
<body>
    <section class="la-cert__section" style="color:#010101;padding:80px 0;">
        <div class="container px-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="la-cert__main">
                        
                            <div class="la-cert__logo text-center " >
                                <img src="./images/learners/logo.svg" alt="logo" class="img-fluid  d-block">
                            </div>
                            
                            <div class="la-cert__head  pt-3 pb-4">
                                <h2 class="la-cert__title text-uppercase font-weight-bold m-0" style="letter-spacing:8px;font-size:32px;">Certificate</h2>
                                <div class="la-cert__tag text-uppercase">of Completion</div>
                            </div>
                          

                            <div class="la-cert__info" style="padding:80px 0">
                                <div class="la-cert__to text-uppercase" style="letter-spacing:2px;color:#454545;font-size:14px;">This Certificate is proudly presented to </div>
                                <h1 class="la-cert__learner pt-3" style="font-size:64px;border-bottom:2px solid #FFC516;margin:0 35px;">{{$learner_name}}</h1>
                                <div class="la-cert__desc" style="color:#252525;font-size:16px;letter-spacing:1px;padding-top:30px;">
                                    This is to certify that <strong>' {{$learner_name}} '</strong> successfully completed XX hours of 
                                    <strong>' {{$course->title}} '</strong> course on '{{$date}}'.
                                </div>
                            </div>

                            <div class="la-cert__sign  px-5" style="padding-top:120px">                            
                                <div class="float-left" style="border-top:1px solid #FFC516;">{{$mentor}}</div>   
                                <div class="float-right" style="border-top:1px solid #FFC516;">Other Person's Name</div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>